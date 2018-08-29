@extends('layouts.app')

@section('content')
    <div class="container">
        @include('notifications')
        <div class="card mb-3">
            <div class="card-header">Grupas pievienošana</div>
            <div class="card-body">
                <div class="card-body">
                    {{ Form::open(['route' => 'group.store']) }}
                        {{ Form::rowText('name', null, 'Nosaukums', ['required','class' => 'form-control mb-2']) }}
                        {{ Form::submit('Izveidot', ['class' => 'brt btn-primary form-control']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection