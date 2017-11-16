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

          'links' => [
            [
              'rel' => 'self',
              'href' => route('transactions.show', $transaction->id),
            ],
            [
              'rel' => 'transaction.categories',
              'href' => route('transactions.categories.index', $transaction->id),
            ],
            [
              'rel' => 'transaction.sellers',
              'href' => route('transactions.sellers.index', $transaction->id),
            ],
            [
              'rel' => 'buyer',
              'href' => route('buyers.show', $transaction->buyer_id),
            ],
            [
              'rel' => 'product',
              'href' => route('products.show', $transaction->product_id),
            ],
          ],
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

  public static function transformedAttribute($index) {
    $attributes = [
      'id' => 'id',
      'quantity' => 'quantity',
      'buyer_id' => 'buyer',
      'product_id' => 'product',
      'created_at' => 'created',
      'updated_at' => 'updated',
      'deleted_at' => 'deleted',
    ];

    return isset($attributes[$index]) ? $attributes[$index] : null;
  }
}
