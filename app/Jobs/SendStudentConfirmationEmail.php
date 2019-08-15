<?php

namespace App\Jobs;

use App\Mail\StudentConfirmAttendance;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendStudentConfirmationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $emailType = 'attendanceConfirmation';
    private $student;

    /**
     * Create a new job instance.
     *
     * @param $students
     */
    public function __construct($student)
    {
        $this->student = $student;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->student)->send(new StudentConfirmAttendance($this->student));
        $this->student->emails()->create(['type' => $this->emailType]);
    }
}
