<?php

namespace App\Mail;

use App\Email;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class StudentConfirmAttendance extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(['address' => env('MAIL_FROM_ADDRESS'), 'name' => env('MAIL_FROM_NAME')])
            ->subject('Sējiens 2017: Apstiprinājums')
            ->view('mail.student.confirmAttendance')
            ->text('mail.student.confirmAttendance_plain');
    }
}
