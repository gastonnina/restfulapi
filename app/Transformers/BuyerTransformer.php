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
          'created' => (string)$buyer->created_at,
          'updated' => (string)$buyer->updated_at,
          'deleted' => isset($buyer->deleted_at) ? (string)$buyer->deleted_at : null,
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
