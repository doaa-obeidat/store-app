<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('homepage');

Route::get('contact-us', [ContactUsController::class, 'index'])->name('contact_us');

Route::post('contact-us', [ContactUsController::class, 'store'])->name('contact_us.store');

Route::get('products', ProductController::class)->name('products');

Route::get('login', [AuthenticationController::class, 'login'])
    ->middleware(['guest'])
    ->name('login');

Route::post('signin', [AuthenticationController::class, 'signin'])->name('signin');

// Dashboard
Route::get('admin', [DashboardController::class, 'index'])
    ->name('admin.dashboard')
    ->middleware(['auth']);

// Products => resource

// products => get => Getting all the products
// products/create => get => show form to create new product
// products => post => create new product
// products/id => get => Show product with id
// products/id/edit => get => Show edit product form with id
// products/id => delete => delete product with id
// products/id => put/patch => update product with id

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function() {
    Route::controller(AdminProductController::class)->group(function() {
        Route::get('products', 'index')
            ->name('products.index');

        Route::post('products', 'store')
            ->name('products.store');

        Route::get('products/create', 'create')
            ->name('products.create');

        Route::get('products/{product}/edit', 'edit')
            ->name('products.edit');

        Route::delete('products/{id}', 'destroy')->name('products.destroy');

        Route::put('products/{product}', 'update')->name('products.update');
    });
});

// New comment




