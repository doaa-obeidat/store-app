<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('products', function () {
   return \App\Models\Product::all();
});

Route::post('products', function (Request $request) {
    // create new product
    Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'qty' => $request->qty
    ]);

    return [
        'success' => 'done, product created'
    ];
});
