@extends('layouts.app')

@section('content')

<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Подтверждение аккаунта</h1>
                    </div>
                    <div class="card-body">
                        <p class="alert alert-success">
                            Ваш аккаунт был успешно подтвержден. Теперь вы можете войти в свой аккаунт и начать использовать его.
                        </p>
                        <div class="text-center mt-3">
                            <a href="{{ route('user.index') }}" class="btn btn-primary">Перейти в личный кабинет</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
