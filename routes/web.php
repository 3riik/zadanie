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
    return view('register');
});
Route::get('register', ['as' => 'register', 'uses' => 'UserController@register']);
Route::post('register', ['as' => 'register_store', 'uses' => 'UserController@store']);
Route::get('compare', ['as' => 'compare', 'uses' => 'UserController@compare_form']);
Route::post('compare', ['as' => 'compare_result', 'uses' => 'UserController@compare_result']);