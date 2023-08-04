@extends('layouts.app')

@section('content')

<main>
    <div class="body">
        <div class="main">
            <input type="checkbox" id="chk" aria-hidden="true">

            <div class="signup text-center">
                <form action="{{ route('register.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <label for="chk" aria-hidden="true">Sign up</label>
                    <input  type="text" name="name" placeholder="User name" id="name" required="">
                    <input type="email" name="email" for="exampleInputEmail1" placeholder="Email" id="exampleInputEmail1" aria-describedby="emailHelp" required="">
                    <input type="password" id="password" name="password" placeholder="Password" required="">
                    <button class="button">Sign up</button>
                </form>
            </div>

            <div class="login text-center">
                <form action="{{ route('login.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <label for="chk" aria-hidden="true">Login</label>
                    <input type="email" name="email" placeholder="Email" required="">
                    <input type="password" name="password" placeholder="Password" required="">
                    <button class="button">Login</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection