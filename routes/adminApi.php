<?php

use Illuminate\Http\Request;

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


Route::group([ 'namespace' => 'Admin' ], function () {
    Route::post('login', 'AuthController@login');
});

Route::group([ 'namespace' => 'Admin', 'middleware' => 'auth.admin', 'prefix' => 'api'], function () {
    Route::get('list-user', 'AdminController@listUser');
});
