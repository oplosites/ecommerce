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

namespace App\Modules\Users\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Modules\Users\Models\Users;
use App\Modules\Users\Models\Provinces;
use App\Modules\Users\Models\Cities;
use Illuminate\Support\Facades\Input;

class UsersController extends \App\Http\Controllers\Controller
{
    /*
     * Base package module for this controller
     */
    private $controller = '\App\Modules\Users\Controllers\UsersController';

    /*
     * Name of this module
     */
    private $module = 'Users';

    /*
    * Name of module in lowercase and singular style
    */
    private $singular = 'user';

    /*
     * Name of module in lowercase and plural style
     */
    private $plural = 'users';

    /*
     * Main index method to display list of data
     */
    public function index(Request $request)
     {
        if ($request->input('id') !== null) {
             // Redirect to detail
             return $this->show($request->input('id'));
        }
        $data = Users::paginate(10);

        return view('commons/list', [
            'pageTitle' => $this->module . 'List',
            'panelTitle' => $this->module,
            'data' => $data,
            'isCreateButtonEnable' => true,
            'mainController' => $this->controller,
            'detailMethod' => "$this->controller@index",
            'editMethod' => "$this->controller@edit",
            'dataHeader' => [
                'name' => 'User Name',
                'email' => 'Email',
            ]
        ]);
    }

    public function create()
    {
        $provinces = [];
        foreach (Provinces::all() as $key => $value) {
            $provinces[$value->id] = $value->name;
        }

        $cities = [];
        foreach (Cities::all() as $key => $value) {
            $cities[$value->id] = $value->name;
        }

        return view("$this->module::$this->plural/form", [
            'pageTitle' => $this->module . ' Form',
            'panelTitle' => 'New ' . $this->singular,
            'data' => new Users(),
            'mainController' => $this->controller,
            'provinces' => $provinces,
            'cities' => $cities,
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required | unique:users',
            'email' => 'required | unique:users | email',
            'password' => 'min:6 | required | confirmed',
        ];

        // Create a new validator instance.
        $validator = \Validator::make(Input::all(), $rules);

        if ($validator->passes()) {
            $data = Users::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'created_by' => 'DUMMY',
            ]);

            return redirect("/$this->plural/$data->id")
                ->with('success', 'The ' . $this->plural . ' has been successfully created');
        } else {
            return redirect("/$this->plural/new")
                ->withErrors($validator);
        }
    }

    public function show($id)
    {
        $data = Users::find($id);

        return view("$this->module::$this->plural/detail", [
            'controller' => $this->controller,
            'pageTitle' => 'User Detail',
            'data' => Users::find($id),
        ]);
    }

    public function edit($id)
    {
        return view("$this->module::$this->plural/form", [
            'mainController' => $this->controller,
            'pageTitle' => $this->module . 'Form',
            'panelTitle' => 'Edit ' . $this->controller,
            'data' => Users::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Users::find($id)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'updated_by' => 'DUMMY',
        ]);

        return redirect("/admin/$this->plural/$data->id")
            ->with('success', "The $this->singular has been successfully updated");
    }

    public function destroy(Request $request)
    {
        $data = Users::find($request->input('item-id'))->delete();

        return redirect("/admin/$this->plural")
            ->with('success', "The $this->singular has been successfully deleted");
    }
}
