<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfficeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('office.index', compact('user'));
    }

    public function postsLike()
    {
        $user = auth()->user();
        $user = User::find($user->id);

        $likedPosts = $user->likedPosts()->orderBy('likes.created_at', 'desc')->paginate(12);

        return view('office.posts', compact('likedPosts'));
    }

    public function posts()
    {
        $user = auth()->user();
        $post = $user->posts()->orderBy('created_at', 'desc')->paginate(12);
        return view('office.allPosts', compact('post'));
    }
    /////////////////
    public function comment()
    {
        $user = auth()->user();
        $user = User::find($user->id);

        $comments = $user->comments()->orderBy('created_at', 'desc')->paginate(12);

        return view('office.comment', compact("comments"));
    }
    public function likedComment()
    {
        $user = auth()->user();
        $user = User::find($user->id);
        
        $comments = $user->likedComments()->orderBy('likes.created_at', 'desc')->paginate(12);

        return view('office.likedComment', compact("comments"));
    }
}
