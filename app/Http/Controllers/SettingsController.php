<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SettingsController extends Controller
{
    private $controller = 'ProductController';
    private $viewDir = 'products';

    public function index(Request $request)
    {
        if ($request->input('id') !== null) {
            // Redirect to detail
            return $this->show($request->input('id'));
        }
        $data = Products::paginate(10);

        return view('admin/commons/list', [
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

        return view('admin/products/form', [
            'data' => new Products(),
            'productTypes' => $productTypes,
            'productCategories' => $productCategories,
            'currentCategories' => '',
        ]);
    }

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
            $filename =  $file->getClientOriginalName();
            $file->move($rootCatalogue, $filename);
            $images[] = [
                'title' => $filename,
                'url' => $rootCatalogue . $filename,
                'product_id' => $product->id,
                'created_by' => 'DUMMY',
            ];
        }

        // Bulk store to database
        ProductImages::Insert($images);

        // Redirect to detail
        return redirect("/admin/product/$product->id")
            ->with('success', 'Successfully created a product');
    }

    public function show($id)
    {
        $data = Products::find($id);

        return view("admin/$this->viewDir/detail", [
            'data' => $data,
            'controller' => $this->controller,
        ]);
    }

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

        return view('admin/' . $this->viewDir . '/form', [
            'data' => $product,
            'productTypes' => $productTypes,
            'productCategories' => $productCategories,
            'currentCategories' => $currentCategories,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Products::find($id)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'updated_by' => 'DUMMY',
        ]);

        return redirect('/admin/' . $this->viewDir . '/' . $data->id)
            ->with('success', 'The ' . $this->viewDir . ' has been successfully updated');
    }

    public function destroy(Request $request)
    {
        $data = Products::find($request->input('item-id'))->delete();

        return redirect('/admin/product')
            ->with('success', 'The ' . $this->viewDir . ' has been successfully deleted');
    }
}
