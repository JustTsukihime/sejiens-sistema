<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\StudentRequest;
use App\Student;
use App\StudentFilters;
use App\User;
use Carbon\Carbon;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    /**
     * StudentController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('store', 'confirmation', 'confirm');
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
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StudentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $student = Student::make($request->only(['name', 'surname', 'email', 'phone', 'tshirt', 'whatsapp']));
        $student->applied_at = Carbon::now();
        $student->hash = substr(sha1($student->email.time()), 0, 8);
        $student->save();
        session()->flash('application-success', 'Paldies, ka pieteicies Sējienam!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $qropt = new QROptions([
            'outputType' => QRCode::OUTPUT_MARKUP_SVG,
            'eccLevel'   => QRCode::ECC_H,
            'addQuietzone' => false,
            'cssClass' => 'card-img',
        ]);
        $qrcode = new QRCode($qropt);

        $groupList = Group::whereNotIn('id', $student->groups->pluck('id'))->get()->pluck('name', 'id');

        return view('student.show', compact('student', 'qrcode', 'groupList'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('student.edit', compact('student'));
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
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $student->update($request->only(['name', 'surname', 'email', 'phone', 'attending', 'food', 'health']));
        return redirect()->route('student.show', $student);
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

    public function resolve(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'hash' => 'required_if:type,qr',
            'name' => 'required_if:type,name',
        ]);

        if ($request->type == 'qr') {
            $student = Student::where('hash', $request->hash)->first();
        }

        return ['id' => $student->id, 'name' => $student->name.' '.$student->surname];
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
                'hash' => substr(sha1($student->$phone.$student->$email), 0, 8),
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

    public function addGroup(Request $request, Student $student)
    {
        $this->validate($request, [
            'group_id' => 'required|exists:groups,id'
        ]);

        if (! $student->groups->contains($request->group_id)) {
            $student->groups()->attach($request->group_id);
        }
        return back();
    }

    public function forceConfirm(Student $student)
    {
        $student->confirm();
        return back();
    }

    public function confirmation($hash)
    {
        $student = Student::hash($hash)->first();

        if (!$student)
            return redirect()->route('landing');

        return view('student.confirmation', compact('student'));
    }

    public function confirm(Request $request)
    {
        $this->validate($request, [
            'hash' => 'bail|required',
            'food' => 'required',
            'allergies' => 'required',
            'health' => 'required',
            'about' => 'nullable',
            'attending' => 'required',
        ]);

        $student = Student::hash($request->hash)->first();

        if (!$student)
            return redirect()->route('landing');

        $student->update($request->only(['food', 'allergies', 'health', 'about', 'attending']));
        $student->confirm();

        return back();
    }

    public function reject($email)
    {
        $student = Student::notConfirmed()->where('email', $email)->first();

        if ($student) {
            $student->reject();
        }

        return view('student.rejection');
    }

    public function VCard(Student $student)
    {
        $vcard = $student->getVCard();
        return response()->streamDownload(function () use ($vcard) {
            echo $vcard->getOutput();
        }, $vcard->getFilename().'.'.$vcard->getFileExtension(), ['Content-type' => $vcard->getContentType()]);
    }
}
