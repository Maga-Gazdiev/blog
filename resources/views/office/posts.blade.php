@extends('layouts.app')

@section('content')


<div class="body">
    <div class="list">
        <div class="container mt-5">
            <div class="fs-1 text-center">Все лайкнутые посты пользователя</div>
            <div class="mb-5"></div>

            <div class="row row-cols-1 row-cols-md-3 g-2">
                @forelse($likedPosts as $like)
                <div class="col">
                    <div class="card h-100">
                        <div class="bg-image hover-overlay shadow-1-strong ripple rounded-5">
                            <img src='https://i.ibb.co/17hXpC6/image.png' alt="Тут была картина поста" width="300" class="img-fluid photo" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ route('posts.show', $like->id) }}" class="text-decoration-none">{{ Str::limit($like->name, 23) }}</a></h5>
                            <p class="card-text">{{ Str::limit($like->body, 30) }}</p>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <a class="text-info">
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
                                <div class="col-6">
                                    <p class="card-text"><small class="text-muted"> {{ $like->created_at->toDateString() }}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col text-center fs-3 mt-5">
                    Нет залайканный постов
                </div>
                @endforelse
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $likedPosts->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

@endsection