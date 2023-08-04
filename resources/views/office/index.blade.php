@extends('layouts.app')

@section('content')
<style>
  main {
    background-color: #B0C4DE;
  }
</style>

<main>
  <div class="body">
    <div class="list">
      <div class="container-lg">
        <div class="mb-2"></div>
        <h1 class="text py-2 px-4 px-4">Личный кабинет</h1>
        
          <p class="px-4 px-5 fs-4">Ник:<a class="text px-3">{{$user->name}}</a></p>
          <p class="px-4 px-5 fs-4">Email:<a class="text px-3">{{$user->email}}</a></p>
    
          <a class="px-4 px-5 fs-4" href="{{ route('user.posts.like') }}" style="text-decoration: none">Все лайкнутые посты</a>
          <p></p>
          <a class="px-4 px-5 fs-4" href="{{ route('user.posts') }}" style="text-decoration: none">Все мои посты</a>
        

        @auth()
        <div class="flex items-center lg:order-2">
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
          <div class='py-3'>
            <a href="{{ route('logout') }}" style="text-decoration: none" class="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <button type="button" class="button">Выход</button>
            </a>
          </div>
        </div>
        @endauth
      </div>
    </div>
  </div>
</main>

@endsection