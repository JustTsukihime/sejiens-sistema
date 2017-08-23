@extends('layouts.app')

@section('content')
    <div>Student import</div>
{{ Form::open(['url' => route('student.import'), 'files' => true]) }}
    {{ Form::file('file') }}
    {{ Form::submit() }}
{{ Form::close() }}
    <div>Send attendance confirmation letter</div>
{{ Form::open(['url' => route('mail.send')]) }}
    {{ Form::submit() }}
{{ Form::close() }}
@endsection