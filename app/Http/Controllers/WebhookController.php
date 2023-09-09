<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class WebhookController extends Controller
{
    public function index(Request  $request)
    {
        Log::info('Received Telegram Data: ' . json_encode($request->all()));
        dd($request->input());
        $public = explode('|', $request->input('callback_query')['data'])[0];
        $id = explode('|', $request->input('callback_query')['data'])[1];
        $order = Post::where('id', $id)->first();
        dd($order);
        if ($public === 1) {
            return redirect()->route('posts');
        } else {
            $order->delete($order['id']);
            return redirect()->route('posts');
        }
    }
}
