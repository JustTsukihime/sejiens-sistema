@extends('layouts.app')

@section('content')
    <div class="container">
        @include('notifications')
        <h1>Grupa "{{ $group->name }}"</h1>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Pievienot dalībnieku</div>
                    <div class="card-body">
                        <a href="{{ route('group.show', $group) }}" class="card-link">Atpakaļ uz grupas sarakstu</a>
                        <span id="endpoint-link" data-href="{{ action([\App\Http\Controllers\StudentController::class, 'resolve']) }}" class="hidden"></span>

                        {{ Form::open(['action' => [[\App\Http\Controllers\GroupController::class, 'storeMember'], $group]]) }}
                        {{ Form::hidden('student_id', null, ['id' => 'student-id']) }}
                        <video muted autoplay playsinline id="qr-video" class="w-100"></video>

                        <b>Nolasīts: </b><span id="cam-qr-result">nekas</span>
                        <b>Atrasts: </b><span id="student-name">nav</span>
                        {{ Form::submit('Pievienot', ['class' => 'form-control btn btn-primary']) }}
                        @vite(['resources/js/scanner.js'])
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection