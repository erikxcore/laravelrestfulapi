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
Route::post('getToken', 'UserProductController@returnToken');

});



//Route::post('userproduct-v1.0.0/getToken', 'UserProductController@returnToken');

//Route::get('userproduct-v1.0.0/getToken', 'UserProductController@returnToken');