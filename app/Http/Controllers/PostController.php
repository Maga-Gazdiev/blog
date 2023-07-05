<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
   public function index()
   {
      $post = Post::paginate(10);
      return view('post.index', compact("post"));
   }

   public function create()
   {
      return view('post.create');
   }

   public function store(Request $request)
   {
      $post = new Post();
      $post->name = $request->name;
      $post->body = $request->body;
      $post->save();
      return view('post.index', compact("post"));
   }

   public function show(Request $request)
   {
      dd('show');
   }

   public function edit($id)
   {
      $post = Post::findOrFail($id);
      return view('post.edit', compact('post'));
   }

   public function update(Request $request, string $id)
   {
      $post = Post::findOrFail($id);
      $post->name = $request->name;
      $post->body = $request->body;
      $post->save();

      return redirect()->route('posts');
   }

   public function destroy(string $id)
   {
      $post = Post::findOrFail($id);
      $post->delete();
      return redirect()->route('posts');
   }
}
