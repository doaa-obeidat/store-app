<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // List all products
    public function index()
    {
        $products = Product::paginate(10);

        return view('admin.products.index', compact('products'));
    }

    // Show the form of creating new product
    public function create()
    {
        return view('admin.products.create');
    }

    // Store new product
    public function store(StoreProductRequest $request)
    {
        $image = $request->file('image');

        $image->move(public_path('images'), $image->getClientOriginalName());

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'qty' => $request->qty,
            'image' => asset("images/" . $image->getClientOriginalName())
        ]);

        return to_route('admin.products.index')->with('success', 'Product has been created successfully.');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return back()->with('success', "Product #{$id} has been deleted successfully.");
    }

    public function update(StoreProductRequest $request, Product $product)
    {
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'qty' => $request->qty
        ]);

        return to_route('admin.products.index')->with('success', 'Product has been updated successfully.');
    }
}
