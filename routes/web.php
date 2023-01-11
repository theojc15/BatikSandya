<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Livewire\Cart;
use App\Http\Livewire\CartComponent;

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
Route::get('/', [ProductController::class, 'homeProduct']);

// Guest
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registercheck']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'logincheck']);

// Admin & User
Route::get('/profile', [ProductController::class, 'profile']);
Route::get('/edit-profile', [ProductController::class, 'editProfile']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/forget-password-initial', [AuthController::class, 'forgetPasswordEmail']);
Route::get('/forget-password', [AuthController::class, 'forgetPassword']);

// Admin
Route::get('/manage', [ProductController::class, 'adminProduct']);
Route::get('/add', [ProductController::class, 'addProductView']);
Route::post('/add', [ProductController::class, 'addProduct']);
Route::get('/edit/{product}', [ProductController::class, 'editProductView']);
Route::post('/edit/{product}', [ProductController::class, 'editProduct']);
Route::get('/delete/{product}', [ProductController::class, 'delete']);
Route::get('/inbox', [TransactionController::class, 'inbox']);
Route::get('/confirm/{transactionHeader}', [TransactionController::class, 'confirm']);

// User
Route::get('/cart', CartComponent::class);
Route::post('/addcart/{product}', [TransactionController::class, 'addCart']);
Route::get('/deletecart/{cart}', [TransactionController::class, 'erase']);
Route::get('/purchase', [TransactionController::class, 'purchase']);
Route::get('/history', [TransactionController::class, 'history']);


