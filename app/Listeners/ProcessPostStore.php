<?php


namespace App\Listeners;


use App\Events\PostStore;
use App\Helpers\Telegram;

class ProcessPostStore
{
    protected $telegram;

    public function __construct(Telegram $telegram)
    {
        $this->telegram = $telegram;
    }

    public function postStore(PostStore $event)
    {
        $data = [
            'id' => $event->post->id,
            'name' => $event->post->name,
            'body' => $event->post->body,
            'user_id' => $event->post->user_id
        ];

        $reply_markup = [
            'inline_keyboard' =>
                [
                    [
                        [
                            'text' => 'Принять',
                            'callback_data' => '1|' . $event->post->id,
                        ],
                        [
                            'text' => 'Отклонить',
                            'callback_data' => '0|' . $event->post->id,
                        ],
                    ]
                ]
        ];

        $this->telegram->sendButtons(env('REPORT_TELEGRAM_ID'), (string)view('new_message', $data), $reply_markup);
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
                ProcessPostStore::class, 'postStore'
            ]
        );

    }
}