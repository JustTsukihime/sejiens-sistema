@extends('layouts.app')

@section('content')
    <div class="container">
        @include('notifications')
        <div class="card mb-3">
            <div class="card-header">Grupas pievienošana</div>
            <div class="card-body">
                <div class="card-body">
                    {{ Form::open(['route' => 'group.store']) }}
                        <div class="form-group row">
                            <label for="name" class="col-sm-4">Nosaukums</label>
                            <div class="col-sm-8">
                                {{ Form::text('name', null, ['class' => 'form-control mb-2', 'required']) }}
                            </div>
                        </div>
                        {{ Form::submit('Izveidot', ['class' => 'brt btn-primary form-control']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection