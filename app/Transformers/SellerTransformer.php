<?php

namespace App\Transformers;

use App\Seller;
use League\Fractal\TransformerAbstract;

class SellerTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Seller $seller)
    {
        return [
          'id' => $seller->id,
          'name' => $seller->name,
          'email' => $seller->email,
          'isVerified' => (boolean)$seller->verified,
          'created' => $seller->created_at,
          'updated' => $seller->updated_at,
          'deleted' => isset($seller->deleted_at) ? $seller->deleted_at : null,
        ];
    }
}
