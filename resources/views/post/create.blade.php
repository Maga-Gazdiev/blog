@extends('layouts.app')

@section('content')

<main>
    <div class="container mt-5">
        <div class="editAndCreate">
            <div class="mb-3"></div>
            <div class="group mb-5">
                <h1 class="text-center">Создать пост</h1>
                <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" accept-charset="UTF-8" class="w-100">
                    @csrf
                    <div class="container-lg">
                        <div class="mb-3"></div>
                        <div class="group mb-5">
                            <div class="form-group mb-3">
                                <label for="name">Название</label>
                                <input class="form-control" name="name" type="text" id="name" placeholder="Введите название" required>
                                @error('name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="body">Описание</label>
                                <textarea class="form-control summernote" id="body" name="body" rows="5" placeholder="Введите описание" required></textarea>
                                @error('body')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Изображение</label>
                                <input type="file" class="form-control-file" name="image" id="image">
                                @error('image')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary" type="submit">Создать</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection