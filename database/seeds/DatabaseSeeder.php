<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::statement('SET FOREIGN_KEY_CHECKS = 0');
      
      DB::table('category_product')->truncate();
      
      $this->call(UserSeeder::class);
      $this->call(CategorySeeder::class);
      $this->call(ProductSeeder::class);
      $this->call(TransactionSeeder::class);
      
    }
}
