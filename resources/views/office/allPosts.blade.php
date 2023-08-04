@extends('layouts.app')

@section('content')

<main>
    <div class="body">
        <div class="list">
            <div class="mb-3"></div>
            <div class="fs-2 text-center text">Все посты пользователя</div>
            <div class="pxl">
                @forelse($user->posts as $posts)
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ Str::limit($posts->name, 40) }}</h5>
                            <p class="card-text">{{ Str::limit($posts->body, 50) }}</p>
                            <p class="card-text"><small class="text-muted">Опубликовано: {{ $posts->created_at }}</small></p>
                            <p>
                                @csrf
                                @auth
                                @if(!$posts->likes->contains('user_id', auth()->user()->id))
                                @component('components.like', ['postId' => $posts->id])@endcomponent
                                @else
                                @component('components.unlike', ['postId' => $posts->id])@endcomponent
                                @endif
                                @endauth
                            </p>
                            <div class="row">
                                <div class="col-3">
                                    <form action="{{ route('posts.destroy', $posts->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">Удалить</button>
                                    </form>
                                </div>
                                <div class="col-4">
                                    <form action="{{ route('posts.edit', $posts->id) }}">
                                        <button type="submit" class="btn btn-primary">Изменить</button>
                                    </form>
                                </div>
                                <div class="col-5">
                                    <a href="{{ route('posts.show', $posts->id) }}" class="btn btn-success">Читать далее</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @empty
                <div class="text fs-3" style="align: center">У пользователя нет постов</div>
                @endforelse
            </div>
        </div>
    </div>
</main>

@endsection