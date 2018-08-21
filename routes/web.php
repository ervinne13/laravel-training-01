<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', function () {
    return view('welcome');
});

Route::get('test-purchase-order', 'TestController@testRelationships');
Route::get('test-user', 'TestController@testManyToMany');

Route::get('user/{userId}', function(App\User $user, $userId) {
    return $user->with('roles')->whereId($userId)->first();
});

Route::group(['prefix' => 'module'], function() {
    Route::resource('po', 'PurchaseOrderController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
