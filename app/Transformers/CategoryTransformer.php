<?php

namespace App\Transformers;

use App\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Category $category)
    {
        return [
          'id' => $category->id,
          'title' => $category->name,
          'details' => $category->description,
          'created' => (string)$category->created_at,
          'updated' => (string)$category->updated_at,
          'deleted' => isset($category->deleted_at) ? (string)$category->deleted_at : null,

          'links' => [
            [
              'rel' => 'self',
              'href' => route('categories.show', $category->id),
            ],
            [
              'rel' => 'category.buyers',
              'href' => route('categories.buyers.index', $category->id),
            ],
            [
              'rel' => 'category.products',
              'href' => route('categories.products.index', $category->id),
            ],
            [
              'rel' => 'category.sellers',
              'href' => route('categories.sellers.index', $category->id),
            ],
            [
              'rel' => 'category.transactions',
              'href' => route('categories.transactions.index', $category->id),
            ],
          ],
        ];
    }

  public static function originalAttribute($index) {
    $attributes = [
      'id' => 'id',
      'title' => 'name',
      'details' => 'description',
      'created' => 'created_at',
      'updated' => 'updated_at',
      'deleted' => 'deleted_at',
    ];

    return isset($attributes[$index]) ? $attributes[$index] : null;
  }
}
