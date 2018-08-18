@extends('layouts.app')

@section('content')
    <div class="container">
        @include('notifications')
        @if($errors->has('file'))
            {{ $errors->first('file') }}
        @endif
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                <div class="card">
                    <div class="card-header">Dalībnieku pieteikumu imports</div>
                    <div class="card-body btn-">
                        {{ Form::open(['route' => 'student.import', 'files' => true]) }}
                        {{ Form::file('file', ['class' => 'form-control-file mb-2', 'required']) }}
                        {{ Form::submit('Importēt', ['class' => 'form-control btn btn-primary']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                <div class="card">
                    <div class="card-header">Dalībnieku apstiprinājumu imports</div>
                    <div class="card-body btn-">
                        {{ Form::open(['route' => 'student.importAttendees', 'files' => true]) }}
                        {{ Form::file('file', ['class' => 'form-control-file mb-2', 'required']) }}
                        {{ Form::submit('Importēt', ['class' => 'form-control btn btn-primary']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                <div class="card">
                    <div class="card-header">Sūtīt apstiprinājuma e-pastu dalībniekam</div>
                    <div class="card-body btn-">
                        {{ Form::open(['action' => 'EmailController@studentConfirmation']) }}
                        {{ Form::select('student_id', $students->pluck('email', 'id'), null, ['class' => 'form-control mb-2', 'placeholder' => 'Choose student\'s email']) }}
                        {{ Form::submit('Sūtīt', ['class' => 'form-control btn btn-primary']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                <div class="card">
                    <div class="card-header">Sūtīt apstiprinājuma e-pastus dalībniekiem</div>
                    <div class="card-body btn-">
                        {{ Form::open(['action' => 'EmailController@studentConfirmation']) }}
                        {{ Form::submit('Sūtīt', ['class' => 'form-control btn btn-primary']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            {{--<div class="col-sm-6 col-md-4 col-lg-3 mb-3">--}}
            {{--<div class="card">--}}
            {{--<div class="card-header">Izveidot lietotājus</div>--}}
            {{--<div class="card-body btn-">--}}
            {{--{{ Form::open(['route' => 'student.createUsers']) }}--}}
            {{--{{ Form::submit('Izveidot', ['class' => 'form-control btn btn-primary']) }}--}}
            {{--{{ Form::close() }}--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
@endsection