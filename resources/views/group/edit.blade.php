@extends('layouts.app')

@section('content')
<div class="container">
    @include('notifications')
    <div class="card mb-3">
        <div class="card-header">Grupas pievienošana</div>
        <div class="card-body">
            <div class="card-body">
                {{ Form::model($group, ['route' => ['group.update', $group], 'method' => 'PATCH']) }}
                    {{ Form::rowText('name', null, 'Nosaukums', ['required', 'autofocus']) }}
                    {{ Form::submit('Izveidot', ['class' => 'brt btn-primary form-control']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection