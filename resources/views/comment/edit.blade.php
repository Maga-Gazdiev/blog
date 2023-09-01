@extends('layouts.app')

@section('content')

<main>
    <div class="body">
        <div class="list">
            
            <div class="editAndCreate">
                <div class="mb-3 rigth"></div>
                <div class="group mb-5">
                    <h1>Изменить</h1>
                    <form method="POST" action="{{ route('comments.update', $comment->id) }}" accept-charset="UTF-8" class="w-50">
                        @csrf
                        @method('PUT')
                        @auth()
                        <div class="form-group mb-3">
                            <div class="container-lg">
                                <div class="mb-3"></div>
                                <div class="group mb-5">
                                    <div class="form-group mb-3">
                                        <label for="body" id="text" name="body" rows="3">Описание</label>
                                        <textarea class="form-control" id="body" name="body" type="text" rows="10"></textarea>
                                        @error('body')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <input class="btn btn-primary mt-3" type="submit" value="Обновить комментарий">
                                </div>
                            </div>
                        </div>
                        @endauth
                        @guest
                        <p>Чтобы оставить комментарий, пожалуйста, <a href="{{ route('login') }}">войдите</a> в свой аккаунт.</p>
                        @endguest
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection