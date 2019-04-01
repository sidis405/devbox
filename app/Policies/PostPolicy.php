<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Post $post)
    {
        return $post->user_id == $user->id;
    }

    public function delete(User $user, Post $post)
    {
        return $post->user_id == $user->id;
    }
}
