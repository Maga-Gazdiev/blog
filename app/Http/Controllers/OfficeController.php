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

        $likedPosts = $user->likedPosts()->orderBy('likes.created_at', 'desc')->get();

        return view('office.posts', compact('likedPosts'));
    }

    public function posts()
    {
        $user = auth()->user();
        return view('office.allPosts', compact('user'));
    }
    /////////////////
    public function comment()
    {
        $user = auth()->user();
        $user = User::find($user->id);

        $comments = $user->comments;

        return view('office.comment', compact("comments"));
    }
    public function likedComment()
    {
        $user = auth()->user();
        $user = User::find($user->id);
        
        $comments = $user->likedComments()->orderBy('likes.created_at', 'desc')->get();

        return view('office.likedComment', compact("comments"));
    }
}
