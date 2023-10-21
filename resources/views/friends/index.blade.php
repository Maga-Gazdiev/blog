@extends('layouts.app')

@section('content')
<main>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg rounded-3">
                    <div class="card-body p-5">
                        <h1 class="text-center mb-4">Найти пользователя</h1>
                        <form method="POST" action="{{ route('friends.store') }}" class="mb-3">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="id" class="form-control" placeholder="ID пользователя" aria-label="ID пользователя">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary mx-1">Добавить в избранное</button>
                                </div>
                            </div>
                            @if (session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                            @endif
                        </form>
                        <h2 class="mb-3">Избранное</h2>
                        <ul class="list-group">
                            @forelse ($friends as $friend)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $friend->name }}
                                <form method="GET" action="{{ route('messages.show', $friend->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-dark">Написать</button>
                                </form>
                            </li>
                            @empty
                            <li class="list-group-item">
                                <div class="alert alert-info mt-3">
                                    Пусто.
                                </div>
                            </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
