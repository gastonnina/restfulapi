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
          'created' => $transaction->created_at,
          'updated' => $transaction->updated_at,
          'deleted' => isset($transaction->deleted_at) ? $transaction->deleted_at : null,
        ];
    }
}
