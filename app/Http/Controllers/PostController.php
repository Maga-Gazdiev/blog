<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{
   public function index()
   {
      $post = Post::paginate(10);
      return view('welcome', compact("post"));
   }

   public function create()
   {
      return view('post.create');
   }

   public function store(Request $request)
   {
      $this->validate($request, [
         'name' => 'required|min:5',
         'body' => 'required|min:70'
      ]);
      $post = new Post();
      $user = auth()->user();
      $post->name = $request->name;
      $post->body = $request->body;
      $post->user_id = $user->id;
      $post->save();

      return redirect()->route('posts');
   }

   public function show($id)
   {
      $post = Post::findOrFail($id);
      return view('post.show', compact('post'));
   }

   public function edit($id)
   {
      $post = Post::findOrFail($id);
      return view('post.edit', compact('post'));
   }

   public function update(Request $request, string $id)
   {
      $this->validate($request, [
         'name' => 'min:6',
         'body' => 'required|min:70'
      ]);
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
