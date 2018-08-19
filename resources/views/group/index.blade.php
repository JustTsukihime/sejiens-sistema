@extends('layouts.app')

@section('content')
    <div class="container">
        @include('notifications')
        <div class="card mb-3">
            <div class="card-body">
                <div class="btn-toolbar">
                    <div class="btn-group">
                        <a href="{{ route('group.create') }}" class="btn btn-secondary">Pievienot grupu</a>
                    </div>
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nosaukums</th>
                    <th>Lielums</th>
                    <th>Līderis</th>
                </tr>
            </thead>
            <tbody>
                @foreach($groups as $group)
                    <tr>
                        <td><a href="{{ route('group.show', $group) }}">{{ $group->name }}</a></td>
                        <td>{{ $group->members->count() }}</td>
                        <td>{{ $group->leader_id }}</td>
                    </tr>
                @endforeach()
            </tbody>
        </table>
    </div>
@endsection