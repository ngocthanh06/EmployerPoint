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

Route::group([ 'namespace' => 'User' ], function () {
    Route::post('login', 'AuthController@login');
});

Route::group([ 'middleware' => 'auth.user', 'as' => 'user.'], function () {
    Route::get('get-point', 'PointController@index')->name('get-point');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
