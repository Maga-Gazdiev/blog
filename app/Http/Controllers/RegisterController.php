<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|ends_with:gmail.com,yandex.ru,mail.ru,yandex.com,mail.com,gmail.ru',
                'name' => 'required|string|max:255',
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            event(new Registered($user));
            Auth::login($user);
            
            return redirect()->route('posts');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors(['email' => 'Такая почта уже существует в базе данных']);
        }
    }
}

