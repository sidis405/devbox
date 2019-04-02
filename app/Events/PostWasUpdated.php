<?php

namespace App\Events;

use App\Post;
use Illuminate\Queue\SerializesModels;

class PostWasUpdated
{
    use SerializesModels;

    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
}
