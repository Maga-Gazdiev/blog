@extends('layouts.app')

@section('content')

<main>
    <div class="body">
        <div class="list">
            <main>
                <div class="container-lg my-5">
                    <div class="mb-3"></div>
                    <h1 class="text-center">Личный кабинет</h1>
                    <div class="mb-4"></div>

                    <div class="px-4 px-md-5 fs-4">
                        <p class="mb-2">Ник: <span class="text-primary">{{ $user->name }}</span></p>
                        <p class="mb-2">Email: <span class="text-primary">{{ $user->email }}</span></p>
                        <a class="text-decoration-none text-primary d-block mb-2" href="{{ route('user.posts.like') }}">Все лайкнутые посты</a>
                        <a class="text-decoration-none text-primary d-block mb-2" href="{{ route('user.posts') }}">Все мои посты</a>
                        <a class="text-decoration-none text-primary d-block mb-2" href="{{ route('other') }}">Другие возможности</a>
                        <a class="text-decoration-none text-primary d-block mb-2" href="{{ route('user.comment') }}">Мои комментарии</a>
                        <a class="text-decoration-none text-primary d-block mb-4" href="{{ route('user.likedComment') }}">Лайкнутые комментарии</a>
                    </div>

                    @auth
                    <div class="d-grid gap-2 col-12 col-md-6 mx-start px-5">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" id="liveToastBtn" class="btn btn-primary">Выход</button>
                        </form>
                    </div>
                    @endauth
                    <div class="mb-3"></div>
                    <div class="px-4 px-md-5 fs-4">
                        <form action="{{ route('other.ipify') }}" method="get" class="d-md-flex align-items-center" style="padding-right: 50">
                            <button type="submit" class="btn btn-primary">Нажмите для того чтобы узнать ваш IP</button>
                        </form>
                        @isset($ip)
                        <h1>Ваш ip: {{ $ip }}</h1>
                        @endisset
                    </div>
                </div>
            </main>
        </div>
    </div>
</main>

@endsection