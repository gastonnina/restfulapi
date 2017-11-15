<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
          'id' => $user->id,
          'name' => $user->name,
          'email' => $user->email,
          'isVerified' => (boolean)$user->verified,
          'isAdmin' => ($user->admin === 'true'),
          'created' => (string)$user->created_at,
          'updated' => (string)$user->updated_at,
          'deleted' => isset($user->deleted_at) ? (string)$user->deleted_at : null,

          'links' => [
            [
              'rel' => 'self',
              'href' => route('users.show', $user->id),
            ]
          ],
        ];
    }

    public static function originalAttribute($index) {
      $attributes = [
        'id' => 'id',
        'isVerified' => 'verified',
        'name' => 'name',
        'email' => 'email',
        'isAdmin' => 'admin',
        'created' => 'created_at',
        'updated' => 'updated_at',
        'deleted' => 'deleted_at',
      ];

      return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
