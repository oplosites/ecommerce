<?php

namespace Ocommerce\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Ocommerce\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $product = new Product();
        return view('product/index', [
            'key' => env('APP_KEY'),
            'products' => $product->getProducts(),
        ]);
    }
}
