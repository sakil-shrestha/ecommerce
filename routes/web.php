<?php


use App\Http\Controllers\admin\CategoryController;

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\CompanyController;
use App\Http\Controllers\Frontend\AddressController;
use App\Http\Controllers\Frontend\Auth\ProfileController as AuthProfileController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\GoogleLoginController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;




Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



// Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
Route::get('about', [HomeController::class, 'about'])->name('about');


//*********frontend routes********
Route::get('products', [FrontendProductController::class, 'index'])->name('product');
Route::get('products/search', [FrontendProductController::class, 'search'])->name('product.search');
Route::get('products/{slug}', [FrontendProductController::class, 'productDetail'])->name('product.detail');



//frontend category products route
Route::get('category/{slug}', [FrontendCategoryController::class, 'categoryProducts'])->name('category.products');

//*********frontend profile routes(login system)********,
// Route::get('/profile',[AuthProfileController::class,'login'])->name('profile.login');


//google routes
Route::get('/google/redirect', [GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    //*********cart routes********
    Route::post('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add-to-cart');
    Route::get('cart', [CartController::class, 'cart'])->name('cart');
    Route::delete('cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');

    //*********order routes********
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/address', [AddressController::class, 'store'])->name('address.store');
    Route::put('/address/{id}', [AddressController::class, 'update'])->name('address.update');
    Route::delete('/address/{id}', [AddressController::class, 'delete'])->name('address.delete');

    // ******Review routes********
    Route::post('/review/{product_id}', [ReviewController::class, 'store'])->name('review.store');

    // Route::get('/payment',[PaymentController::class,'payment'])->name('payment');
    Route::get('/order', [OrderController::class, 'order'])->name('order');
    Route::get('/payment/callback', [OrderController::class, 'paymentCallback']);
});



//admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

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





require __DIR__ . '/auth.php';
