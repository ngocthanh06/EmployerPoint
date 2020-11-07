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

Route::group([ 'namespace' => 'Admin', 'middleware' => 'auth.admin', 'prefix' => 'api', 'as' => 'admin.'], function () {
    Route::get('list-user', 'AdminController@listUser')->name('list-user');
    Route::post('add-user', 'AdminController@addUser')->name('add-user');
    Route::post('edit-user', 'AdminController@editUser')->name('edit-user');
    Route::get('get-user', 'AdminController@getUser')->name('get-user');
    Route::get('get-point', 'AdminController@getPoint')->name('get-point');
    Route::get('success-point', 'AdminController@successPoint')->name('success-point');
    Route::get('get-criterias', 'AdminController@getCriterias')->name('get-criterias');
});
