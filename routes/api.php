<?php

use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\Auth\LoginController as LoginControllerAlias;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginControllerAlias::class, 'login']);
Route::post('/auth/facebook/callback', [FacebookController::class, 'loginWithFacebook']);
Route::get('user', [UserController::class, 'getUser'])->middleware('auth:sanctum');

//CATEGORIES & PRODUCTS
Route::get('categories', [CategoriesController::class, 'getCategories']);
Route::get('products', [ProductsController::class, 'getProducts']);

//CART ROUTES
Route::resource('cart', CartController::class)->middleware('auth:sanctum');

//CHECKOUT ROUTES
Route::get('get_checkout_resources',[\App\Http\Controllers\CheckoutController::class ,'getCheckOutDetails']);

