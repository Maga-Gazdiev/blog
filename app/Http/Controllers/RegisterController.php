<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            if(substr($request->email, -10) === "yandex.com" || substr($request->email, -9) === "gmail.com" || substr($request->email, -8) === "mail.com"){
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);
       
    
            Auth::login($user);
            return view('post.index');
        } else {
            return view('register.index');
        }
            
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors(['email' => 'Такая почта уже существует в базе данных']);
        }
    }
}