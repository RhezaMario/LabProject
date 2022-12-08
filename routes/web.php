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

Route::get('/SignIn', [SigninController::class, 'index'])->middleware('guest');
Route::post('/SignIn', [SigninController::class, 'authenticate'])->middleware('guest');
Route::post('/SignOut', [SigninController::class, 'logout'])->middleware('auth');
Route::get('/SignUp', [SignupController::class, 'index'])->middleware('guest');
Route::post('/SignUp', [SignupController::class, 'store'])->middleware('guest');

Route::get('/Profile', [ProfileController::class, 'index'])->middleware('auth');
Route::get('/Home', [ProductController::class, 'Home'])->middleware('auth');
Route::post('/AddItem', [ProductController::class, 'store'])->middleware('admin');
Route::get('/AddItem' , [ProductController::class, 'addpage'])->middleware('admin');

Route::get('/Home/{name}', [ProductController::class, 'productView'])->middleware('auth');

Route::delete('/Products/{id}', [ProductController::class, 'delete'])->middleware('admin');
Route::get('/updateprofile', [ProfileController::class, 'updateprofiles'])->middleware('member');
Route::put('/updateprofile', [ProfileController::class, 'updateprofile'])->middleware('member');
Route::get('/updatepassword', [ProfileController::class, 'updatepasswords'])->middleware('auth');
Route::put('/updatepassword/{id}', [ProfileController::class, 'updatepassword'])->middleware('auth');
Route::get('/Search', [ProductController::class, 'search_product'])->middleware('auth');
Route::post('/AddCart/{id}', [ProductController::class, 'addcart'])->middleware('auth');
Route::get('/Cart', [ProductController::class, 'viewcart'])->middleware('auth');
Route::delete('/CartDelete/{id}', [ProductController::class, 'deletecart'])->middleware('member');
Route::get('/EditCart/{id}', [ProductController::class, 'editcartview'])->middleware('member');
Route::post('/updatecart/{id}', [ProductController::class, 'updatecart'])->middleware('member');
Route::get('/History', [ProductController::class, 'historyindex'])->middleware('member');
Route::get('/Checkout', [ProductController::class, 'checkout'])->middleware('member');

