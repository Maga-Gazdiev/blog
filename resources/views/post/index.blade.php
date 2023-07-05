@extends('layouts.app')

@section('content')

<div class="container-lg">
    <main class="container py-4 shadow">
        <div class="container py-4 px-5">
            <div class="container-lg">
                <form action="{{ route('posts.create') }}" accept-charset="UTF-8" class="w-50">
                    <input class="btn btn-outline-dark text" type="submit" value="Создать">
                </form>
                @foreach($post->all() as $posts)
                <div class="container-lg">
                    <div class="mb-3">
                        <figure>
                            <blockquote class="blockquote">
                                <h2 class="text">{{ $posts->name }}</h2>
                                <form action="{{ route('posts.destroy', $posts->id) }}" style="float: right" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="color:#8B0000" class="btn btn-red text">Удалить</button>
                                </form>
                                <a style="float: right; color:#0000FF" type="button" href="{{ route('posts.edit', $posts->id) }}" class="btn btn-red text">Изменить</a>
                            </blockquote>
                            <figcaption class="blockquote-footer text-dark text">
                                {{ $posts->body }}
                            </figcaption>
                        </figure>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>
</div>

@endsection