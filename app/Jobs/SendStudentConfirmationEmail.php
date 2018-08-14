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
    private $students;

    /**
     * Create a new job instance.
     *
     * @param $students
     */
    public function __construct($students)
    {
        $this->students = $students;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->students as $student)
        {
            Mail::to($student)->send(new StudentConfirmAttendance($student));
            $student->emails()->create(['type' => $this->emailType]);
        }
    }
}
