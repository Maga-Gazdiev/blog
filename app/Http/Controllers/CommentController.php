<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
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

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return view('comment.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'body' => 'required|max:255|min:1',
            'user_id' => 'exists:users,id',
        ]);

        $user = Auth::user();
        $comment->update([
            'post_id' => $request->post_id,
            'user_id' => $user->id,
            'body' => $request->body,
        ]);

        return redirect()->route('posts.show', $request->post_id);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->back()->with('success', 'Комментарий успешно удален.');
    }
}
