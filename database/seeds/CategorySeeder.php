<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Category::truncate();
      
      $quantity = 30;

      factory(Category::class, $quantity)->create();
    }
}
