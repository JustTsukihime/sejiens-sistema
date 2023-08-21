@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card my-3 mx-auto">
                <div class="card-header">Studenta datu rediģēšana</div>
                <div class="card-body">
                    {{ Form::model($student, ['method' => 'PUT', 'route' => ['student.update', $student], 'class' => 'form-horizontal']) }}
                    {{ Form::rowText('perskods', null, 'Personas kods', []) }}
                    {{ Form::rowText('aplkods', null, 'Studenta apliecības numurs', []) }}
                    {{ Form::rowText('name', null, 'Vārds', ['required', 'autofocus']) }}
                    {{ Form::rowText('surname', null, 'Uzvārds', ['required']) }}
                    {{ Form::rowText('phone', null, 'Telefons', ['required']) }}
                    {{ Form::rowEmail('email', null, 'E-pasts', ['required']) }}
                    {{ Form::rowSelect('attending', ['both' => 'Visur', 'first' => 'Sējiens', 'second' => 'Pļāviens'], 'Pieteicās', null, []) }}
                    {{ Form::rowText('food', null, 'Gastronomiskā orientācija', []) }}
                    {{ Form::rowText('allergies', null, 'Alerģijas', []) }}
                    {{ Form::rowText('tshirt', null, 'Krekls', []) }}
                    {{ Form::rowText('health', null, 'Veselība', []) }}
                    {{ Form::rowTextarea('about', null, 'Par sevi', []) }}
                    {{ Form::rowSelect('gender', ['yes' => 'Jā', 'no' => 'Nē'], 'Piekrita sadzīvot vienā istabā ar cita dzimuma pārstāvjiem?', null, []) }}
                    {{ Form::rowText('songs', null, 'Dziesmas', []) }}
                    {{ Form::rowText('comments', null, 'Komentāri', []) }}
                    <div class="form-group row">
                        <div class="col-sm-4">@lang('labels.comment')</div>
                        <div class="col-sm-8">{{ $student->comments }}</div>
                    </div>
                    {{ Form::rowSubmit('Saglabāt', ['class' => 'form-control btn btn-primary']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection