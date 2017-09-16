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
		$this->middleware('auth:api', ['except' => ['returnToken','getToken']]);    
	}

	//Test method

	public function returnToken(Request $request){
		return response()->json(Auth::guard('api')->user()->api_token);
	}

	public function getAllProducts(Request $request){
		return response()->json(Product::all());
	}

	//Token Required for below methods

	//Product CRUD

	public function addProduct(Request $request){
		//This should really be custom middleware or a trait rather than repeated code.
		$content = $request->getContent();
	    if (!empty($content)){
	     if(!json_decode($content,true)){
			return response()->json(['error' => 'Please provide valid JSON.'], 400);
	     }else{
	     	$content = json_decode($content,true);
	     }
	    }else{
			return response()->json(['error' => 'Please provide JSON.'], 400);
	    }

		$userJson = $content;
		if(isset($userJson['product'])){
			$tempName = $userJson['product']['name'] ?? null;
			$tempDesc = $userJson['product']['description'] ?? null;
			$tempPrice = $userJson['product']['price'] ?? null;
			$tempImage = $userJson['product']['image'] ?? null;
			if(!empty($tempName) && !empty($tempDesc) && !empty($tempPrice)){
				Product::create(array(
				        'name' => $tempName,
				        'description' => $tempDesc,
				        'price' => $tempPrice,
				        'image' => $tempImage
				    ));
			}else{
				return response()->json(['error' => 'Please provide valid product JSON.'], 400);
			}
			return response()->json(['Success' => 'Product added.'], 200);
		}else{
			return response()->json(['error' => 'Please provide valid JSON.'], 400);
		}
	}

	public function getProduct(Request $request){
		$content = $request->getContent();
	    if (!empty($content)){
	     if(!json_decode($content,true)){
			return response()->json(['error' => 'Please provide valid JSON.'], 400);
	     }else{
	     	$content = json_decode($content,true);
	     }
	    }else{
			return response()->json(['error' => 'Please provide JSON.'], 400);
	    }
		$userJson = $content;
		if(isset($userJson['product'])){
			if(isset($userJson['product']['name']) && isset($userJson['product']['id'])){
    			$product = Product::where('name', '=', $userJson['product']['name'])->where('id', '=', $userJson['product']['id'])->first();
				return response()->json($product, 200);
			}else if(isset($userJson['product']['name'])){
    			$product = Product::where('name', '=', $userJson['product']['name'])->first();
				return response()->json($product, 200);
			}else if(isset($userJson['product']['id'])){
				$product = Product::find($userJson['product']['id']);
				return response()->json($product, 200);
			}
		}else{
			return response()->json(['error' => 'Please provide valid JSON.'], 400);
		}
	}

	public function updateProduct(Request $request){
		$content = $request->getContent();
	    if (!empty($content)){
	     if(!json_decode($content,true)){
			return response()->json(['error' => 'Please provide valid JSON.'], 400);
	     }else{
	     	$content = json_decode($content,true);
	     }
	    }else{
			return response()->json(['error' => 'Please provide JSON.'], 400);
	    }

		$userJson = $content;
		if(isset($userJson['product'])){
			if(isset($userJson['product']['id'])){
				$product = Product::where('id', $userJson['product']['id'])->first();
				if($product) {
				   	if(isset($userJson['product']['name']) && 
				   		isset($userJson['product']['description']) &&
				   		isset($userJson['product']['price'])){
					   		$product->name = $userJson['product']['name'];
					   		$product->description = $userJson['product']['description'];
					   		$product->price = $userJson['product']['price'];
					   		if(isset($userJson['product']['image'])){
					   			$product->image = $userJson['product']['image'];
					   		}
					   		if($product->name != ''){
					   			$product->save();
				    			return response()->json(['Success' => 'Product updated.'], 200);
				    		}else{
								return response()->json(['error' => 'Please provide a valid Product JSON object with a valid name.'], 400);
				    		}
				   	}else{
						return response()->json(['error' => 'Please provide a valid Product JSON.'], 400);
				   	}
				}else{
					return response()->json(['error' => 'Please provide a valid product ID.'], 400);
				}
			}
		}else{
			return response()->json(['error' => 'Please provide valid JSON.'], 400);
		}	
	}

	public function deleteProduct(Request $request){
		$content = $request->getContent();
	    if (!empty($content)){
	     if(!json_decode($content,true)){
			return response()->json(['error' => 'Please provide valid JSON.'], 400);
	     }else{
	     	$content = json_decode($content,true);
	     }
	    }else{
			return response()->json(['error' => 'Please provide JSON.'], 400);
	    }

		$userJson = $content;
		if(isset($userJson['product'])){
			if(isset($userJson['product']['id'])){
				$product = Product::where('id', $userJson['product']['id'])->first();
				if($product) {
				    $product->delete();
				    return response()->json(['Success' => 'Product deleted.'], 200);
				}else{
					return response()->json(['error' => 'Please provide a valid product ID.'], 400);
				}
			}
		}else{
			return response()->json(['error' => 'Please provide valid JSON.'], 400);
		}
	}

	public function updateProductImage(Request $request){
		$content = $request->getContent();
		    if (!empty($content)){
		     if(!json_decode($content,true)){
				return response()->json(['error' => 'Please provide valid JSON.'], 400);
		     }else{
		     	$content = json_decode($content,true);
		     }
		    }else{
				return response()->json(['error' => 'Please provide JSON.'], 400);
		    }

			$userJson = $content;
				if(isset($userJson['product'])){
					if(isset($userJson['product']['id'])){
						$product = Product::where('id', $userJson['product']['id'])->first();
						if($product) {
						   	if(isset($userJson['product']['image'])){
							   			$product->image = $userJson['product']['image'];
							   			$product->save();
						    			return response()->json(['Success' => 'Product image updated.'], 200);
						    		}else{
										return response()->json(['error' => 'Please provide a valid Product JSON object with a valid image.'], 400);
						    		}
						   	}else{
								return response()->json(['error' => 'Please provide a valid Product JSON.'], 400);
						   	}
						}else{
							return response()->json(['error' => 'Please provide a valid product ID.'], 400);
						}
				}else{
					return response()->json(['error' => 'Please provide valid JSON.'], 400);
				}	
	 }

	//User-Product Relationships

	// public function addProductToUser(Request $request){
		
	// }

	// public function removeProductFromUser(Request $request){
		
	// }

	// public function listUserProducts(Request $request){
		
	// }

}
