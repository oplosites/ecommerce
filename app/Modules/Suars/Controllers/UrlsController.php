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

namespace App\Modules\Suars\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Modules\Suars\Models\Urls;
use Illuminate\Support\Facades\Auth;

class UrlsController extends \App\Http\Controllers\Controller
{
    /*
     * Name of this module
     */
    private $module = 'Suars';


    /*
     * Name of module in lowercase and plural style
     */
    private $plural = 'Urls';

    /*
     * Name of module in lowercase and singular style
     */
    private $singular = 'Url';

    private $controller = '';

    function __construct()
    {
        /*
         * Base package module for this controller
         */
        $this->controller = "\\" . __NAMESPACE__ . "\\" . $this->plural . 'Controller';
    }

    /*
     * Main index method to display list of data
     */
    public function index(Request $request)
    {
        if ($request->input('id') !== null) {
            // Redirect to detail
            return $this->show($request->input('id'));
        }

        $data = Urls::paginate(10);

        return view('Products::commons.list', [
            'data' => $data,
            'isCreateButtonEnable' => true,
            'mainController' => $this->controller,
            'detailMethod' => "$this->controller@index",
            'editMethod' => "$this->controller@edit",
            'dataHeader' => [
                'url' => 'URL',
                'description' => 'Description',
            ]
        ]);
    }

    /*
     * Display a form to create new data
     */
    public function create()
    {
        return view("$this->module::" . strtolower($this->plural) . "/form", [
            'data' => new Urls(),
            'mainController' => $this->controller,
        ]);
    }

    /*
     * Store requested form data to database
     */
    public function store(Request $request)
    {
        if (!empty(Auth::user())) {
            // Data storing
            $data = Urls::create([
                'url' => $request->input('url'),
                'user_id' => Auth::user()->id,
            ]);
        } else {
            return redirect('/login')
                ->with('danger', 'User is not authenticated.');
        }

        // Redirect to detail
        return redirect("/" . strtolower($this->module) . "/" . strtolower($this->singular) . "/$data->id")
            ->with('success', "Successfully created a $this->singular");
    }

    /*
     * Display details of particular data
     */
    public function show($id)
    {
        $data = Urls::find($id);

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
