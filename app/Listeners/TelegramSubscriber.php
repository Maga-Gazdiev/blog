<?php


namespace App\Listeners;


use App\Events\PostStore;
use App\Helpers\Telegram;

class TelegramSubscriber
{
    protected $telegram;

    public function __construct(Telegram $telegram)
    {
        $this->telegram = $telegram;
    }

    public function postStore()
    {
        $this->telegram->sendMessage(1655411850, "Пользователь " . auth()->user()->name . " создал пост");
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen(
            PostStore::class, [
                TelegramSubscriber::class, 'postStore'
            ]
        );

    }
}