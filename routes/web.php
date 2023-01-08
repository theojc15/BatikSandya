<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

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

// Admin
Route::get('/manage', [ProductController::class, 'adminProduct']);
Route::get('/add', [ProductController::class, 'addProductView']);
Route::post('/add', [\App\Http\Controllers\ProductController::class, 'addProduct']);
Route::get('/edit', [ProductController::class, 'editProduct']);

// User
Route::get('/cart', [ProductController::class, 'cart']);

Route::get('/inbox', [ProductController::class, 'inbox']);
