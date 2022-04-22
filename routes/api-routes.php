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

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('auth/register','Api\AuthController@register');

    $router->post('search-user-details', 'Api\UserController@searcfUserDetails');

    $router->get('get-package', 'Api\PackageController@getPackage');

    $router->get('get-user-transactions/{user_id}', 'Api\TransactionController@getUserTransactions');
    $router->post('buy-pass', 'Api\TransactionController@buyPass');   
});