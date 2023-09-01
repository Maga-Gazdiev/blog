<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CommentComponent extends Component
{
    public $post;

    public function __construct($post)
    {
        $this->post = $post;
    }
    
    public function render()
    {
        return view('components.comment-component');
    }    
}
