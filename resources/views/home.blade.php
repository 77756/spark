@extends('welcome')

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header"><h2>Welcome to the homepage</h2></div>
            <div class="box-body">You're logged in as {{Auth::user()->name}}</div>
        </div>
    </div>
@endsection
