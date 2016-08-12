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

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Modules\Products\Models\Categories;

class CategoriesController extends \App\Http\Controllers\Controller
{
    /*
     * Base package module for this controller
     */
    private $controller = '\App\Modules\Products\Controllers\CategoriesController';

    /*
     * Name of this module
     */
    private $module = 'Products';

    /*
     * Name of module in lowercase and plural style
     */
    private $plural = 'categories';

    /*
     * Name of module in lowercase and singular style
     */
    private $singular = 'category';

    /*
     * Main index method to display list of data
     */
     public function index(Request $request)
     {
         if ($request->input('id') !== null) {
             // Redirect to detail
             return $this->show($request->input('id'));
         }

        $data = Categories::paginate(10);

        return view('Products::commons/list', [
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
        // Get product categories to be show as parent options
        $productCategories = [
            0 => 'No Parent'
        ];

        foreach (Categories::all() as $key => $value) {
            $productCategories[$value->id] = $value->title;
        };

        return view("$this->module::$this->plural/form", [
            'mainController' => $this->controller,
            'panelTitle' => 'New Category',
            'pageTitle' => 'Category Form',
            'data' => new Categories(),
            'productCategories' => $productCategories,
        ]);
    }

    /**
     * Store new data to the database
     */
    public function store(Request $request)
    {
        // Get parent category input
        $parentInput = $request->input('parent');

        // Default category to be input to the database
        $categoryInputable = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'created_by' => 'DUMMY',
        ];

        // When user chose a parent
        if ($parentInput != 0) {
            $categoryInputable['parent_id'] = $parentInput;
        }

        // Save new category to database
        $data = Categories::create($categoryInputable);

        return redirect("/admin/$this->plural/$data->id")
            ->with('success', "The $this->singular has been successfully created");
    }

    /*
     * Display details of particular data
     */
    public function show($id)
    {
        $data = Categories::find($id);

        return view("$this->module::$this->plural/detail", [
            'pageTitle' => 'Category Detail',
            'data' => $data,
            'controller' => $this->controller,
        ]);
    }

    /*
     * Display edit form of a particular data
     */
    public function edit($id)
    {
        // Get product categories to be show as parent options
        $productCategories = [
            0 => 'No Parent'
        ];

        foreach (Categories::all() as $key => $value) {
            $productCategories[$value->id] = $value->title;
        };

        return view("$this->module::$this->plural/form", [
            'pageTitle' => 'Category Form',
            'panelTitle' => 'Edit Data',
            'mainController' => $this->controller,
            'data' => Categories::find($id),
            'productCategories' => $productCategories,
        ]);
    }

    /*
     * Updating database information about particular data
     */
    public function update(Request $request, $id)
    {
        $data = Categories::find($id)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'updated_by' => 'DUMMY',
        ]);

        return redirect("/admin/$this->plural/$data->id")
            ->with('success', "'The $this->singular has been successfully updated");
    }

    public function destroy(Request $request)
    {
        $data = Categories::find($request->input('item-id'))->delete();

        return redirect('/admin/categories')
            ->with('success', "The $this->singular has been successfully deleted");
    }
}
