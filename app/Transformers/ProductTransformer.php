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
          'created' => $product->created_at,
          'updated' => $product->updated_at,
          'deleted' => isset($product->deleted_at) ? $product->deleted_at : null,
        ];
    }
}
