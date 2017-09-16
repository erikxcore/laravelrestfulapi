<?php

use Illuminate\Database\Seeder;

class PopulateUserProducts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


	        for($i = 1; $i <= 15; $i++){
	        	$randomProductId = rand(1,20);
	        	$randomUserId = rand(1,5);
	        	DB::table('user_products')->insert([
	        		'user_id' => $randomUserId,
	            	'product_id' => $randomProductId, 
	        	]);
	        }

        	DB::table('user_products')->insert([
        		'user_id' => 1,
            	'product_id' => 1, 
        	]);
    }
}
