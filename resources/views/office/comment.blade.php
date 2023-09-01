@extends('layouts.app')

@section('content')


<main>
    <div class="body">
        <div class="list">
            <div class="container mt-5">
                <div class="row">
                    <div class="col">
                        <div class="mb-3"></div>
                        <h2 class="text-center">Все комментарии пользователя</h2>
                        @forelse($comments as $comment)
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="author">{{ $comment->user->name }}</div>
                                            <div class="metadata">
                                                <span class="date">{{ $comment->created_at }}</span>
                                            </div>
                                        </div>
                                        <div class="media-text text-justify"><a href="{{ route('posts.show', $comment->post->id) }}#MyComment">{{ $comment->body }}</a></div>
                                        <div class="mt-3">
                                            @csrf
                                            @auth
                                            @if(!$comment->likes->contains('user_id', auth()->user()->id))
                                            @component('components.likeComment', ['postId' => $comment->id])@endcomponent
                                            @else
                                            @component('components.unlikeComment', ['postId' => $comment->id])@endcomponent
                                            @endif
                                            @endauth
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                                </form>
                                            </div>
                                            <div class="col-3">
                                                <form action="{{ route('comments.edit', $comment->id) }}">
                                                    <button type="submit" class="btn btn-primary">Изменить</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12 text-center fs-3 mt-5">
                            У пользователя нет комментариев
                        </div>
                        @endforelse
                        <div class="d-flex justify-content-center mt-4">
                            {{ $comments->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection