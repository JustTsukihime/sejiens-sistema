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
                                <h4 class="card-title text-center">{{ $user->name }}</h4>
                                <h6 class="card-subtitle text-center text-muted">Organizators</h6>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <dl class="row m-3">
                                <dt class="col-lg-4">E-pasts</dt>
                                <dd class="col-lg-8">{{ $user->email }}</dd>
                                @if ($user->created_at != $user->updated_at)
                                    <dt class="col-lg-4">Rediģēts</dt>
                                    <dd class="col-lg-8">{{ $user->updated_at->format('d.m.Y. H:i') }}</dd>
                                @endif
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('student.edit', $user) }}" class="btn btn-block btn-info">Rediģēt</a>
                        <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#destroy-user">Dzēst</button>
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
                    @foreach($user->groups as $group)
                        <tr>
                            <td><a href="{{ route('group.show', $group) }}">{{ $group->name }}</a></td>
                            <td>{{ $group->created_at->format('d.m.Y. H:i:s') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- Modal for forcing removing user --}}
    <div class="modal fade" id="destroy-user" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                {{ Form::open(['action' => ['UserController@destroy', $user], 'class' => 'd-inline']) }}
                <div class="modal-header">
                    <h5 class="modal-title">Dzēst lietotāju?</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Nē</button>
                    {{ Form::submit("Jā", ['class' => 'btn btn-danger']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection