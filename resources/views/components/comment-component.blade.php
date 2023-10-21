<div class="mb-5 py-3"></div>

<form method="POST" action="{{ route('comments.store') }}" class="w-100">
    @csrf
    @auth
    <div class="form-group mb-3">
        <label for="body" id="text" name="body" rows="3">Описание</label>
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <textarea class="form-control summernote" id="body" name="body" rows="5" placeholder="Введите ваш комментарий" required></textarea>
        @error('body')
        <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Добавить комментарий</button>
    </div>
    @endauth
</form>

@guest
<p class="mt-3">Чтобы оставить комментарий, пожалуйста, <a href="{{ route('register') }}">войдите</a> в свой аккаунт.</p>
@endguest

<div class="py-4"></div>

<div class="container-lg px-5">
    <h3 class="title-comments">Комментарии</h3>
    @foreach ($post->comments as $comment)
    <div class="comments">
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
                    <div class="media-text text-justify" name="name_of_target">{!! $comment->body !!}</div>
                    <div class="footer-comment">
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
                        <div class="col-2">
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </div>
                        <div class="col-2">
                            <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-primary">Изменить</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    @endforeach
    <div class="mb-5 py-5"></div>
</div>