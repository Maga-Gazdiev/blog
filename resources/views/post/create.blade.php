@extends('layouts.app')

@section('content')

<main>
    <div class="body">
        <div class="list">
            <div class="editAndCreate">
                <div class="mb-3 rigth"></div>
                <div class="group mb-5">
                    <h1>Создать пост</h1>
                    <form method="POST" action="{{ route('posts.store') }}" accept-charset="UTF-8" class="w-100">
                        @csrf
                        <div class="form-group mb-3">
                            <div class="container-lg">
                                <div class="mb-3"></div>
                                <div class="group mb-5">
                                    <div class="form-group mb-3">
                                        <label type="input" for="name" placeholder="Name" name="name" id='name'>Название</label>
                                        <input class="form-control" name="name" type="text" id="name">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="body" id="text" name="body" rows="3">Описание</label>
                                        <textarea class="form-control" id="body" name="body" type="text" rows="10"></textarea>
                                        @error('body')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <input class="btn btn-primary mt-3" type="submit" value="Создать">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection