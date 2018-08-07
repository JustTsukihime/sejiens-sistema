@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('notification.success'))
            {{ session()->get('notification.success') }}
        @endif
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if($errors->has('file'))
                    {{ $errors->first('file') }}
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">Student import</div>
                    <div class="panel-body">
                        {{ Form::open(['url' => route('student.import'), 'files' => true]) }}
                            {{ Form::file('file', ['class' => 'form-control']) }}
                            {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                        {{ Form::close() }}
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Student import attendee list</div>
                    <div class="panel-body">
                        {{ Form::open(['url' => route('student.importAttendees'), 'files' => true]) }}
                            {{ Form::file('file') }}
                            {{ Form::submit() }}
                        {{ Form::close() }}
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Send attendance confirmation letter</div>
                    <div class="panel-body">
                        {{ Form::open(['url' => route('mail.send')]) }}
                            {{ Form::submit() }}
                        {{ Form::close() }}
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Send attendance confirmation letter</div>
                    <div class="panel-body">
                        {{ Form::open(['url' => route('mail.send')]) }}
                            {{ Form::text('email') }}
                            {{ Form::submit() }}
                        {{ Form::close() }}
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Create users</div>
                    <div class="panel-body">
                        {{ Form::open(['url' => route('student.createUsers')]) }}
                            {{ Form::submit() }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection