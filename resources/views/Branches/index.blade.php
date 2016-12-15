@extends('welcome')

@section('content')
    <div class="padding">
        <div class="col-md-8 col-md-offset-2">
            <div class="box">
                <div class="box-header"><h2>All Branches</h2></div>
                <div class="box-body">
                    <form action="/newbranche" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}{{ $errors->has('name') ? ' has-feedback' : '' }}">
                            <label for="name" class="control-label">New branche</label>
                            <input id="name" type="text" name="name" class="form-control" placeholder="Branch name"
                                   required/>
                            @if ($errors->has('name'))
                                @foreach($errors->get('name') as $error)
                                    <span class="help-block">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add Branche</button>
                        </div>
                    </form>
                    <hr>
                    <table class="table table-striped table-responsive sortable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th data-defaultsort="asc">Name</th>
                            <th>Created</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($branches as $branche)
                            <tr>
                                <td>{{$branche->id}}</td>
                                <td>{{$branche->name}}</td>
                                <td>{{$branche->created_at}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm"
                                       href="/branches/{{ $branche->id }}">
                                        Go to
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm"
                                       onclick="var del = window.confirm('Are you sure you want to delete entry {{ $branche->name }}?');
                                               if (del) { document.location.href = '/branches/{{ $branche->id }}/delete'; }">
                                        Delete
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-warning btn-sm"
                                       href="/branches/{{ $branche->id }}/edit">Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection