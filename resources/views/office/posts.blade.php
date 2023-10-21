@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="display-4 text-center mb-5">Все лайкнутые посты пользователя</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse($likedPosts as $like)
        <div class="col">
            <div class="card h-100 shadow">
                <img src='https://i.ibb.co/17hXpC6/image.png' alt="Изображение поста" class="photo" />
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('posts.show', $like->id) }}" class="text-decoration-none">{{ Str::limit($like->name, 23) }}</a>
                    </h5>
                    <p class="card-text">{!! Str::limit(strip_tags($like->body), 100) !!}</p>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="card-text"><small>Дата публикации: {{ $like->created_at->toDateString() }}</small></p>
                        <div class="btn-group">
                            <a href="#" class="text-info">
                                @csrf
                                @auth
                                @if($like->id === null)
                                @component('components.like', ['postId' => $like->id])@endcomponent
                                @else
                                @component('components.unlike', ['postId' => $like->id])@endcomponent
                                @endif
                                @endauth
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col text-center fs-5 mt-5">
            Нет залайканных постов
        </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $likedPosts->links() }}
    </div>
</div>
@endsection