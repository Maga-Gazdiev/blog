<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function index($book_id)
    {
        $chapters = Chapter::where('book_id', $book_id)->get();
        $book = Book::findOrFail($book_id);

        return view('chapters.index', compact('chapters', 'book'));
    }

    public function show($book_id, $chapter_id)
    {
        $chapter = Chapter::where('book_id', $book_id)->find($chapter_id);

        if ($chapter) {
            $nextChapter = Chapter::where('book_id', $book_id)
                ->where('id', '>', $chapter_id)
                ->orderBy('id', 'asc')
                ->first();
    
            $prevChapter = Chapter::where('book_id', $book_id)
                ->where('id', '<', $chapter_id)
                ->orderBy('id', 'desc')
                ->first();
    
            return view('chapters.show', compact('chapter', 'nextChapter', 'prevChapter'));
            } else {
            abort(404); // Вернуть ошибку 404, если глава с указанным id не найдена
        }
    }
    public function create(Book $book)
    {
        return view('chapters.create', compact('book'));
    }

    public function store(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $chap = new Chapter();
        $chap->title = $request->title;
        $chap->content = $request->content;
        $chap->book_id = $book->id;

        $chap->save();

        return redirect()->route('chapters.show', $book);
    }

    public function edit(Book $book, Chapter $chapter)
    {
        return view('chapters.edit', compact('book', 'chapter'));
    }

    // Обновление главы
    public function update(Request $request, Book $book, Chapter $chapter)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $chap = new Chapter();
        $chap->title = $request->title;
        $chap->content = $request->content;
        $chap->book_id = $book->id;

        $chap->save();

        return redirect()->route('chapters.show', $book);
    }
}
