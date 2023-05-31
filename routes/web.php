<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
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

Route::get('/', function () {
    return view('index');
});
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'authenticate']);
Route::get('/profile', [UserController::class, 'index'])->middleware('auth');
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/sample', [SampleController::class, 'index']);
Route::get('/add-sample', [SampleController::class, 'show']);
Route::post('/sample', [SampleController::class, 'store']);
Route::get('/order', [OrderController::class, 'index'])->middleware('auth');
Route::post('/order/create', [OrderController::class, 'store'])->middleware('auth');
Route::get('/payment/{id}', [PaymentController::class, 'index'])->name('payment');
Route::put('/payment/{id}', [PaymentController::class, 'update']);
Route::get('/add-product', [ProductController::class, 'index']);
Route::post('/product', [ProductController::class, 'store']);
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth');
