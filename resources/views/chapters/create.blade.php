@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Создать главу для книги "{{ $book->title }}"</h1>

        <form method="post" action="{{ route('chapters.store', $book) }}">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Заголовок главы</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Содержание главы</label>
                <textarea class="form-control" id="content" name="content" rows="6" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
