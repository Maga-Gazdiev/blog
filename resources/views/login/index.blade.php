@extends('layouts.app')

@section('content')

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg rounded-3">
                    <div class="card-body p-5">
                        <h2 class="text-center mb-5">Войти в аккаунт</h2>
                        <form action="{{ route('login.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label" for="form3Example3cg">Ваш Email</label>
                                <input type="email" name="email" for="exampleInputEmail1" placeholder="Email" id="form3Example3cg" aria-describedby="emailHelp" class="form-control form-control-lg" />
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="form3Example4cg">Пароль</label>
                                <input type="password" name="password" placeholder="Пароль" id="form3Example4cg" class="form-control form-control-lg" />
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success btn-lg gradient-custom-4 text-body">Войти</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection