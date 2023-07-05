@extends('layouts.app')

@section('content')

<div class="container-lg">
    <main class="container py-4 shadow">
        <div class="container py-4 px-5">
            <div class="container-lg">
                <h1 class="mb-5">Изменить</h1>
                <form method="POST" action="{{ route('posts.update', $post->id) }}" accept-charset="UTF-8" class="w-50">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="name">Имя</label>
                        <input class="form-control" name="name" type="text" id="name" value="{{ $post->name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="body">Текст</label>
                        <textarea class="form-control" name="body" cols="50" rows="10" id="body" value="">{{ $post->body }}</textarea>
                    </div>

                    <input class="btn btn-primary mt-3" type="submit" value="Обновить">
                </form>
            </div>
        </div>
    </main>
</div>
@endsection