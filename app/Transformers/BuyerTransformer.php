<?php

namespace App\Transformers;

use App\Buyer;
use League\Fractal\TransformerAbstract;

class BuyerTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Buyer $buyer)
    {
        return [
          'id' => $buyer->id,
          'name' => $buyer->name,
          'email' => $buyer->email,
          'isVerified' => (boolean)$buyer->verified,
          'created' => $buyer->created_at,
          'updated' => $buyer->updated_at,
          'deleted' => isset($buyer->deleted_at) ? $buyer->deleted_at : null,
        ];
    }
}
