@extends('layouts.app')

@section('content')
    <div class="login-form">
        <div class="card">
            <div class="card-body">
                {{ Form::open(['url' => route('login')]) }}
                <h2 class="text-center">{{ config('app.name') }}</h2>
                <div class="form-group">
                    {{ Form::label('email', 'E-pasts') }}
                    {{ Form::email('email', null, ['class' => 'form-control', 'required']) }}
                    @if($errors->has('email'))
                        <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('password', 'Parole') }}
                    {{ Form::password('password', ['class' => 'form-control', 'required']) }}
                    @if($errors->has('password'))
                        <small class="form-text text-danger">{{ $errors->first('password') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::checkbox('remember') }}
                    {{ Form::label('remember', 'Iegaumēt mani') }}
                </div>
                <div class="form-group text-center">
                    {{ Form::submit('Ieiet', ['class' =>'form-control btn btn-primary']) }}
                    <a href="{{ route('password.request') }}">Aizmirsi paroli?</a>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
