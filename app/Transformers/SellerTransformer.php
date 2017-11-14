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
          'created' => (string)$seller->created_at,
          'updated' => (string)$seller->updated_at,
          'deleted' => isset($seller->deleted_at) ? (string)$seller->deleted_at : null,
        ];
    }

  public static function originalAttribute($index) {
    $attributes = [
      'id' => 'id',
      'name' => 'name',
      'email' => 'email',
      'isVerified' => 'verified',
      'created' => 'created_at',
      'updated' => 'updated_at',
      'deleted' => 'deleted_at',
    ];

    return isset($attributes[$index]) ? $attributes[$index] : null;
  }
}
