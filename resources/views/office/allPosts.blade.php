@extends('layouts.app')

@section('content')

<main>
    <div class="container mt-5">
        <h1 class="display-4 text-center">Все посты пользователя</h1>
        <div class="mb-5"></div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse ($post->all() as $posts)
            <div class="col">
                <div class="card h-100 shadow">
                    <img src='https://i.ibb.co/17hXpC6/image.png' alt="Изображение поста" class="photo" />
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
                                @csrf
                                @auth
                                @if(!$posts->likes->contains('user_id', auth()->user()->id))
                                @component('components.like', ['postId' => $posts->id])@endcomponent
                                @else
                                @component('components.unlike', ['postId' => $posts->id])@endcomponent
                                @endif
                                @endauth
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <form action="{{ route('posts.destroy', $posts->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                            <div class="col-2">
                                <form action="{{ route('posts.edit', $posts->id) }}">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center fs-3 mt-5">
                Нет постов
            </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $post->links() }}
        </div>
    </div>
</main>

@endsection