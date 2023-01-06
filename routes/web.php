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

Route::get('/', [ProductController::class, 'homeProduct']);

Route::get('/dashboard', function () {
    return view('all.dashboard');
});

Route::get('/detail/{id}', [ProductController::class, 'detail']);

Route::get('/category', function () {
    return view('all.category');
});

Route::get('/manage', [ProductController::class, 'adminProduct']);
Route::get('/add', [ProductController::class, 'addProduct']);

// Guest
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registercheck']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'logincheck']);

// Admin & User
Route::get('/logout', [AuthController::class, 'logout']);
