@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card my-3 mx-auto">
                <div class="card-header">Lietotāja izveide</div>
                <div class="card-body">
                    {{ Form::open(['method' => 'POST', 'route' => 'user.store', 'class' => 'form-horizontal']) }}
                    {{ Form::rowText('name', null, 'Vārds', ['required', 'autofocus']) }}
                    {{ Form::rowEmail('email', null, 'E-pasts', ['required']) }}
                    {{ Form::rowSelect('role', ['user' => 'Lietotājs', 'admin' => 'Administrators'], 'Loma', null, []) }}
                    {{ Form::rowPassword('password', 'Jaunā parole', []) }}
                    {{ Form::rowSubmit('Izveidot', ['class' => 'form-control btn btn-primary']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection