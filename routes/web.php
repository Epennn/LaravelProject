<?php

namespace App\Http\Controllers;
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

Route::get('/login', [AuthController::class, 'viewLogin']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'viewRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/editPassword', [AuthController::class, 'viewEditPassword']);
Route::post('/editPassword', [AuthController::class, 'editPassword']);

// Member
Route::get('/userHome', [UserController::class, 'viewHome'])->middleware('member');
Route::get('/product/{id}', [UserController::class, 'viewDetail'])->middleware('member');
Route::get('/search', [UserController::class, 'viewSearch'])->middleware('member');
Route::get('/search/product', [UserController::class, 'searchProduct'])->middleware('member');
Route::get('/profile', [UserController::class, 'viewProfile'])->middleware('member');
Route::get('/editProfile', [UserController::class, 'viewEditProfile'])->middleware('member');
Route::post('/editProfile', [UserController::class, 'editProfile'])->middleware('member');
Route::post('/addCart/{id}', [UserController::class, 'addCart'])->middleware('member');
Route::get('/cart', [UserController::class, 'viewCart'])->middleware('member');
Route::get('/editCart/{id}', [UserController::class, 'viewEditcart'])->middleware('member');
Route::post('/editCart/{id}', [UserController::class, 'editcart'])->middleware('member');
Route::get('/deleteItem/{id}', [UserController::class, 'deleteItem'])->middleware('member');
Route::get('/checkOut', [UserController::class, 'checkOut'])->middleware('member');
Route::get('/history', [UserController::class, 'viewHistory'])->middleware('member');

//Admin
Route::get('/adminHome', [AdminController::class, 'viewHome'])->middleware('admin');
Route::get('/adminProduct/{id}', [AdminController::class, 'viewDetail'])->middleware('admin');
Route::get('/adminSearch', [AdminController::class, 'viewSearch'])->middleware('admin');
Route::get('/adminSearch/product', [AdminController::class, 'searchProduct'])->middleware('admin');
Route::get('/adminProfile', [AdminController::class, 'viewProfile'])->middleware('admin');
Route::get('/addItem', [AdminController::class, 'viewAddItem'])->middleware('admin');
Route::post('/addItem', [AdminController::class, 'addItem'])->middleware('admin');
Route::get('/deleteProduct/{id}', [AdminController::class, 'deleteProduct'])->middleware('admin');

