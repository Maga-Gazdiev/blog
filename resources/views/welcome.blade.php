@extends('layouts.app')

@section('content')

<main>
    <div class="body">
        <div class="list">
            @auth
            <div class="mb-5"></div>
            <form action="{{ route('posts.create') }}" class="w-150">
                <input class="button:hover button" type="submit" value="Создать">
            </form>
            @endauth
            <div class="pxl">
                <!-- <a href="#name_of_target">Link Text</a> -->
               <!-- <a name="name_of_target">Content</a> --> 
                @forelse($post->all() as $posts)
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
                            <a href="{{ route('posts.show', $posts->id) }}" style="float: right;" class="btn btn-success">Читать далее</a>
                        </div>
                    </div>
                </div>

                @empty
                <div class="text-center text fs-3" style="align: center">Нет постов</div>
                @endforelse
                <div class="d-flex justify-content-center">
                    {{ $post->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</main>

@endsection