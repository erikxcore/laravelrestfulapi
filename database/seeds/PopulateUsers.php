<?php

use Illuminate\Database\Seeder;

class PopulateUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'email' => 'eric@test.xyz',
            'password' => bcrypt('password'),
            'first_name' => 'eric',
            'last_name' => 'barber',
            'api_token' => '111111111111111111111111111111111111111111111111111111111111111',       
        ]);

        DB::table('users')->insert([
            'email' => 'tom@test.xyz',
            'password' => bcrypt('password'),
            'first_name' => 'tom',
            'last_name' => 'farber',
            'api_token' => str_random(60),       
        ]);

        DB::table('users')->insert([
            'email' => 'ed@test.xyz',
            'password' => bcrypt('password'),
            'first_name' => 'ed',
            'last_name' => 'larber',
            'api_token' => str_random(60),       
        ]);

         DB::table('users')->insert([
            'email' => 'jess@test.xyz',
            'password' => bcrypt('password'),
            'first_name' => 'jess',
            'last_name' => 'jarber',
            'api_token' => str_random(60),       
        ]);

         DB::table('users')->insert([
            'email' => 'pete@test.xyz',
            'password' => bcrypt('password'),
            'first_name' => 'pete',
            'last_name' => 'parber',
            'api_token' => str_random(60),       
        ]);
     }
}
