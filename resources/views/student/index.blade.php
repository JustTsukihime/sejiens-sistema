@extends('layouts.app')

@section('content')
    <div>Student import</div>
{{ Form::open(['url' => route('student.import'), 'files' => true]) }}
    {{ Form::file('file') }}
    {{ Form::submit() }}
{{ Form::close() }}
    <div>Student import attendee list</div>
{{ Form::open(['url' => route('student.importAttendees'), 'files' => true]) }}
    {{ Form::file('file') }}
    {{ Form::submit() }}
{{ Form::close() }}
    <div>Send attendance confirmation letter</div>
{{ Form::open(['url' => route('mail.send')]) }}
    {{ Form::submit() }}
{{ Form::close() }}
    <div>Send attendance confirmation letter</div>
{{ Form::open(['url' => route('mail.send')]) }}
    {{ Form::text('email') }}
    {{ Form::submit() }}
{{ Form::close() }}
@endsection