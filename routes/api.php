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

Route::group(['prefix' => 'v1'], function() {
    Route::post('login', 'Auth\LoginController@loginViaJWT');

    Route::group(['middleware' => ['jwt.auth']], function() {
        Route::get('logout', 'Auth\LoginController@logout');

        Route::get('test', function() {
            return response()->json(['foo' => 'bar']);
        });
    });
});

