<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(PopulateUsers::class);
         $this->call(PopulateProducts::class);
         $this->call(PopulateUserProducts::class);
    }
}
