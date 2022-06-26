<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('categories', CategoryController::class);
    $router->resource('sub_categories', SubCategoryController::class);
    $router->resource('products', ProductsController::class);
    $router->resource('delivery-times', DeliveryTimesController::class);
    $router->resource('payment-methods', PaymentMethodsController::class);
    $router->resource('extras', ExtrasController::class);
});
