@extends('layouts.app')

@section('content')

<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Чат с пользователем {{ $user->name }}</h1>
                    </div>
                    <div class="card-body">
                        <div class="mb-4"></div>
                        <ul class="chat-list">
                            @foreach ($messages as $message)
                            <li class="chat-item">
                                @if ($message->sender_id === Auth::id())
                                <div class="message outgoing">
                                    <strong>Вы:</strong>
                                    <p>{{ $message->content }}</p>
                                </div>
                                @else
                                <div class="message incoming">
                                    <strong>{{ $user->name }}:</strong>
                                    <p>{{ $message->content }}</p>
                                </div>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                        <div class="mb-5"></div>
                        <form action="{{ route('messages.store', $user) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <textarea name="content" id="content" class="form-control" rows="3" placeholder="Введите сообщение"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Отправить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection