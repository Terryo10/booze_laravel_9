<?php

use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\Auth\LoginController as LoginControllerAlias;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoriesController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register',[RegisterController::class, 'register']);
Route::post('/login',[LoginControllerAlias::class, 'login']);
Route::post('/auth/facebook/callback', [FacebookController::class, 'loginWithFacebook']);

//CATEGORIES & PRODUCTS
Route::get('categories',[CategoriesController::class ,'getCategories']);
