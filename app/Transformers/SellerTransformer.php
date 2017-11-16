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

          'links' => [
            [
              'rel' => 'self',
              'href' => route('sellers.show', $seller->id),
            ],
            [
              'rel' => 'seller.categories',
              'href' => route('sellers.categories.index', $seller->id),
            ],
            [
              'rel' => 'seller.products',
              'href' => route('sellers.products.index', $seller->id),
            ],
            [
              'rel' => 'seller.buyers',
              'href' => route('sellers.buyers.index', $seller->id),
            ],
            [
              'rel' => 'seller.transactions',
              'href' => route('sellers.transactions.index', $seller->id),
            ],
            [
              'rel' => 'user',
              'href' => route('users.show', $seller->id),
            ],
          ],
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

  public static function transformedAttribute($index) {
    $attributes = [
      'id' => 'id',
      'name' => 'name',
      'email' => 'email',
      'verified' => 'isVerified',
      'created_at' => 'created',
      'updated_at' => 'updated',
      'deleted_at' => 'deleted',
    ];

    return isset($attributes[$index]) ? $attributes[$index] : null;
  }
}
