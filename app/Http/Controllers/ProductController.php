<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Products;
use App\Models\Categories;
use App\Models\ProductTypes;

class ProductController extends Controller
{
    private $controller = 'ProductController';

    public function index()
    {
        $data = Products::paginate(10);

        return view('admin/commons/list', [
            'data' => $data,
            'isCreateButtonEnable' => true,
            'mainController' => $this->controller,
            'dataHeader' => [
                'title' => 'title',
                'description' => 'Description',
            ]
        ]);
    }

    public function create()
    {
        $productTypes = [];
        foreach (ProductTypes::all() as $key => $value) {
            $productTypes[$value->id] = $value->title;
        };

        $productCategories = [];
        foreach (Categories::all() as $key => $value) {
            $productCategories[$value->id] = $value->title;
        };

        return view('admin/products/form', [
            'data' => new Products(),
            'productTypes' => $productTypes,
            'productCategories' => $productCategories,
        ]);
    }

    public function store()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
