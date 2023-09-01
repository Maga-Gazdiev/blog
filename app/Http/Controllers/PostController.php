<?php

namespace App\Http\Controllers;

use App\Helpers\Telegram;
use App\Models\Post;
use App\Events\PostStore;
use Illuminate\Http\Request;

class PostController extends Controller
{
   public function index()
   {
      $sort = request()->input('sort', 'new');
      $keyword = request()->input('keyword', '');

      $validatedData = request()->validate([
         'sort' => ['nullable', 'in:new,old'],
         'keyword' => 'nullable|string|max:255',
     ]);
     
      $query = Post::orderBy('created_at', $sort === 'old' ? 'asc' : 'desc');
   
      if (!empty($keyword)) {
         $query->where('name', 'like', "%$keyword%");
      }

      $post = $query->paginate(12);
      return view('welcome', compact('post', 'keyword'));
   }

   public function create()
   {
      return view('post.create');
   }

   public function store(Request $request)
   {
      $this->validate($request, [
         'name' => 'required|min:6|max:255',
         'body' => 'required|min:150'
      ]);
      $post = new Post();
      $user = auth()->user();
      $post->name = $request->name;
      $post->body = $request->body;
      $post->user_id = $user->id;
      $post->save();


      //$telegram->sendMessage("1655411850", "Пользователь {{ Auth::user()->name }} создал пост");
      event(new PostStore());

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
         'name' => 'min:6|max:255',
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
      return redirect()->route('user.posts');
   }
}
