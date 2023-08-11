<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function like($postId)
    {
        $like = Like::create([
            'user_id' => auth()->user()->id,
            'post_id' => $postId,
        ]);

        return redirect()->back()->with('message', 'Редирект выполнен успешно.'); 
    }

    public function unlike($postId)
    {
        Like::where('user_id', auth()->user()->id)->where('post_id', $postId)->delete();

        return redirect()->back()->with('message', 'Редирект выполнен успешно.');
    }

    public function likeComment($postId)
    {
        $like = Like::create([
            'user_id' => auth()->user()->id,
            'comment_id' => $postId,
        ]);

        return redirect()->back()->with('message', 'Редирект выполнен успешно.'); 
    }

    public function unlikeComment($postId)
    {
        Like::where('user_id', auth()->user()->id)->where('comment_id', $postId)->delete();

        return redirect()->back()->with('message', 'Редирект выполнен успешно.');
    }
}
