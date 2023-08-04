<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function like(Request $request, $postId)
    {
        $like = Like::create([
            'user_id' => auth()->user()->id,
            'post_id' => $postId,
            'comment_id' => 0
        ]);

        return redirect()->back()->with('message', 'Редирект выполнен успешно.'); 
    }

    public function unlike($postId)
    {
        Like::where('user_id', auth()->user()->id)->where('post_id', $postId)->delete();

        return redirect()->back()->with('message', 'Редирект выполнен успешно.');
    }

}
