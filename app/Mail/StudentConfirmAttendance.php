<?php

namespace App\Mail;

use App\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Swift_Message;

class StudentConfirmAttendance extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Student
     */
    public $student;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->withSwiftMessage(function (Swift_Message $message) {
            $message->getHeaders()
                ->addTextHeader('List-Unsubscribe', '<'.action('StudentController@reject', $this->student->email).'>');
        });

        return $this->subject('Sējiens: Apstiprinājums')
            ->view('mail.student.confirmAttendance')
            ->text('mail.student.confirmAttendance_plain');
    }
}
