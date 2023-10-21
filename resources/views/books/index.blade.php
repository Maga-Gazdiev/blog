@extends('layouts.app')

@section('content')
<div class="container">
    <div class="bodyBook">
        <div class="headerBook">
            <h1>Список книг</h1>
        </div>
        <div class="containerBook">
            <ul class="book-list">
                @foreach($books as $book)
                <li class="book">
                    <img src="{{ asset('storage/' . $book->filename) }}" class="photo" alt="{{ $book->title }}">
                    <h2><a href="{{ route('chapters.index', $book) }}" style="text-decoration:none">{{ Str::limit($book->title, 15) }}</a></h2>
                    <p>{{ $book->created_at }}</p>
                </li>
                @endforeach
            </ul>
            <a href="{{ route('books.create') }}" class="btn btn-primary mt-3">Добавить книгу</a>
        </div>
    </div>
</div>
@endsection
