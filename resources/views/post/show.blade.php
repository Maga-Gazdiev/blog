<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@extends('layouts.app')

@section('content')

<main>
    <div class="body">
        <div class="list">
            <div class="container-lg px-5">
                <div class="container -5">
                    <div class="mb-5"></div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h1 class="display-5">{{ $post->name }}</h1>
                            <p class="lead">{{ $post->body }}</p>
                        </div>
                    </div>
                </div>

                <x-comment-component :post="$post" />
            </div>
        </div>
    </div>
</main>

@endsection