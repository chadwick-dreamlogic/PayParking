<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    
    $router->get('get-user-details/{vehicle_reg_no}', 'UserController@getUserDetails');
    $router->post('create-user', 'UserController@createUser');
    
    $router->get('get-package', 'PackageController@getPackage');
    $router->post('create-package', 'PackageController@createPackage');

    $router->get('get-user-transactions/{user_id}', 'TransactionController@getUserTransactions');
    $router->post('buy-pass', 'TransactionController@buyPass');
});