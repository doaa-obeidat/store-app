<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Get all the products
        $products = Product::where('name', 'like', "%$request->name%")->paginate(8)->appends($request->query()); // Add the query params to the pagination links

        return view('products', [
            'products' => $products
        ]);
    }
}
