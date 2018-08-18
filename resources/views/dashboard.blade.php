@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h1 class="display-1">{{ $students->count() }}</h1>
                    <p class="lead">pieteikumi</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h1 class="display-1">{{ $students->where('confirmed_at', '!=', null)->count() }}</h1>
                    <p class="lead">apstiprinājuši</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h1 class="display-1">0</h1>
                    <p class="lead">ieradās R19</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h1 class="display-1">0</h1>
                    <p class="lead">ieradās Garozā</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
