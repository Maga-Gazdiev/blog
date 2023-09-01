@extends('layouts.app')

@section('content')

<main>
    <div class="body">
        <div class="list">
            <input type="checkbox" id="chk" aria-hidden="true">
            <form action="{{ route('posts.create') }}" accept-charset="UTF-8" class="button">
                <button class="button">Создать</button>
            </form>
            @foreach($post->all() as $posts)
            <div class="container-lg">
                <div class="mb-3">
                    <figure>
                        <blockquote class="blockquote">
                            <div class="d-flex justify-content-between">
                                <h2 class="text">{{ $posts->name }}</h2>
                                <form method="post">
                                    @csrf
                                    <button type="submit" class="border-0 bg-transparent">
                                        @auth
                                        <i class="fa-solid fa-heart"></i>
                                        @endauth
                                    </button>
                                </form>
                            </div>

                            @auth()
                            <form action="{{ route('posts.destroy', $posts->id) }}" style="float: right" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="color:#8B0000" class="btn btn-red text">Удалить</button>
                            </form>
                            <a style="float: right" type="button" href="{{ route('posts.edit', $posts->id) }}" class="btn btn-red text">Изменить</a>
                            @endauth
                        </blockquote>
                        <figcaption class="blockquote-footer text-dark text">
                            {{ Str::limit($posts->body, 60) }}
                        </figcaption>

                    </figure>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>

@endsection