<?php

namespace App\Transformers;

use App\Transaction;
use League\Fractal\TransformerAbstract;

class TransactionTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Transaction $transaction)
    {
        return [
          'id' => $transaction->id,
          'quantity' => $transaction->quantity,
          'buyer' => $transaction->buyer_id,
          'product' => $transaction->product_id,
          'created' => (string)$transaction->created_at,
          'updated' => (string)$transaction->updated_at,
          'deleted' => isset($transaction->deleted_at) ? (string)$transaction->deleted_at : null,
        ];
    }

  public static function originalAttribute($index) {
    $attributes = [
      'id' => 'id',
      'quantity' => 'quantity',
      'buyer' => 'buyer_id',
      'product' => 'product_id',
      'created' => 'created_at',
      'updated' => 'updated_at',
      'deleted' => 'deleted_at',
    ];

    return isset($attributes[$index]) ? $attributes[$index] : null;
  }
}
