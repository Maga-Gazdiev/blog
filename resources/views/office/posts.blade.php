@extends('layouts.app')

@section('content')

<main>
    <div class="body">
        <div class="list">
            <div class="mb-3"></div>
            <div class="fs-2 text-center text">Все посты которые лайкнул пользователь</div>
            <div class="pxl">
            @forelse($likedPosts as $like)
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ Str::limit($like->post->name, 40) }}</h5>
                            <p class="card-text">{{ Str::limit($like->post->body, 50) }}</p>
                            <p class="card-text"><small class="text-muted">Опубликовано: {{ $like->post->created_at }}</small></p>
                            <p>
                                @csrf
                                @auth
                                @if(!$like->post->likes->contains('user_id', auth()->user()->id))
                                @component('components.like', ['postId' => $like->post->id])@endcomponent
                                @else
                                @component('components.unlike', ['postId' => $like->post->id])@endcomponent
                                @endif
                                @endauth
                            </p>
                            <a href="{{ route('posts.show', $like->id) }}" style="float: right" class="btn btn-success">Читать далее</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="fs-3 text-center text">Нет лайкнутых постов</div>
                @endforelse
            </div>
        </div>
    </div>
</main>

@endsection