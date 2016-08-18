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

namespace App\Modules\PaymentMethods\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Modules\PaymentMethods\Models\PaymentMethods;

class PaymentMethodsController extends \App\Http\Controllers\Controller
{
    /*
     * Base package module for this controller
     */
    private $controller = '\App\Modules\Transactions\Controllers\TransactionsController';

    /*
     * Name of this module
     */
    private $module = 'PaymentMethods';

    /*
     * Name of module in lowercase and plural style
     */
    private $plural = 'payments';

    /*
     * Name of module in lowercase and singular style
     */
    private $singular = 'payment';

    /*
     * Main index method to display list of data
     */
    public function index(Request $request)
     {
        if ($request->input('id') !== null) {
             // Redirect to detail
             return $this->show($request->input('id'));
        }
        $data = PaymentMethods::paginate(10);

        return view("commons/list", [
            'pageTitle' => 'Payment Methods List',
            'panelTitle' => 'Payment Methods',
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
            'pageTitle' => 'Payment Method Form',
            'panelTitle' => 'New Payment Method',
            'data' => new Transactions(),
            'mainController' => $this->controller,
        ]);
    }

    public function store(Request $request)
    {
        $data = Transactions::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'created_by' => 'DUMMY',
        ]);

        return redirect("/admin/$this->plural/$data->id")
            ->with('success', 'The ' . $this->plural . ' has been successfully created');
    }

    public function show($id)
    {
        $data = Transactions::find($id);

        return view("$this->module::$this->plural/detail", [
            'controller' => $this->controller,
            'pageTitle' => 'Product Type Detail',
            'data' => Transactions::find($id),
        ]);
    }

    public function edit($id)
    {
        return view("$this->module::$this->plural/form", [
            'mainController' => $this->controller,
            'pageTitle' => 'Transactions Form',
            'panelTitle' => 'Edit Transactions',
            'data' => Transactions::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Transactions::find($id)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'updated_by' => 'DUMMY',
        ]);

        return redirect("/admin/$this->plural/$data->id")
            ->with('success', "The $this->singular has been successfully updated");
    }

    public function destroy(Request $request)
    {
        $data = Transactions::find($request->input('item-id'))->delete();

        return redirect("/admin/$this->plural")
            ->with('success', "The $this->singular has been successfully deleted");
    }
}
