@extends('welcome')

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header"><h2>All Categories</h2></div>
            <form role="form" action="/categories/add" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div id="nameDiv"
                     class="col-md-8 pull-left form-group {{ $errors->has('name') ? ' has-error' : '' }}{{ $errors->has('name') ? ' has-feedback' : '' }}">
                    <label for="name" class="control-label">New category</label>
                    <input id="name" type="text" name="name" class="form-control" placeholder="Category name"/>
                    @if ($errors->has('name'))
                        @foreach($errors->get('name') as $error)
                            <span class="help-block">{{ $error }}</span>
                        @endforeach
                    @endif
                </div>
                <div class="form-group col-md-4 pull-right m-t-2">
                    <button type="submit" class="btn btn-primary pull-right">Add Category</button>
                </div>
            </form>
            <div class="table-responsive">
                <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    <table ui-jp="dataTable" class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Created</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>
                                    <a href="/categories/{{ $category->id }}">
                                        {{$category->name}}
                                    </a>
                                </td>
                                <td>{{$category->created_at}}</td>
                                <td>
                                    <a class="btn btn-danger btn-sm"
                                       onclick="var del = window.confirm('Are you sure you want to delete entry {{ $category->name }}?');
                                               if (del) { document.location.href = '/categories/{{ $category->id }}/delete'; }">
                                        Delete
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-warning btn-sm"
                                       href="/categories/{{ $category->id }}/edit">Edit
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