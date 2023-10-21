<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    // Форма создания новой книги
    public function create()
    {
        return view('books.create');
    }

    // Сохранение новой книги
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,gif|max:2048|dimensions:min_width=250,min_height=350,max_width=250,max_height=350'
        ]);

        if ($request->hasFile('image')) {
            $photoFile = $request->file('image');
   
            $photoName = Str::uuid() . '.' . pathinfo($photoFile->getClientOriginalName(), PATHINFO_EXTENSION);
            $photoPath = $photoFile->storeAs('public/book', $photoName);
         } else {
            $photoName = 'default.png';
         }

        $book = new Book();
        $user = auth()->user();

        $book->title = $request->title;
        $book->description = $request->description;
        $book->user_id = $user->id;
        $book->filename = 'book/' . $photoName;

        $book->save();

        return redirect()->route('books.index');
    }
}
