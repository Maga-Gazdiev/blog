@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title text-center">
                <a href="{{ route('chapters.index', $chapter->book_id) }}" class="text-decoration-none fs-1 text-center">{{ $chapter->book->title }}</a>
            </h1>
        </div>
        <div class="card-body">
            <h2>{{ $chapter->title }}</h2>
            <p class="card-text">{{ $chapter->content }}</p>
        </div>
        <div class="card-footer text-center">
            @if ($prevChapter)
                <a href="{{ route('chapters.show', [$chapter->book_id, $prevChapter->id]) }}" class="btn btn-primary">Предыдущая глава</a>
            @endif
<a href="{{ route('chapters.index', $chapter->book_id) }}" class="btn btn-primary">Вернуться к списку глав</a>
            @if ($nextChapter)
                <a href="{{ route('chapters.show', [$chapter->book_id, $nextChapter->id]) }}" class="btn btn-primary">Следующая глава</a>
            @endif
        </div>
    </div>
</div>
@endsection
