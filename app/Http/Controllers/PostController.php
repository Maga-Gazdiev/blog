<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Events\PostStore;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
   protected $imageService;
   public function index()
   {
      $sort = request()->input('sort', 'new');
      $keyword = request()->input('keyword', '');

      $validatedData = request()->validate([
         'sort' => ['nullable', 'in:new,old,popular'],
         'keyword' => 'nullable|string|max:255',
      ]);

      $query = Post::query();

      if (!empty($keyword)) {
         $query->where('name', 'like', "%$keyword%");
      }

      if ($sort === 'popular') {
         $query->leftJoin('likes', 'posts.id', '=', 'likes.post_id')
            ->selectRaw('posts.*, COUNT(likes.id) as like_count')
            ->groupBy('posts.id')
            ->orderBy('like_count', 'desc');
      } else {
         $query->orderBy('created_at', $sort === 'old' ? 'asc' : 'desc');
      }

      $post = $query->paginate(12);

      $likes = Like::whereNotNull('post_id')->get();
      $likeCount = $likes->count();

      return view('welcome', compact('post', 'keyword', 'likeCount'));
   }

   public function create()
   {
      return view('post.create');
   }

   public function store(Request $request)
   {
      $this->validate($request, [
         'name' => 'required|min:6|max:255',
         'body' => 'required|min:150',
         'image' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
      ]);

      $config = HTMLPurifier_Config::createDefault();
      $purifier = new HTMLPurifier($config);

      if ($request->hasFile('image')) {
         $photoFile = $request->file('image');

         $photoName = Str::uuid() . '.' . pathinfo($photoFile->getClientOriginalName(), PATHINFO_EXTENSION);
         $photoPath = $photoFile->storeAs('public/photos', $photoName);
      } else {
         $photoName = 'default.png';
      }

      $post = new Post();
      $user = auth()->user();
      $post->name = $request->name;
      $post->body = $purifier->purify($request['body']);
      $post->user_id = $user->id;
      $post->filename = 'photos/' . $photoName;

      $post->save();

      event(new PostStore($post));

      return redirect()->route('posts')->with('success', 'Пост создан успешно.');
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
      $config = HTMLPurifier_Config::createDefault();
      $purifier = new HTMLPurifier($config);

      if ($request->hasFile('image')) {
         $photoFile = $request->file('image');

         $photoName = Str::uuid() . '.' . pathinfo($photoFile->getClientOriginalName(), PATHINFO_EXTENSION);
         $photoPath = $photoFile->storeAs('public/photos', $photoName);
      } else {
         $photoName = 'default.png';
      }

      $post = Post::findOrFail($id);
      $post->name = $request->name;
      $post->body = $purifier->purify($request['body']);
      $post->filename = 'photos/' . $photoName;
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
