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

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//Route::post('userproduct-v1.0.0/getToken', 'UserProductController@returnToken');
//Route::get('userproduct-v1.0.0/getToken', 'UserProductController@returnToken');

//Route::post('test', 'UserProductController@returnToken');

//Route::get('user/{id}', 'UserControllerController@show');
//Route::post('')

//Route::get('/test', 'UserProductController@returnToken');
