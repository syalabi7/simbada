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
//        Eloquent::unguard();
        // $this->call(UsersTableSeeder::class);
//        $this->call(LocationsTableSeeder::class);
//        $this->call(addCategorySeeder::class);
//        $this->call(addKondisiSeeder::class);
//        $this->call(addSumberSeeder::class);
        $this->call(addAsetSeeder::class);
    }
}
