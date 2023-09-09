<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;


class Telegram
{
    const url = 'https://api.telegram.org/bot';
    const bot = "6473170835:AAGp0hpj3X2O7ve3AV-wKm2wdX6hpHuj4Kw";

    public function sendMessage($chat_id, $message)
    {
        return  Http::post(self::url . self::bot . '/sendMessage', [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'html'
        ]);
    }

    public function sendButtons($chat_id, $message, $button){
        return  Http::post(self::url . self::bot . '/sendMessage', [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'html',
            'reply_markup' => $button
        ]);
    }
}
