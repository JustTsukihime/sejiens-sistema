<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.index');
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
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }

    public function import(Request $request) {
        $this->validate($request, [
            'file' => 'required|file|max:1000|mimetypes:application/vnd.ms-excel,application/msexcel,application/x-msexcel,application/x-ms-excel,application/x-excel,application/x-dos_ms_excel,application/xls,application/x-xls,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        ]);

        $attendance = [
            'Tikai 1. daļu Raiņa bulvārī 19' => 'first',
            'Tikai 2. daļu Garozas pamatskolā' => 'second',
            'Esmu īsts datoriķis, tāpēc apmeklēšu abas daļas' => 'both',
        ];

        $students = [];

        $data = Excel::load($request->file('file')->getPathname())->all();
        list($timestamp, $fullname, $phone, $email, $attending, $food, $health, $tshirt, $mentor, $whatsapp) = $data->getHeading();

        foreach ($data->values() as $student) {
            if (!$student->$timestamp) continue;

            $student->$fullname = explode(' ', $student->$fullname);
            $student->surname = array_pop($student->$fullname);
            $student->name = implode(' ', $student->$fullname);

            Student::firstOrCreate([
                'name' => $student->name,
                'surname' => $student->surname,
                'email' => $student->$email,
                'phone' => $student->$phone.'',
                'attending' => $attendance[$student->$attending],
                'food' => $student->$food,
                'health' => $student->$health,
                'tshirt' => $student->$tshirt,
                'mentor' => $student->$mentor,
                'whatsapp' => $student->$whatsapp,
                'applied_at' => $student->$timestamp,
            ]);
        }

        $request->session()->flash('notification.success', ''); // TODO: Add label
        return redirect()->route('student.index', compact('students'));
    }

    public function importAttendees(Request $request) {
        $this->validate($request, [
            'file' => 'required|file|max:1000|mimetypes:application/vnd.ms-excel,application/msexcel,application/x-msexcel,application/x-ms-excel,application/x-excel,application/x-dos_ms_excel,application/xls,application/x-xls,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        ]);

        $attendance = [
            'Tikai 1.daļu (Raiņa bulvārī 19)' => 'first',
            'Tikai 2.daļu (Garozas pamatskolā)' => 'second',
            'Abām daļām' => 'both',
        ];

        $data = Excel::load($request->file('file')->getPathname())->all();
        list($timestamp, $name, $surname, $allergies, $attending, $dropoff, $comments, $withdrawn) = $data->getHeading();

        foreach ($data->values() as $student) {
            $model = Student::where(['name' => $student->$name, 'surname' => $student->$surname])->first();
            if (is_null($model)) continue;

            $model->fill([
                'allergies' => $student->$allergies,
                'attending' => $attendance[$student->$attending],
                'dropoff' => $student->$dropoff,
                'comments' => $student->$comments,
                'confirmed_at' =>$student->$timestamp,
            ])->save();

            if ($student->$withdrawn == 1) {
                $model->delete();
            }
        }

        $request->session()->flash('notification.success', ''); // TODO: Add label
        return redirect()->route('student.index', compact('students'));
    }
}
