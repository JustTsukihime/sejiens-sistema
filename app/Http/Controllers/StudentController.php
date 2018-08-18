<?php

namespace App\Http\Controllers;

use App\Student;
use App\StudentFilters;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    /**
     * StudentController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filters = new StudentFilters($request->all());
        $students = Student::filter($filters)->get();
        return view('student.index', compact('students', 'filters'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Student $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }

    public function management()
    {
        $students = Student::orderBy('email')->get();
        return view('student.management', compact('students'));
    }

    public function import(Request $request) {
        $this->validate($request, [
            'file' => 'required|file|max:1000',
        ]);

//        $attendance = [
//            'Tikai 1. daļu Raiņa bulvārī 19' => 'first',
//            'Tikai 2. daļu Garozas pamatskolā' => 'second',
//            'Esmu īsts datoriķis, tāpēc apmeklēšu abas daļas' => 'both',
//        ];

        $students = [];

        $data = Excel::load($request->file('file')->getPathname())->all();
//        list($timestamp, $fullname, $phone, $email, $attending, $food, $health, $tshirt, $mentor, $whatsapp) = $data->getHeading();
        list($timestamp, $fullname, $phone, $email, $tshirt, $mentor, $whatsapp) = $data->getHeading();

        foreach ($data->values() as $student) {
            if (!$student->$timestamp) continue;

            $student->$fullname = explode(' ', $student->$fullname);
            $student->surname = array_pop($student->$fullname);
            $student->name = implode(' ', $student->$fullname);

            Student::firstOrCreate([
                'email' => $student->$email,
            ],[
                'name' => $student->name,
                'surname' => $student->surname,
                'phone' => $student->$phone,
//                'attending' => $attendance[$student->$attending],
//                'food' => $student->$food,
//                'health' => $student->$health,
                'tshirt' => $student->$tshirt,
                'mentor' => $student->$mentor,
                'whatsapp' => $student->$whatsapp,
                'applied_at' => Carbon::createFromFormat('Y.d.m H:i:s', $student->$timestamp),
            ]);
        }

        $request->session()->flash('notification.success', 'Dalībnieki importēti');
        return redirect()->route('student.index', compact('students'));
    }

    public function importAttendees(Request $request) {
        $this->validate($request, [
            'file' => 'required|file|max:1000'
        ]);

        $attendance = [
            'Tikai 1. daļu (Raiņa 19 aktivitātes)' => 'first',
            'Tikai 2. daļu (mistiskais ārpus Rīgas ceļojums)' => 'second',
            'Esmu īsts datoriķis, tāpēc apmeklēšu abas daļas' => 'both',
        ];

        $data = Excel::load($request->file('file')->getPathname())->all();
        list($timestamp, $name, $surname, $food, $allergies, $health, $attending, $about, $tos, $comments) = $data->getHeading();

        $skipped = [];
        foreach ($data->values() as $student) {
            $model = Student::where(['name' => $student->$name, 'surname' => $student->$surname])->first();
            if (is_null($model)) {
                $skipped[] = $student->$name.' '.$student->$surname;
                continue;
            }

            $model->fill([
                'food' => $student->$food,
                'allergies' => $student->$allergies,
                'health' => $student->$health,
                'attending' => $attendance[$student->$attending],
                'about' => $student->$about,
                'comments' => $student->$comments,
                'confirmed_at' => Carbon::createFromFormat('d/m/Y H:i:s', $student->$timestamp),
            ])->save();
        }

        if (empty($skipped)) {
            $request->session()->flash('notification.success', 'Dalībnieku apstiprinājumi importēti');
        } else {
            $request->session()->flash('notification.error', 'Importēti visi izņemot: '.implode(', ', $skipped));
        }
        return redirect()->route('student.index');
    }

    /**
     * Creates users from students
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createUsers(Request $request) {
        $students = Student::all();

        foreach ($students as $student) {
            $user = User::firstOrNew([
                'name' => $student->name,
                'surname' => $student->surname,
                'email' => $student->email,
                'phone' => $student->phone,
                'student_id' => $student->id,
            ]);

            if(!$user->id) {
                $user->password = bcrypt($student->email);
                $user->save();
            }
        }

        $request->session()->flash('notification.success', ''); // TODO: Add label
        return redirect()->route('student.index');
    }
}
