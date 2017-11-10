<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::truncate();

      User::flushEventListeners();

      $quantity = 1000;

      factory(User::class, $quantity)->create();
    }
}
