@extends('layouts.app')

@section('content')


<div class="body">
    <div class="list">

        <div class="container mt-5">
            <div class="fs-1 text-center">Все посты пользователя</div>
            <div class="mb-5"></div>

            <div class="row row-cols-1 row-cols-md-3 g-2">
                @forelse ($post->all() as $posts)
                <div class="col">
                    <div class="card h-100">
                        <div class="bg-image hover-overlay shadow-1-strong ripple rounded-5">
                            <img src='https://i.ibb.co/17hXpC6/image.png' alt="Тут была картина поста" width="300" class="img-fluid photo" />
                        </div>
                        <div class="mb-2 "></div>
                        <div>
                            <p class="card-text px-3"><small class="text-muted"> Опубликованно: {{ $posts->created_at->toDateString() }}</small></p>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ route('posts.show', $posts->id) }}" class="text-decoration-none">{{ Str::limit($posts->name, 23) }}</a></h5>
                            <p class="card-text">{{ Str::limit($posts->body, 30) }}</p>
                            <div class="row mb-3">
                                
                                <div class="col-2">
                                    <form action="{{ route('posts.destroy', $posts->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                                <div class="col-2">
                                    <form action="{{ route('posts.edit', $posts->id) }}">
                                        <button type="submit" class="btn btn-primary"><i class="fa-brands fa-stack-exchange"></i></button>
                                    </form>
                                </div>
                                <div class="col-6">
                                    <a class="text-info">
                                        @csrf
                                        @auth
                                        @if(!$posts->likes->contains('user_id', auth()->user()->id))
                                        @component('components.like', ['postId' => $posts->id])@endcomponent
                                        @else
                                        @component('components.unlike', ['postId' => $posts->id])@endcomponent
                                        @endif
                                        @endauth
                                    </a>
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
                <div class="d-flex justify-content-center mt-4">
                    {{ $post->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection