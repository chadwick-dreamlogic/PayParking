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
    return redirect('/views/login');
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('auth/login', 'AuthController@login');

    $router->get('get-user-details/{vehicle_reg_no}', 'UserController@getUserDetails');
    $router->post('create-user', 'UserController@createUser');

    $router->get('get-package', 'PackageController@getPackage');
    $router->post('create-package', 'PackageController@createPackage');
    $router->put('update-package/{id}', 'PackageController@updatePackage');
    $router->delete('delete-package/{id}', 'PackageController@deletePackage');

    $router->get('get-user-transactions/{user_id}', 'TransactionController@getUserTransactions');
    $router->post('buy-pass', 'TransactionController@buyPass');

});

$router->group(['prefix' => 'views'], function () use ($router) {
    $router->get('login', function () {
        return view('auth/login');
    });  

    $router->get('home', function () {
        return view('pages/home', ['path'=>'home']);
    });

    $router->get('packages', 'PackageController@listPackages');

    $router->get('users', 'UserController@listUsers');
});