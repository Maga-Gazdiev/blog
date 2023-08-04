<?php

namespace App\Http\Controllers;

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
        $likedPosts = $user->likes()->with('post')->get();
        
        return view('office.posts', compact('likedPosts', 'user'));
    }

    public function posts()
    {
        $user = auth()->user();
        return view('office.allPosts', compact('user'));
    }
}
