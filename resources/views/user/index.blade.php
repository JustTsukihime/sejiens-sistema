@extends('layouts.app')

@section('content')
    <div class="container">
        @include('notifications')
        <div class="card mb-3">
            <div class="card-body">
                <div class="btn-toolbar">
                    <div class="btn-group">
                        <a href="{{ route('user.create') }}" class="btn btn-secondary">Pievienot lietotāju</a>
                    </div>
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Nosaukums</th>
                <th>Lielums</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td><a href="{{ route('user.show', $user) }}">{{ $user->name }}</a></td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach()
            </tbody>
        </table>
    </div>
@endsection