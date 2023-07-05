@extends('layouts.app')

@section('content')

<div class="container-lg">
    <main class="container py-4 shadow">
        <div class="container py-4 px-5">
            <div class="mb-5"></div>
            <div class="container-lg">
                <div class="mb-3 rigth"></div>
                <div class="group mb-5">
                    <h1>Создать пост</h1>
                    <form method="POST" action="{{ route('posts.store') }}" accept-charset="UTF-8" class="w-50">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Название</label>
                            <input class="form-control" name="name" type="text" id="name">
                            <div class="mb-3"></div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" id="body" name="body" class="form-label">Текст</label>
                                <textarea class="form-control" id="body" name="body" rows="3"></textarea>
                            </div>
                        </div>
                        <input class="btn btn-dark" type="submit" value="Создать">
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection