@extends('welcome')

@section('content')
    <div class="padding">
        <div class="col-md-8 col-md-offset-2">
            <div class="box">
                <div class="box-header"><h1>{{ $branche->name }}</h1></div>
                <div class="box-body">
                    <ul class="list-group">
                    </ul>
                    <h2>Update branche name</h2>
                    <form action="/branches/{{ $branche->id }}/update" method="post">
                        {{method_field('patch')}}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <textarea name="name" class="form-control" required>{{ $branche->name }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Name</button>
                        </div>
                        <div class="form-group">
                            <a href="/branches" class="btn btn-warning">Back</a>
                        </div>
                    </form>
                </div>
            </div>
@endsection