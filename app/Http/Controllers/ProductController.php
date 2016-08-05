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

    public function store(Request $request)
    {
        echo json_encode($request->session()->get('users'));exit;
        // Product storing
        $product = Products::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'purchase_price' => $request->input('purchase-price'),
            'selling_price' => $request->input('selling-price'),
            'stock' => $request->input('stock'),
            'product_type_id' => $request->input('type'),
            'user_id' => $request->input('type'),
            'created_by' => 'DUMMY',
        ]);

        // Image storing (if any)
        $images = [];
        $productTitle = $request->input('title');
        $rootCatalogue = base_path()."/public/catalogue/";
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
        ProductImages::Insert(images);

        // Redirect to detail
        return $this->show($product->id)->with('success', 'Successfully created a product');
    }

    public function show($id)
    {
        echo "ok";exit;
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
