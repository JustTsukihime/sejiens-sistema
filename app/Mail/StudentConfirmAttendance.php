<?php

namespace App\Mail;

use App\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        return $this->subject('Sējiens: Apstiprinājums')
            ->view('mail.student.confirmAttendance')
            ->text('mail.student.confirmAttendance_plain');
    }
}
