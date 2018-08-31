@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card my-3 mx-auto">
                <div class="card-header">Studenta pievienošana</div>
                <div class="card-body">
                    {{ Form::open(['method' => 'POST', 'route' => ['student.store'], 'class' => 'form-horizontal']) }}
                    {{ Form::rowText('name', null, 'Vārds', ['required', 'autofocus']) }}
                    {{ Form::rowText('surname', null, 'Uzvārds', ['required']) }}
                    {{ Form::rowEmail('email', null, 'E-pasts', ['required']) }}
                    {{ Form::rowSubmit('Pievienot', ['class' => 'form-control btn btn-primary']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection