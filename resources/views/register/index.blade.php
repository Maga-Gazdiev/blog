@extends('layouts.app')

@section('content')

<main>
    <div class="body">
        <section class="vh-100 bg-image">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Создать аккаунт</h2>

                                <form action="{{ route('register.store') }}" method="POST">
                                    @csrf
                                    @method('POST')

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1cg">Имя</label>
                                        <input type="text" name="name" placeholder="User name" id="form3Example1cg" class="form-control form-control-lg" />
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3cg">Email</label>
                                        <input type="email" name="email" for="exampleInputEmail1" placeholder="Email" id="form3Example3cg" aria-describedby="emailHelp" class="form-control form-control-lg" />
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Пароль</label>
                                        <input type="password" name="password" placeholder="Password" id="form3Example4cg" class="form-control form-control-lg" />
                                        @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Зарегистрироваться</button>
                                    </div>
                                    <p class="text-center text-muted mt-5 mb-0">Уже есть аккаунт? <a href="login" class="fw-bold text-body"><u>Войдите в него</u></a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
@endsection