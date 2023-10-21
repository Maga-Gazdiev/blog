<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    public function index()
    {
        $friends = auth()->user()->friends;
        return view('friends.index', compact('friends'));
    }

    public function store(Request $request)
    {
        $id = $request->input('id');
        $friend = User::where('id', $id)->first();

        if (!$friend) {
            return redirect()->back()->with('error', 'Пользователь не найден.');
        }
        if ($friend->id !== Auth::id() && User::where('id', $friend->id)->exists()) {
            auth()->user()->friends()->attach($friend->id);
        } else {
            return redirect()->back()->with('error', 'Вы не можете добавить себе в друзья');
        }


        return redirect()->back()->with('success', 'Пользователь успешно добавлен в друзья.');
    }
}
