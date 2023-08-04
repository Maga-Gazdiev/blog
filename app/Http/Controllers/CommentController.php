<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'body' => 'required|max:255',
            'user_id' => 'exists:users,id',
        ]);

        $user = Auth::user();
        
        Comment::create([
            'post_id' => $request->post_id,
            'user_id' => $user->id,
            'body' => $request->body,
        ]);

        return redirect()->route('posts.show', $request->post_id);
    }
}
