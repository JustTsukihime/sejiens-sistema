<?php

namespace App\Listeners;

use App\Email;
use Carbon\Carbon;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogSentMessage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MessageSent  $event
     * @return void
     */
    public function handle(MessageSent $event)
    {
        Email::create([
            'to' => implode(', ', array_keys($event->message->getTo())),
            'subject' => $event->message->getSubject(),
            'sent_at' => Carbon::now(),
        ]);
    }
}
