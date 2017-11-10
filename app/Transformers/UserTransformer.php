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
          'created' => $user->created_at,
          'updated' => $user->updated_at,
          'deleted' => isset($user->deleted_at) ? $user->deleted_at : null,
        ];
    }
}
