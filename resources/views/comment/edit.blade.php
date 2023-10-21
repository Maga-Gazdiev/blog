@extends('layouts.app')

@section('content')

<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Изменить комментарий</h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('comments.update', $comment->id) }}" accept-charset="UTF-8" class="w-50 mx-auto">
                            @csrf
                            @method('PUT')
                            @auth()
                            <div class="form-group mb-3">
                                <label for="body" class="form-label">Описание</label>
                                <textarea class="form-control summernote" id="body" name="body" rows="5">{{ old('body', $comment->body) }}</textarea>
                                @error('body')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Обновить комментарий</button>
                            @endauth
                        </form>
                        @guest
                        <p class="text-center mt-4">Чтобы изменить комментарий, пожалуйста, <a href="{{ route('login') }}">войдите</a> в свой аккаунт.</p>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
