<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [RegisterController::class, 'register'])->name('register');

Route::get("/create-product", [ProductController::class, 'create'])->name('product.create');
Route::post("/store-product", [ProductController::class, 'store'])->name('product.store');

// desafio 1
Route::resource('/', InvoiceController::class);

Route::middleware('auth')->group(function () {
    /*Route::get('/dashboard', function () {
        return view('dashboard');
    });*/
    Route::resource("/task", TaskController::class)->middleware('verify_task');
    Route::resource("/logs", LogController::class);
});
