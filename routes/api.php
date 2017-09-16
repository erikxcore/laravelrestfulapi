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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'v1'], function ()
{

Route::get('getToken', 'UserProductController@returnToken');
Route::get('getAllProducts', 'UserProductController@getAllProducts');

Route::post('addProduct', 'UserProductController@addProduct');
Route::post('getProduct', 'UserProductController@getProduct');
Route::post('deleteProduct', 'UserProductController@deleteProduct');
Route::post('updateProduct', 'UserProductController@updateProduct');
Route::post('updateProductImage', 'UserProductController@updateProductImage');

Route::post('addProductToUser', 'UserProductController@addProductToUser');
Route::post('removeProductFromUser', 'UserProductController@removeProductFromUser');
Route::get('listUserProducts', 'UserProductController@listUserProducts');

});
