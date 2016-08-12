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
use App\Modules\Products\Models\ProductTypes;

class ProductTypesController extends \App\Http\Controllers\Controller
{
    /*
     * Base package module for this controller
     */
    private $controller = '\App\Modules\Products\Controllers\ProductTypesController';

    /*
     * Name of this module
     */
    private $module = 'Products';

    /*
     * Name of module in lowercase and plural style
     */
    private $plural = 'types';

    /*
     * Name of module in lowercase and singular style
     */
    private $singular = 'type';

    /*
     * Main index method to display list of data
     */
    public function index(Request $request)
     {
         if ($request->input('id') !== null) {
             // Redirect to detail
             return $this->show($request->input('id'));
         }
        $data = ProductTypes::paginate(10);

        return view('Products::commons/list', [
            'pageTitle' => 'Product Types List',
            'panelTitle' => 'Product Types',
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

    public function create()
    {
        return view("$this->module::$this->plural/form", [
            'pageTitle' => 'Product Type Form',
            'panelTitle' => 'New Product Type',
            'data' => new ProductTypes(),
            'mainController' => $this->controller,
        ]);
    }

    public function store(Request $request)
    {
        $data = ProductTypes::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'created_by' => 'DUMMY',
        ]);

        return redirect("/admin/$this->plural/$data->id")
            ->with('success', 'The ' . $this->plural . ' has been successfully created');
    }

    public function show($id)
    {
        $data = ProductTypes::find($id);

        return view("$this->module::$this->plural/detail", [
            'controller' => $this->controller,
            'pageTitle' => 'Product Type Detail',
            'data' => ProductTypes::find($id),
            'data' => $data,
        ]);
    }

    public function edit($id)
    {
        return view("$this->module::$this->plural/form", [
            'mainController' => $this->controller,
            'pageTitle' => 'Product Type Form',
            'panelTitle' => 'Edit Product Type',
            'data' => ProductTypes::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = ProductTypes::find($id)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'updated_by' => 'DUMMY',
        ]);

        return redirect("/admin/$this->plural/$data->id")
            ->with('success', "The $this->singular has been successfully updated");
    }

    public function destroy(Request $request)
    {
        $data = ProductTypes::find($request->input('item-id'))->delete();

        return redirect("/admin/$this->plural")
            ->with('success', "The $this->singular has been successfully deleted");
    }
}
