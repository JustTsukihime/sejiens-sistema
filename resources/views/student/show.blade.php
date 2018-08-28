@extends('layouts.app')

@section('content')
    <div class="container">
        @include('notifications')
        <div class="row mt-3 mb-5">
            <div class="col-lg-8 col-xl-8">
                <div class="card mb-2">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card-body">
                                <img class="card-img mb-2" src="data:image/svg+xml;base64,{{ base64_encode($qrcode->render($student->hash)) }}">
                                <h4 class="card-title text-center">{{ $student->name }} {{ $student->surname }}</h4>
                                <h6 class="card-subtitle text-center text-muted">Dalībnieks</h6>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <dl class="row m-3">
                                <dt class="col-lg-4">E-pasts</dt>
                                <dd class="col-lg-8">{{ $student->email }}</dd>
                                <dt class="col-lg-4">Telefons</dt>
                                <dd class="col-lg-8">{{ $student->phone }}</dd>
                                <dt class="col-lg-4 mt-lg-3">Pieteicās</dt>
                                <dd class="col-lg-8 mt-lg-3">{{ $student->created_at->format('d.m.Y. H:i') }}</dd>
                                @if ($student->confirmed_at)
                                    <dt class="col-lg-4">Apstiprināja dalību</dt>
                                    <dd class="col-lg-8">{{ $student->confirmed_at->format('d.m.Y. H:i') }}</dd>
                                    <dt class="col-lg-4">Pieteicās uz</dt>
                                    <dd class="col-lg-8">{{ $student->attending }}</dd>
                                    <dt class="col-lg-4">Alerģijas</dt>
                                    <dd class="col-lg-8">{{ $student->allergies }}</dd>
                                    <dt class="col-lg-4">Veselība</dt>
                                    <dd class="col-lg-8">{{ $student->health }}</dd>
                                    <dt class="col-lg-4">Krekls</dt>
                                    <dd class="col-lg-8">{{ $student->tshirt }}</dd>
                                    @if($student->about)
                                        <dt class="col-lg-4">Par sevi</dt>
                                        <dd class="col-lg-8">{{ $student->about }}</dd>
                                    @endif
                                    @if($student->comments)
                                        <dt class="col-lg-4">Komentāri</dt>
                                        <dd class="col-lg-8">{{ $student->comments }}</dd>
                                    @endif
                                @endif
                                @if ($student->created_at != $student->updated_at)
                                    <dt class="col-lg-4">Rediģēts</dt>
                                    <dd class="col-lg-8">{{ $student->updated_at->format('d.m.Y. H:i') }}</dd>
                                @endif
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('student.edit', $student) }}" class="btn btn-block btn-info">Rediģēt</a>
                        <button class="btn btn-dark btn-block" data-toggle="modal" data-target="#destroy-student">Pievienot grupai</button>
                        <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#destroy-student">Dzēst</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="table-responsive">
                <table class="table">
                    <caption>Grupas</caption>
                    <thead>
                        <tr>
                            <th>Nosaukums</th>
                            <th>Pievienots</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($student->groups as $group)
                        <tr>
                            <td><a href="{{ route('group.show', $group) }}">{{ $group->name }}</a></td>
                            <td>{{ $group->pivot->created_at->format('d.m.Y. H:i:s') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection