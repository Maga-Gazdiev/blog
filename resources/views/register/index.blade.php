@extends('layouts.app')

@section('content')

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg rounded-3">
                    <div class="card-body p-5">
                        <h2 class="text-center mb-5">Создать аккаунт</h2>

                        <form action="{{ route('register.store') }}" method="POST">
                            @csrf
                            @method('POST')

                            <div class="mb-4">
                                <label for="name" class="form-label">Имя</label>
                                <input type="text" name="name" id="name" placeholder="User name" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus />
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" placeholder="Email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" required />
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">Пароль</label>
                                <input type="password" name="password" id="password" placeholder="Пароль" class="form-control form-control-lg @error('password') is-invalid @enderror" required />
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password-confirm" class="form-label">Подтверждение пароля</label>
                                <input id="password-confirm" name="password_confirmation" placeholder="Подтвердить пароль" type="password" class="form-control form-control-lg" required />
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success btn-lg">Зарегистрироваться</button>
                            </div>
                        </form>

                        <p class="text-center text-muted mt-4">Уже есть аккаунт? <a href="{{ route('login') }}" class="text-body fw-bold"><u>Войдите в него</u></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
