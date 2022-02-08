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
Route::resource('books', BooksController::class);
Route::resource('cart', CartController::class);

Route::get('about', [AboutController::class, 'index'])->name('about');
Route::get('contact', [AboutController::class, 'contact'])->name('contact');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login/confirm', [AuthController::class, 'loginConfirmed'])->name('login_store');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register/confirm', [AuthController::class, 'registerConfirmed'])->name('register_store');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
