<?php

namespace App\Jobs;

use App\Mail\StudentConfirmAttendance;
use App\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendStudentConfirmationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $emailType = 'attendanceConfirmation';

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $students = Student::whereDoesntHave('emails', function (Builder $query) {
            $query->where('type', $this->emailType);
        })->get();

        foreach ($students as $student)
        {
            Mail::to($student)->send(new StudentConfirmAttendance($student));
            $student->emails()->create(['type' => $this->emailType]);
        }
    }
}
