@extends('layouts.app')

@section('content')

<div class="container-lg">
    <main class="container py-4 shadow">
        <div class="container py-4 px-5">
            <div class="container-lg">
                <h1>
                    <div class="fs-1">Вход</div>
                </h1>
                <div class="mb-4"></div>
                <form action="{{ route('login.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" id="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" id="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-2"></div>
                    <button type="submit" class="btn btn-outline-dark">Войти</button>
                </form>
            </div>
        </div>
    </main>
</div>

@endsection