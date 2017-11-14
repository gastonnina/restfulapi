<?php

namespace App\Transformers;

use App\Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Product $product)
    {
        return [
          'id' => $product->id,
          'title' => $product->name,
          'details' => $product->description,
          'stock' => $product->quantity,
          'status' => $product->status,
          'seller' => $product->seller_id,
          'image' => url("img/{$product->image}"),
          'created' => (string)$product->created_at,
          'updated' => (string)$product->updated_at,
          'deleted' => isset($product->deleted_at) ? (string)$product->deleted_at : null,
        ];
    }

  public static function originalAttribute($index) {
    $attributes = [
      'id' => 'id',
      'title' => 'name',
      'details' => 'description',
      'stock' => 'quantity',
      'seller' => 'seller_id',
      'image' => 'image',
      'created' => 'created_at',
      'updated' => 'updated_at',
      'deleted' => 'deleted_at',
    ];

    return isset($attributes[$index]) ? $attributes[$index] : null;
  }
}
