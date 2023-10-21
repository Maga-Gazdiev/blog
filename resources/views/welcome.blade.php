@extends('layouts.app')

@section('content')
<div class="container mt-5 wrapper">
    <div class="row">
        @auth
        <div class="col-md-4 mb-3">
            <form action="{{ route('posts.create') }}">
                <button class="btn btn-primary btn-block rounded-pill" type="submit">Создать пост</button>
            </form>
        </div>
        <div class="col-md-4 mb-3">
            <form action="{{ route('posts') }}" method="GET" class="d-flex">
                <input type="text" class="form-control me-2 rounded-pill" name="keyword" value="{{ $keyword }}" placeholder="Поиск...">
                <button type="submit" class="btn btn-primary rounded-pill">Поиск</button>
                @error('keyword')
                <div class="alert alert-danger ml-2">{{ $message }}</div>
                @enderror
            </form>
        </div>
        <div class="col-md-4 mb-3">
            <form action="{{ route('posts') }}" method="get" class="d-md-flex align-items-center">
                <select name="sort" id="sort" class="form-select me-2 rounded-pill">
                    <option value="new" {{ request('sort') === 'new' ? 'selected' : '' }}>Новые посты</option>
                    <option value="old" {{ request('sort') === 'old' ? 'selected' : '' }}>Старые посты</option>
                    <option value="popular" {{ request('sort') === 'popular' ? 'selected' : '' }}>Популярное</option>
                </select>
                <button type="submit" class="btn btn-primary rounded-pill">Применить</button>
                @error('sort')
                <div class="alert alert-danger ml-2">{{ $message }}</div>
                @enderror
            </form>
        </div>
        @endauth
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse ($post as $posts)
        <div class="col">
            <div class="card h-100">
                <img src="{{ asset('storage/' . $posts->filename) }}" class="photo" alt="{{ $posts->title }}">

                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('posts.show', $posts->id) }}" class="text-decoration-none">{{ Str::limit($posts->name, 23) }}</a>
                    </h5>
                    <p class="card-text">{!! Str::limit(strip_tags($posts->body), 100) !!}</p>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="card-text"><small>Дата публикации: {{ $posts->created_at->toDateString() }}</small></p>
                        <div class="btn-group">
                            @auth
                            <a class="text-info">
                                @csrf
                                @if(!$posts->likes->contains('user_id', auth()->user()->id))
                                @component('components.like', ['postId' => $posts->id])@endcomponent
                                @else
                                @component('components.unlike', ['postId' => $posts->id])@endcomponent
                                @endif
                            </a>
                            <div class="text-muted">
                                <i class="bi bi-heart-fill"></i> {{ $posts->likes->count() }}
                            </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col text-center fs-3 mt-5">
            Нет постов
        </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $post->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection