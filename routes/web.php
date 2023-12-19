<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', AppController::class)->name('index');

Route::resource('menus', MenuController::class);

Route::get('/order', [OrderController::class, 'order']);
Route::get('/order', [OrderController::class, 'createOrder']);


