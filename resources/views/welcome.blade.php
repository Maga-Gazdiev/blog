@extends('layouts.app')

@section('content')


<div class="body">
    <div class="list">
        <div class="container mt-5">
            @auth
            <div class="mb-5 justify-content-between">
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    <div class="col">
                        <form action="{{ route('posts.create') }}" class="w-100 w-md-50 mb-3">
                            <button class="btn btn-primary w-10" type="submit">Создать</button>
                        </form>
                    </div>
                    <div class="col">
                        <form method="GET" action="{{ route('chat.index') }}" class="w-30 d-flex">
                            <input type="text" class="form-control me-md-3" name="recipient_id" id="recipient_id" placeholder="Id пользователя">
                            <button type="submit" class="btn btn-primary">Написать</button>
                            @error('recipient_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </form>
                    </div>
                    <div class="col">
                        <form action="{{ route('posts') }}" method="GET" class="d-flex">
                            <input type="text" class="form-control me-md-3" name="keyword" value="{{ $keyword }}" placeholder="Поиск...">
                            <button type="submit" class="btn btn-primary">Поиск</button>
                            @error('keyword')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </form>
                    </div>
                    <div class="col">
                    <form action="{{ route('posts') }}" method="get" class="d-md-flex align-items-center" style="padding-right: 50">
                        <select name="sort" id="sort" class="form-select me-md-3">
                            <option value="new" {{ request('sort') === 'new' ? 'selected' : '' }}>Новые посты</option>
                            <option value="old" {{ request('sort') === 'old' ? 'selected' : '' }}>Старые посты</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Применить</button>
                        @error('sort')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </form>
                    </div>
                </div>
            </div>
            @endauth

            <div class="row row-cols-1 row-cols-md-3 g-2">
                @forelse ($post as $posts)
                <div class="col">
                    <div class="card h-100">
                        <div class="bg-image hover-overlay shadow-1-strong ripple rounded-5">
                            <img src='https://i.ibb.co/17hXpC6/image.png' alt="Тут была картина поста" width="300" class="img-fluid photo" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ route('posts.show', $posts->id) }}" class="text-decoration-none">{{ Str::limit($posts->name, 23) }}</a></h5>
                            <p class="card-text">{{ Str::limit($posts->body, 30) }}</p>
                            <div class="row mb-3">
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
                                <div class="col-6">
                                    <p class="card-text"><small class="text-muted"> {{ $posts->created_at->toDateString() }}</small></p>
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
    </div>
</div>

@endsection