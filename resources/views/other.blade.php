@extends('layouts.app')

@section('content')

<main>
    <div class="container mt-5">
        <h2 class="text-center">Все остальные возможности</h2>
        <div class="mb-5"></div>

        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ route('other.national') }}" method="POST">
                            @csrf
                            <h4 class="mb-3">Узнать национальность по имени:</h4>
                            <div class="input-group">
                                <input type="text" class="form-control" name="name" required>
                                <button type="submit" class="btn btn-primary">Применить</button>
                            </div>
                        </form>

                        @isset($predictions)
                        <div class="mt-4">
                            <h5>Предсказанные национальности для имени "{{ $name }}":</h5>
                            <ul>
                                @foreach ($predictions as $prediction)
                                <li>{{ $prediction['country_id'] }} (Вероятность: {{ $prediction['probability'] }})</li>
                                @endforeach
                            </ul>
                        </div>
                        @endisset
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ route('other.ipinfo') }}" method="POST">
                            @csrf
                            <h4 class="mb-3">Узнать информацию по IP-адресу:</h4>
                            <div class="input-group">
                                <input type="text" class="form-control" name="ip" required>
                                <button type="submit" class="btn btn-primary">Применить</button>
                            </div>
                        </form>

                        @isset($ipInfo)
                        <div class="mt-4">
                            <h5>Информация для IP-адреса "{{ $ipInfo['ip'] }}":</h5>
                            <ul>
                                <li>Страна: {{ $ipInfo['country'] }}</li>
                                <li>Регион: {{ $ipInfo['region'] }}</li>
                                <li>Город: {{ $ipInfo['city'] }}</li>
                            </ul>
                        </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
