@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/profile/update') }}">
                            {{ csrf_field() }}
                            {{ method_field('patch') }}

                            <div class="form-group{{ $errors->has('companyName') ? ' has-error' : '' }}">
                                <label for="companyName" class="col-md-4 control-label">Company</label>

                                <div class="col-md-6">
                                    <input id="companyName" type="text" class="form-control" name="companyName"
                                           value="{{ $user->companyName }}" required autofocus>

                                    @if ($errors->has('companyName'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('companyName') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                                <label for="firstName" class="col-md-4 control-label">First name</label>

                                <div class="col-md-6">
                                    <input id="firstName" type="text" class="form-control" name="firstName"
                                           value="{{ $user->firstName }}" required>

                                    @if ($errors->has('firstName'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                                <label for="lastName" class="col-md-4 control-label">Last name</label>

                                <div class="col-md-6">
                                    <input id="firstName" type="text" class="form-control" name="lastName"
                                           value="{{ $user->lastName }}" required>

                                    @if ($errors->has('lastName'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ $user->email }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                <label for="type" class="col-md-4 control-label">Type</label>

                                <div class="col-md-6">
                                    <select name="type" id="type" class="form-control">
                                        <option value="">-- Choose user type --</option>
                                        <option value="Guest" {{ $user->type == 'Guest' ? 'selected' : '' }}>Guest</option>
                                        <option value="Contact person" {{ $user->type == 'Contact person' ? 'selected' : '' }}> Contact person</option>
                                        <option value="Admin" {{ $user->type == 'Admin' ? 'selected' : '' }}>Admin</option>
                                    </select>

                                    @if ($errors->has('type'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
