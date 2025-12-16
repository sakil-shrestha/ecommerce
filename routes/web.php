<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\CompanyController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //company routes for admin
    Route::get('company', [CompanyController::class, 'index'])->name('company.index');
    Route::get('company/create', [CompanyController::class, 'create'])->name('company.create');
    Route::post('company/store', [CompanyController::class, 'store'])->name('company.store');
    Route::get('company/edit/{id}', [CompanyController::class, 'edit'])->name('company.edit');
    Route::put('company/update/{id}', [CompanyController::class, 'update'])->name('company.update');
    Route::delete('company/delete/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');



    //category routes for admin
    Route::get('category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
});




require __DIR__ . '/auth.php';
