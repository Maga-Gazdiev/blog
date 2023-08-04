<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@extends('layouts.app')

@section('content')

<main>
    <div class="body">
        <div class="list">
            <div class="container-lg px-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h1 class="display-5">{{ $post->name }}</h1>
                            <p class="lead">{{ $post->body }}</p>
                        </div>
                    </div>
                </div>


                <form method="POST" action="{{ route('comments.store') }}">
                    @csrf
                    @auth()
                    <div class="row">
                        <div class="col-8">
                            <div class="form__group field">
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <input type="input" class="form__field" placeholder="Email" for="exampleFormControlTextarea1" id="body" name="body" required />
                                <label for="body" class="form__label" id="body" name="body" rows="3">Поле ввода</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="button">Добавить комментарий</button>
                        </div>
                    </div>
                    @endauth
                    @guest
                    <p>Чтобы оставить комментарий, пожалуйста, <a href="{{ route('login') }}">войдите</a> в свой аккаунт.</p>
                    @endguest
                </form>

                <p>
                <div class="mb-5 py-5"></div>
                <div class="container-lg px-5">
                    @foreach ($post->comments as $comment)

                    <div class="comments">
                        <h3 class="title-comments">Комментарии (6)</h3>

                        <ul class="media-list">

                            <li class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object img-rounded" src="avatar1.jpg" alt="">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <div class="author">{{ $comment->user->name }}</div>
                                        <div class="metadata">
                                            <span class="date">{{ $comment->created_at }}</span>
                                        </div>
                                    </div>
                                    <div class="media-text text-justify">{{ $comment->body }}</div>
                                    <div class="footer-comment">
                                        @csrf
                                        @auth
                                        @if(!$comment->likes->contains('user_id', auth()->user()->id))
                                        @component('components.like', ['postId' => $comment->id])@endcomponent
                                        @else
                                        @component('components.unlike', ['postId' => $comment->id])@endcomponent
                                        @endif
                                        @endauth

                                    </div>

                                </div>
                            </li>
                        </ul>
                    </div>
                    @endforeach

                    <div class="mb-5 py-5"></div>
                </div>



                </p>
            </div>
        </div>
    </div>
</main>

@endsection