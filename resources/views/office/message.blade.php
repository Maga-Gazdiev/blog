@extends('layouts.app')

@section('content')

<main>
    <div class="body">
        <div class="list">
            <div class="container mt-5">
                <h1>Чат с пользователем {{ $user->name }}</h1>
                <div class="mb-4"></div>
                <ul>
                    @foreach ($messages as $message)
                    <div>
                        @if ($message->sender_id === Auth::id())
                        <strong>Вы:</strong>
                        @else
                        <div class="mb-2"></div>
                        <strong>{{ $user->name }}:</strong>
                        @endif
                        
                        {{ $message->content }}
                    </div>
                    @endforeach
                </ul>
                <div class="mb-5"></div>
                <form action="{{ route('chat.send', $user) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <textarea name="content" id="content" class="form-control" rows="3" placeholder="Введите сообщение"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>

            </div>
        </div>
    </div>
</main>

@endsection