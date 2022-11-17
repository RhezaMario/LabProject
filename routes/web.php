<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignupController;
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
Route::get('/CustomerHome', [ProductController::class, 'CustomerHome'])->middleware('auth');



Route::get('/SignIn', [SigninController::class, 'index'])->name('login')->middleware('guest');
Route::post('/SignIn', [SigninController::class, 'authenticate']);
Route::post('/SignOut', [SigninController::class, 'logout']);
Route::get('/SignUp', [SignupController::class, 'index'])->middleware('guest');
Route::post('/SignUp', [SignupController::class, 'store']);

Route::get('/Profile', [ProfileController::class, 'index'])->middleware('auth');
Route::get('/AdminHome', [ProductController::class, 'AdminHome']);
Route::post('/AddItem', [ProductController::class, 'store']);
Route::get('/AddItem' , [ProductController::class, 'addpage']);

Route::get('/AdminHome/{name}', [ProductController::class, 'productView']);



