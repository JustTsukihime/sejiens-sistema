<?php

namespace App\Http\Controllers;

use App\Student;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('landing');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();

        return view('dashboard', compact('students'));
    }

    /**
     * Show the application landing.
     *
     * @return \Illuminate\Http\Response
     */
    public function landing()
    {
        return view('landing');
    }
}
