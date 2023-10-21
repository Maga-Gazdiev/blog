@extends('layouts.app')

@section('content')
<main class="container-lg my-5">
    <div class="mb-5"></div>
    @if (!$user->hasVerifiedEmail())
        <div class="alert alert-warning">
            Ваш аккаунт не верифицирован. Пожалуйста, проверьте свою почту и подтвердите аккаунт. Если аккаунт не будет верифицирован в течении 24 часов, то он будет удален.
        </div>
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-primary">
                Повторно отправить ссылку для верификации
            </button>
        </form>
    @endif
    <h1 class="text-center">Личный кабинет</h1>
    <div class="mb-4"></div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-lg rounded-3 mb-4">
                <div class="card-body p-4">
                    <h2 class="mb-4">Профиль пользователя</h2>
                    <p class="mb-2">Id: <span class="text-primary">{{ $user->id }}</span></p>
                    <p class="mb-2">Ник: <span class="text-primary">{{ $user->name }}</span></p>
                    <p class="mb-2">Email: <span class="text-primary">{{ $user->email }}</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-lg rounded-3 mb-4">
                <div class="card-body p-4">
                    <h2 class="mb-4">Друзья</h2>
                    <a class="text-decoration-none text-primary d-block mb-4" href="{{ route('friends.index') }}">Друзья</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-lg rounded-3 mb-4">
                <div class="card-body p-4">
                    <h2 class="mb-4">Мои действия</h2>
                    <a class="text-decoration-none text-primary d-block mb-2" href="{{ route('user.posts.like') }}">Все лайкнутые посты</a>
                    <a class="text-decoration-none text-primary d-block mb-2" href="{{ route('user.posts') }}">Все мои посты</a>
                    <a class="text-decoration-none text-primary d-block mb-2" href="{{ route('other') }}">Другие возможности</a>
                    <a class="text-decoration-none text-primary d-block mb-2" href="{{ route('user.comment') }}">Мои комментарии</a>
                    <a class="text-decoration-none text-primary d-block mb-4" href="{{ route('user.likedComment') }}">Лайкнутые комментарии</a>
                </div>
            </div>
        </div>
    </div>

    @auth
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-lg rounded-3 mb-4">
                <div class="card-body p-4">
                    <h2 class="mb-4">Действия</h2>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-primary">Выход</button>
                    </form>
                    <form action="{{ route('other.ipify') }}" method="get" class="d-inline">
                        <button type="submit" class="btn btn-primary">Узнать IP-адрес</button>
                    </form>
                    @isset($ip)
                    <p class="mt-3">Ваш IP: <span class="text-primary">{{ $ip }}</span></p>
                    @endisset
                </div>
            </div>
        </div>
    </div>
    @endauth
</main>
@endsection
