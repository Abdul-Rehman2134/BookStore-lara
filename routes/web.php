<?php

// use App\Http\Controllers\BooksController;
// use App\Http\Controllers\AboutController;
// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\CartController;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
Route::resource('/', HomeController::class);
Route::resource('books',BooksController::class);

Route::get('about',[AboutController::class,'index'])->name('about');
Route::get('contact',[AboutController::class,'contact'])->name('contact');
Route::get('login',[AuthController::class,'login'])->name('login');
Route::get('register',[AuthController::class,'register'])->name('register');
Route::get('cart',[CartController::class,'index'])->name('cart');
