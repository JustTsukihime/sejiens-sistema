<?php

namespace App\Http\Controllers;

use App\Email;
use App\Jobs\SendStudentConfirmationEmail;
use App\Student;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return view('email.index', ['active' => $this->testConnection()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function show(Email $email)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function edit(Email $email)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Email $email)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy(Email $email)
    {
        //
    }

    public function send(Request $request) {
        $this->validate($request, [
            'email' => 'required|email'
        ]);

        $type = 'StudentConfirmAttendance';
        $mail = resolve('App\Mail\\'.$type);

        Mail::to($request->email)->send($mail);
        return redirect()->route('student.index');
    }

    public function studentConfirmation(Request $request)
    {
        if ($request->has('student_id')) {
            $students = Student::where('id', $request->student_id)->get();
        } else {
            $students = Student::whereDoesntHave('emails', function (Builder $query) {
                $query->where('type', 'attendanceConfirmation');
            })->get();
        }

        SendStudentConfirmationEmail::dispatch($students);

        $request->session()->flash('notification.notice', 'Student confirmation email sending job dispatched.');
        return back();
    }
}
