<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\User; 
use App\Product;
use App\UserProduct;

class UserProductController extends Controller
{
    public function __construct()
    {
		//$this->middleware('auth:api', ['except' => ['returnToken','getToken']]);    
		$this->middleware('auth:api');
	}

	public function returnToken(Request $request){
		// if ( Auth::attempt( array('api_token' => $request->api_token) ) ){
			// 		$user = User::where('api_token', '=', $request->api_token)->first();
			// 		if(!empty($user->api_token)){
		  //               	return response()->json($user->api_token);
		  //           	}
		  //       }
		return response()->json(Auth::guard('api')->user());
	}

	// public function addProduct(Request $request){

	// }

	// public function updateProduct(Request $request){
		
	// }

	// public function deleteProduct(Request $request){
		
	// }

	// public function getProduct(Request $request){
		
	// }

	// public function uploadProductImage(Request $request){
		
	// }

	// public function getAllProducts(Request $request){
		
	// }

	// public function addProductToUser(Request $request){
		
	// }

	// public function removeProductFromUser(Request $request){
		
	// }

	// public function listUserProducts(Request $request){
		
	// }

}
