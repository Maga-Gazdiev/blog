@extends('layouts.app')

@section('content')

<main>
    <div class="body">
        <div class="list">
            <div class="mb-3"></div>
            <h2 class="text-center">Все остальные возможности</h2>
            <div class="container mt-5">
            
                <div>
                    <form action="{{ route('other.national') }}" method="POST" class="d-md-flex align-items-center" style="padding-right: 50">
                        @csrf
                        <div class="row">
                            <label type="input" for="name" name="name" required>Узнать национальность по имени:</label>
                            <div class="col-10">
                                <input class="form-control" type="text" name="name" required>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-primary">Применить</button>
                            </div>
                        </div>
                    </form>


                    @isset($predictions)
                    <h2>Предсказанные национальности для имени "{{ $name }}":</h2>
                    <ul>
                        @foreach ($predictions as $prediction)
                        <li>{{ $prediction['country_id'] }} (Вероятность: {{ $prediction['probability'] }})</li>
                        @endforeach
                    </ul>
                    @endisset
                </div>
                <div class="mb-5"></div>
                <div>
                    <form action="{{ route('other.ipinfo') }}" method="POST" class="d-md-flex align-items-center" style="padding-right: 50">
                        @csrf
                        <div class="row">
                            <label type="input" for="name" placeholder="Name" name="name" id='name'>Узнать информацию по IP-адресу:</label>
                            <div class="col-10">
                                <input class="form-control w-100" type="text" type="text" name="ip" required>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-primary">Применить</button>
                            </div>
                        </div>
                    </form>

                    @isset($ipInfo)
                    <h2>Информация для IP-адреса "{{ $ipInfo['ip'] }}":</h2>
                    <li>Страна: {{ $ipInfo['country'] }}</li>
                    <li>Регион: {{ $ipInfo['region'] }}</li>
                    <li>Город: {{ $ipInfo['city'] }}</li>
                    @endisset
                </div>
                <div class="mb-5"></div>
            </div>
        </div>
    </div>
</main>

@endsection