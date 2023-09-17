<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $recipientId = $request->input('recipient_id');
        $user = User::findOrFail($recipientId);
        if ($user->id !== Auth::id() && User::where('id', $user->id)->exists()) {
            $messages = Message::whereIn('sender_id', [Auth::id(), $user->id])
                ->whereIn('recipient_id', [Auth::id(), $user->id])
                ->orderBy('created_at', 'asc')
                ->get();
            return view('office.message', compact('messages', 'user'));
        } else {
            return redirect()->route('posts');
        }
    }

    public function sendMessage(Request $request, User $user)
    {
        // Валидация данных из формы
        $validatedData = $request->validate([
            'content' => 'required',
        ]);

        Message::create([
            'sender_id' => Auth::id(),
            'recipient_id' => $user->id,
            'content' => $validatedData['content'],
        ]);
        return redirect()->back();
    }
}
