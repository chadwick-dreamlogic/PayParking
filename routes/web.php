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
    return redirect('/admin/login');
});

// App Routes
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('get-user-details/{vehicle_reg_no}', 'Api\UserController@getUserDetails');

    $router->get('get-package', 'Api\PackageController@getPackage');
        
    $router->get('get-user-transactions/{user_id}', 'Api\TransactionController@getUserTransactions');
    $router->post('buy-pass', 'Api\TransactionController@buyPass');   
});

// Admin Backend Routes
$router->group(['prefix' => 'admin'], function () use ($router) {
    $router->get('login', function () {
        return view('auth/login');
    });  
    $router->post('auth/login', 'Admin\AuthController@login');

    $router->get('home', function () {
        return view('pages/home', ['path'=>'home']);
    });

    $router->get('packages', 'Admin\PackageController@listPackages');
    $router->post('create-package', 'Admin\PackageController@createPackage');
    $router->put('update-package/{id}', 'Admin\PackageController@updatePackage');
    $router->delete('delete-package/{id}', 'Admin\PackageController@deletePackage');

    $router->get('users', 'Admin\UserController@listUsers');  
    $router->post('create-user', 'Admin\UserController@createUser');
    $router->put('update-user/{id}', 'Admin\UserController@updateUser');
    $router->delete('delete-user/{id}', 'Admin\UserController@deleteUser');
   
});