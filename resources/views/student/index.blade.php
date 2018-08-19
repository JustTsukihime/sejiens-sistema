@extends('layouts.app')

@section('content')
    <div class="container">
        @include('notifications')
        <div class="card mb-3">
            <div class="card-body">
                <div class="btn-toolbar">
                    <div class="btn-group">
                        <a href="{{ route('student.index', $filters->except(['status'])->all()) }}" class="btn btn-secondary {{ $filters->has('status') ? '' : 'active' }}">Visi</a>
                        <a href="{{ route('student.index', $filters->with(['status' => 'confirmed'])->all()) }}" class="btn btn-secondary {{ $filters->is('status', 'confirmed') ? 'active' : '' }}">Apstiprinājušie</a>
                        <a href="{{ route('student.index', $filters->with(['status' => 'unconfirmed'])->all()) }}" class="btn btn-secondary {{ $filters->is('status', 'unconfirmed') ? 'active' : '' }}">Neapstiprinājušie</a>
                    </div>
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>N.p.k</th>
                    <th>Vārds</th>
                    <th>Telefons</th>
                    <th>E-pasts</th>
                    <th>Par sevi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->name }} {{ $student->surname }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->about }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('student.management') }}">Dalībnieku pārvalde</a>
    </div>
@endsection