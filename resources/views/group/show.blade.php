@extends('layouts.app')

@section('content')
    <div class="container">
        @include('notifications')
        <h1>Grupa "{{ $group->name }}"</h1>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-6">Dalībnieki</dt>
                            <dd class="col-sm-6">{{ $group->members->count() }}</dd>
                            <dt class="col-sm-6">Izveidota</dt>
                            <dd class="col-sm-6">{{ $group->created_at->format('d.m.Y. H:i') }}</dd>
                            <dt class="col-sm-6">Līderis</dt>
                            <dd class="col-sm-6"><a href="{{ route('user.show', $group->leader) }}">{{ $group->leader->name }}</a></dd>
                        </dl>
                        <a href="{{ route('group.edit', $group) }}" class="btn btn-secondary">Rediģēt</a>
                        <a href="{{ action('GroupController@createMember', $group) }}" class="btn btn-secondary">Pievienot dalībnieku</a>
                        <a href="{{ action('GroupController@membersVCard', $group) }}" class="btn btn-secondary">Lejupielādēt kontaktus</a>
                    </div>
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Vārds</th>
                <th>Telefons</th>
                <th class="d-none d-sm-block">Pievienots</th>
                <th>Darbība</th>
            </tr>
            </thead>
            <tbody>
            @foreach($group->members as $student)
                <tr>
                    <td><a href="{{ route('student.show', $student) }}">{{ $student->name }} {{ $student->surname }}</a></td>
                    <td>{{ $student->phone }}</td>
                    <td class="d-none d-sm-block">{{ $student->pivot->created_at }}</td>
                    <td>
                        {{ Form::open(['action' => ['GroupController@removeMember', $group]]) }}
                        {{ Form::hidden('student_id', $student->id) }}
                        {{ Form::submit('Izņemt', ['class' => 'btn btn-warning']) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection