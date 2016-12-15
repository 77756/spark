@extends('welcome')

@section('content')
    <div class="padding">
        <div class="col-md-8 col-md-offset-2">
            <div class="box">
                <div class="box-header"><h2>{{ $category->name }}</h2></div>
                <div class="box-body">
                    <form action="/newskill/{{ $category->id }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div id="nameDiv" class="form-group {{ $errors->has('name') ? ' has-error' : '' }}{{ $errors->has('name') ? ' has-feedback' : '' }}">
                            <label for="name" class="control-label">Add new skill</label>
                            <input id="name" type="text" name="name" class="form-control">
                            @if ($errors->has('name'))
                                @foreach($errors->get('name') as $error)
                                    <span class="help-block">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    <hr>
                    <table class="table table-striped table-responsive sortable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Created</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($category->skills as $skill)
                            <tr>
                                <td>{{$skill->id}}</td>
                                <td>{{$skill->name}}</td>
                                <td>{{$skill->created_at}}</td>
                                <td>
                                    <a href="/skill/{{$skill->id}}/edit"
                                       class="btn btn-warning btn-sm">
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm"
                                       onclick="var del = window.confirm('Are you sure you want to delete entry {{ $skill->name }}?');
                                               if (del) { document.location.href = '/skill/{{ $skill->id }}/delete'; }">
                                        Delete
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
    <script src="https://code.jquery.com/jquery-3.1.1.js"
            integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
            crossorigin="anonymous">
    </script>
    <script>
        @if ($errors->has('name'))
            $("#nameDiv").addClass("has-error");
        @endif
    </script>
@endsection