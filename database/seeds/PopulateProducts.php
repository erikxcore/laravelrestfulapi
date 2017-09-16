<?php

use Illuminate\Database\Seeder;

class PopulateProducts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for($i = 1; $i <= 20; $i++){

	        DB::table('products')->insert([
	            'name' => 'Product ' . $i,
	            'description' => 'This is product ' . $i,
	            'price' => '$' . $i,
	            'image' => null,      
	        ]);

    	}
    }
}
