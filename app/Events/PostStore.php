<?php

namespace App\Events;


use App\Models\Post;

class PostStore
{

    /**
     * Create a new event instance.
     *
     * @return void
     */

     public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
}