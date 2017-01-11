<?php

/**
 * Managing OCommerce products
 *
 * Products management of OCommerce involves entities of products, product
 * images, categories, and product types
 *
 * @category   Controller
 * @package    App\Modules\Products\Controllers\ProductController
 * @author     Restu Arif Priyono <priyono.arif@gmail.com>
 * @copyright  2016 oplosite
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: @package_version@
 * @link       http://oplosite.com
 */

namespace App\Modules\Products\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Modules\Products\Models\Products;
use App\Modules\Products\Models\Categories;
use App\Modules\Products\Models\ProductTypes;
use App\Modules\Products\Models\ProductImages;

class ProductController extends \App\Http\Controllers\Controller
{
    /*
     * Base package module for this controller
     */
    private $controller = '\App\Modules\Products\Controllers\ProductController';

    /*
     * Name of this module
     */
    private $module = 'Products';

    /*
     * Name of module in lowercase and plural style
     */
    private $plural = 'products';

    /*
     * Name of module in lowercase and singular style
     */
    private $singular = 'product';

    /*
     * Main index method to display list of data
     */
    public function index(Request $request)
    {
        if ($request->input('id') !== null) {
            // Redirect to detail
            return $this->show($request->input('id'));
        }

        $data = Products::paginate(10);

        return view('Products::commons.list', [
            'data' => $data,
            'isCreateButtonEnable' => true,
            'mainController' => $this->controller,
            'detailMethod' => "$this->controller@index",
            'editMethod' => "$this->controller@edit",
            'dataHeader' => [
                'title' => 'Title',
                'description' => 'Description',
            ]
        ]);
    }

    /*
     * Display a form to create new data
     */
    public function create()
    {
        // Get product types
        $productTypes = [];
        foreach (ProductTypes::all() as $key => $value) {
            $productTypes[$value->id] = $value->title;
        };

        // Get product categories
        $productCategories = [];
        foreach (Categories::all() as $key => $value) {
            $productCategories[$value->id] = $value->title;
        };

        return view('Products::products/form', [
            'mainController' => $this->controller,
            'data' => new Products(),
            'productTypes' => $productTypes,
            'productCategories' => $productCategories,
            'currentCategories' => '',
        ]);
    }

    /*
     * Store requested form data to database
     */
    public function store(Request $request)
    {
        // Product storing
        $product = Products::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'purchase_price' => $request->input('purchase-price'),
            'selling_price' => $request->input('selling-price'),
            'stock' => $request->input('stock'),
            'product_type_id' => $request->input('type'),
            'user_id' => 1,
            'created_by' => 'DUMMY',
        ]);

        // Storing categories
        $categories = [];
        foreach ($request->input('categories') as $key => $value) {
            $categories[] = $key;
        }
        $product->categories()->sync($categories);

        // Image storing (if any)
        $images = [];
        $productTitle = $request->input('title');
        $rootCatalogue = "catalogue/";

        foreach ($request->file('image') as $key => $file) {
            if (!empty($file)) {
                $filename =  $file->getClientOriginalName();
                $file->move($rootCatalogue, $filename);
                $images[] = [
                    'title' => $filename,
                    'url' => $rootCatalogue . $filename,
                    'product_id' => $product->id,
                    'created_by' => 'DUMMY',
                ];
            }
        }

        // Bulk store to database
        ProductImages::Insert($images);

        // Redirect to detail
        return redirect("/admin/product/$product->id")
            ->with('success', 'Successfully created a product');
    }

    /*
     * Display details of particular data
     */
    public function show($id)
    {
        $data = Products::find($id);

        return view("$this->module::$this->plural/detail", [
            'data' => $data,
            'controller' => $this->controller,
        ]);
    }

    /*
     * Display edit form of a particular data
     */
    public function edit($id)
    {
        // Get product types
        $productTypes = [];
        foreach (ProductTypes::all() as $key => $value) {
            $productTypes[$value->id] = $value->title;
        };

        // Get product categories
        $productCategories = [];
        foreach (Categories::all() as $key => $value) {
            $productCategories[$value->id] = $value->title;
        };

        // Get the product
        $product = Products::find($id);

        // Get current categories
        $currentCategories = '';
        foreach ($product->categories as $key => $value) {
            $currentCategories .= "$value->id;";
        }

        return view("$this->module::$this->plural/form", [
            'data' => $product,
            'mainController' => $this->controller,
            'productTypes' => $productTypes,
            'productCategories' => $productCategories,
            'currentCategories' => $currentCategories,
        ]);
    }

    /*
     * Updating database information about particular data
     */
    public function update(Request $request, $id)
    {
        $data = Products::find($id)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'updated_by' => 'DUMMY',
        ]);

        return redirect("/admin/$this->plural/$data->id")
            ->with('success', "'The $this->plural has been successfully updated");
    }

    /*
     * Deleting data regarding to item id
     */
    public function destroy(Request $request)
    {
        $data = Products::find($request->input('item-id'))->delete();

        return redirect('/admin/product')
            ->with('success', "The $this->singular has been successfully deleted");
    }
}
