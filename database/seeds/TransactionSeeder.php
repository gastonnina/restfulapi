<?php

use App\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Transaction::truncate();
      
      $quantity = 1000;

      factory(Transaction::class, $quantity)->create();
    }
}
