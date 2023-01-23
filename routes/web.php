<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Livewire\Cart;
use App\Models\Category;
use App\Http\Livewire\CartComponent;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// All
Route::get('/viewall/{name}', [ProductController::class, 'viewcategory']);
Route::get('/detail/{id}', [ProductController::class, 'detail']);
Route::get('/search', [ProductController::class, 'search']);
Route::get('/', [ProductController::class, 'homeProduct']);

// Guest
Route::middleware('isGuest')->group(function () {
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'registercheck']);
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'logincheck']);
    Route::get('/forgot-password', [AuthController::class, 'passwordRequest'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'passwordEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'passwordReset'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'passwordUpdate'])->name('password.update');
});

// Admin & User
Route::middleware('auth')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::get('/edit-profile', [AuthController::class, 'editProfile']);
    Route::post('/edit-profile/{user}', [AuthController::class, 'changeProfile']);
    Route::get('/logout', [AuthController::class, 'logout']);
});

// Admin
Route::middleware('isAdmin')->group(function () {
    Route::get('/manage', [ProductController::class, 'adminProduct']);
    Route::post('/manage', [ProductController::class, 'searchManage']);
    Route::post('/add-category', [ProductController::class, 'addCategory']);
    Route::get('/delete-category/{id}', [ProductController::class, 'deleteCategory']);
    Route::get('/add', [ProductController::class, 'addProductView']);
    Route::post('/add', [ProductController::class, 'addProduct']);
    Route::get('/edit/{product}', [ProductController::class, 'editProductView']);
    Route::post('/edit/{product}', [ProductController::class, 'editProduct']);
    Route::get('/delete/{product}', [ProductController::class, 'delete']);
    Route::get('/inbox', [TransactionController::class, 'inbox']);
    Route::get('/confirm/{transactionHeader}', [TransactionController::class, 'confirm']);
    Route::get('/cancel/{transactionHeader}', [TransactionController::class, 'cancel']);
});

// User
Route::middleware('isCustomer')->group(function () {
    Route::get('/cart', CartComponent::class);
    Route::post('/addcart/{product}', [TransactionController::class, 'addCart']);
    Route::get('/deletecart/{cart}', [TransactionController::class, 'erase']);
    Route::get('/purchase', [TransactionController::class, 'purchase']);
    Route::get('/history', [TransactionController::class, 'history']);
});