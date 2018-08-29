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
                    <h1 class="display-1">{{ $students->where('confirmed_at', '!=', null)->where('attending', 'both')->count() }}</h1>
                    <p class="lead">pieteicās uz abām</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h1 class="display-1">{{ $students->where('confirmed_at', '!=', null)->where('attending', 'first')->count() }}</h1>
                    <p class="lead">pieteicās uz R19</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h1 class="display-1">{{ $students->where('confirmed_at', '!=', null)->where('attending', 'second')->count() }}</h1>
                    <p class="lead">pieteicās uz Garozu</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
