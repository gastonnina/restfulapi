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
          'created' => $category->created_at,
          'updated' => $category->updated_at,
          'deleted' => isset($category->deleted_at) ? $category->deleted_at : null,
        ];
    }
}
