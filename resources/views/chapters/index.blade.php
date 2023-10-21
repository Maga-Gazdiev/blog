@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">{{ $book->title }}</h1>

    <div class="row">
        <div class="col-md-6">
            <ul class="list-group">
                @forelse ($chapters as $chapter)
                <li class="list-group-item">
                    <a href="{{ route('chapters.show', [$book, $chapter]) }}">{{ $chapter->title }}</a>
                </li>
                @empty
                <li class="list-group-item">
                    <div class="fs-4 mx-2">Нет глав</div>
                </li>
                @endforelse
            </ul>
        </div>
        <div class="col-md-6 text-center">
            @auth
                @if ($book->user_id === auth()->id())
                    <a href="{{ route('chapters.create', $book) }}" class="btn btn-primary mt-4">Создать главу</a>
                @endif
            @endauth
        </div>
    </div>
</div>
@endsection

