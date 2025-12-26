<?php

use App\Http\Controllers\admin\CategoryController;

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\CompanyController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


//*********frontend routes********
Route::get('products', [FrontendProductController::class, 'index'])->name('product');
Route::get('products/{slug}', [FrontendProductController::class, 'productDetail'])->name('product.detail');


//*********cart routes********
Route::post('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::delete('cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');

//frontend category products route
Route::get('category/{slug}', [FrontendCategoryController::class, 'categoryProducts'])->name('category.products');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->group(function () {

        //company routes for admin
        Route::resource('company', CompanyController::class);
        // Route::get('company', [CompanyController::class, 'index'])->name('company.index');
        // Route::get('company/create', [CompanyController::class, 'create'])->name('company.create');
        // Route::post('company/store', [CompanyController::class, 'store'])->name('company.store');
        // Route::get('company/edit/{id}', [CompanyController::class, 'edit'])->name('company.edit');
        // Route::put('company/update/{id}', [CompanyController::class, 'update'])->name('company.update');
        // Route::delete('company/delete/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');


        //category routes for admin
        Route::get('category', [CategoryController::class, 'index'])->name('category.index');
        Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');


        //product routes for admin
        Route::get('product', [App\Http\Controllers\admin\ProductController::class, 'index'])->name('product.index');
        Route::get('product/create', [App\Http\Controllers\admin\ProductController::class, 'create'])->name('product.create');
        Route::post('product/store', [App\Http\Controllers\admin\ProductController::class, 'store'])->name('product.store');
        Route::get('product/edit/{id}', [App\Http\Controllers\admin\ProductController::class, 'edit'])->name('product.edit');
        Route::put('product/update/{id}', [App\Http\Controllers\admin\ProductController::class, 'update'])->name('product.update');

        Route::delete('product/delete/{id}', [App\Http\Controllers\admin\ProductController::class, 'destroy'])->name('product.destroy');
    });
});




require __DIR__ . '/auth.php';
