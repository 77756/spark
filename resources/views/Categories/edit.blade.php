@extends('welcome')

@section('content')
    <div class="padding">
        <div class="col-md-8 col-md-offset-2">
            <div class="box">
                <div class="box-header"><h2>{{ $category->name }}</h2></div>
                <div class="box-body">
                    <ul class="list-group">
                    </ul>
                    <form action="/categories/{{ $category->id }}/update" method="post">
                        {{method_field('patch')}}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}{{ $errors->has('name') ? ' has-feedback' : '' }}">
                            <label for="name" class="control-label">Update category name</label>
                            <textarea id="name" name="name" class="form-control"
                                      required>{{ $category->name }}</textarea>
                            @if ($errors->has('name'))
                                @foreach($errors->get('name') as $error)
                                    <span class="help-block">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Name</button>
                        </div>
                        <div class="form-group">
                            <a href="/categories" class="btn btn-warning">Back</a>
                        </div>
                    </form>
                </div>
            </div>
@endsection