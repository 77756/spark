@extends('welcome')

@section('content')
    <div class="padding">
        <form role="form" enctype="multipart/form-data" action="/customers/{{ $customer->id }}/update" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{ method_field('patch') }}
            <div class="box">
                <div class="box-header"><h2>Edit {{$customer->name}}</h2></div>
                <div class="box-body">
                    <!-- row 1 -->
                    <div class="row">
                        <!-- company name -->
                        <div id="nameDiv" class="form-group col-xs-6 {{ $errors->has('name') ? ' has-error' : '' }}{{ $errors->has('name') ? ' has-feedback' : '' }}name">
                            <label for="name" class="control-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                   placeholder="Max. 100 long, unique" value="{{ $customer->name }}">
                            @if ($errors->has('name'))
                                @foreach($errors->get('name') as $error)
                                    <span class="help-block">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>

                        <!-- company mail -->
                        <div id="emailDiv" class="form-group col-xs-6 {{ $errors->has('email') ? ' has-error' : '' }}{{ $errors->has('email') ? ' has-feedback' : '' }}">
                            <label for="email" class="control-label">E-mail address</label>
                            <input type="text" class="form-control" name="email" id="email"
                                   placeholder="Valid e-mail, unique" value="{{ $customer->email }}">
                            @if ($errors->has('email'))
                                @foreach($errors->get('email') as $error)
                                    <span class="help-block">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- /row 1 -->

                    <!-- row 1.2 -->
                    <div class="row">
                        <!-- company phone number -->
                        <div id="phoneDiv" class="form-group col-xs-6 {{ $errors->has('phone') ? ' has-error' : '' }}{{ $errors->has('phone') ? ' has-feedback' : '' }}">
                            <label for="phone" class="control-label">Phone number</label>
                            <input type="tel" class="form-control" name="phone" id="phone"
                                   placeholder="Max. 20 long" value="{{ $customer->phone }}">
                            @if ($errors->has('phone'))
                                @foreach($errors->get('phone') as $error)
                                    <span class="help-block">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>

                        <!-- end date -->
                        <div id="ending_onDiv" class="form-group col-xs-6 {{ $errors->has('ending_on') ? ' has-error' : '' }}{{ $errors->has('ending_on') ? ' has-feedback' : '' }}">
                            <label for="ending_on" class="control-label">End date</label>
                            <input type="date" class="form-control" name="ending_on" id="ending_on"
                                   value="{{ $customer->ending_on }}">
                            @if ($errors->has('ending_on'))
                                @foreach($errors->get('ending_on') as $error)
                                    <span class="help-block">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- /row 1.2 -->
                    <br/>
                    <!-- row 2 -->
                    <div class="row">
                        <!-- company street -->
                        <div id="streetDiv" class="form-group col-xs-6 {{ $errors->has('street') ? ' has-error' : '' }}{{ $errors->has('street') ? ' has-feedback' : '' }}">
                            <label for="street" class="control-label">Street</label>
                            <input type="text" class="form-control" name="street" id="street"
                                   placeholder="Max. 100 long" value="{{ $customer->street }}">
                            @if ($errors->has('street'))
                                @foreach($errors->get('street') as $error)
                                    <span class="help-block">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>

                        <!-- company street number -->
                        <div id="streetNumDiv" class="form-group col-xs-6 {{ $errors->has('streetNum') ? ' has-error' : '' }}{{ $errors->has('streetNum') ? ' has-feedback' : '' }}">
                            <label for="streetNum" class="control-label">Number</label>
                            <input type="text" class="form-control" name="streetNum" id="streetNum"
                                   placeholder="Max. 11 long" value="{{ $customer->streetNum }}">
                            @if ($errors->has('streetNum'))
                                @foreach($errors->get('streetNum') as $error)
                                    <span class="help-block">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- /row 2 -->

                    <!-- row 3 -->
                    <div class="row">
                        <!-- company zip code -->
                        <div id="zipDiv" class="form-group col-xs-6 {{ $errors->has('zip') ? ' has-error' : '' }}{{ $errors->has('zip') ? ' has-feedback' : '' }}">
                            <label for="zip" class="control-label">Zip code</label>
                            <input type="text" class="form-control" name="zip" id="zip"
                                   placeholder="Max. 10 long" value="{{ $customer->zip }}">
                            @if ($errors->has('zip'))
                                @foreach($errors->get('zip') as $error)
                                    <span class="help-block">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>

                        <!-- company city -->
                        <div id="cityDiv" class="form-group col-xs-6 {{ $errors->has('city') ? ' has-error' : '' }}{{ $errors->has('city') ? ' has-feedback' : '' }}">
                            <label for="city" class="control-label">City</label>
                            <input type="text" class="form-control" name="city" id="city"
                                   placeholder="Max. 100 long" value="{{ $customer->city }}">
                            @if ($errors->has('city'))
                                @foreach($errors->get('city') as $error)
                                    <span class="help-block">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- /row 3 -->

                    <!-- row 4 -->
                    <div class="row">
                        <!-- company country -->
                        <div id="countryDiv" class="form-group col-xs-6 {{ $errors->has('country') ? ' has-error' : '' }}{{ $errors->has('country') ? ' has-feedback' : '' }}">
                            <label for="country" class="control-label">Country</label>
                            <input type="text" class="form-control" name="country" id="country"
                                   placeholder="Max. 100 long" value="{{ $customer->country }}">
                            @if ($errors->has('country'))
                                @foreach($errors->get('country') as $error)
                                    <span class="help-block">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- /row 4 -->
                    <br/>
                    <!-- row 5 -->
                    <div class="row">
                        <!-- company kvk -->
                        <div id="kvkDiv" class="form-group col-xs-6 {{ $errors->has('kvk') ? ' has-error' : '' }}{{ $errors->has('kvk') ? ' has-feedback' : '' }}">
                            <label for="kvk" class="control-label">KVK</label>
                            <input type="number" class="form-control" name="kvk" id="kvk"
                                   placeholder="Must be 8 long, unique" value="{{ $customer->kvk }}">
                            @if ($errors->has('kvk'))
                                @foreach($errors->get('kvk') as $error)
                                    <span class="help-block">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>

                        <!-- company btw -->
                        <div id="btwDiv" class="form-group col-xs-6 {{ $errors->has('btw') ? ' has-error' : '' }}{{ $errors->has('btw') ? ' has-feedback' : '' }}">
                            <label for="btw" class="control-label">BTW</label>
                            <input type="text" class="form-control" name="btw" id="btw"
                                   placeholder="Max. 25 long, unique" value="{{ $customer->btw }}">
                            @if ($errors->has('btw'))
                                @foreach($errors->get('btw') as $error)
                                    <span class="help-block">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- /row 5 -->
                    <!-- row 6 -->
                    <div class="row">
                        <div class="col-xs-6 form-group {{ $errors->has('pic') ? ' has-error' : '' }}{{ $errors->has('pic') ? ' has-feedback' : '' }}">
                            <label class="control-label" for="pic">Profile picture</label>
                            <input type="file" name="pic" id="pic">

                            @if ($errors->has('pic'))
                                <i class="form-control-feedback m-r-xs">
                                            <span class="fa fa-exclamation-triangle"
                                                  aria-hidden="true">
                                            </span>
                                </i>
                                <span class="sr-only">(error)</span>
                                <span class="help-block">
                                            <strong>{{ $errors->first('pic') }}</strong>
                                        </span>
                            @endif
                        </div>
                    </div>
                    <!-- /row 6 -->
                    <hr/>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.js"
            integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
            crossorigin="anonymous">
    </script>
    <script>
        @if ($errors->has('name'))
            $("#nameDiv").addClass("has-error");
        @endif
        @if ($errors->has('email'))
            $("#emailDiv").addClass("has-error");
        @endif
        @if ($errors->has('phone'))
            $("#phoneDiv").addClass("has-error");
        @endif
        @if ($errors->has('ending_on'))
            $("#ending_onDiv").addClass("has-error");
        @endif

        @if ($errors->has('street'))
            $("#streetDiv").addClass("has-error");
        @endif
        @if ($errors->has('streetNum'))
            $("#streetNumDiv").addClass("has-error");
        @endif
        @if ($errors->has('zip'))
            $("#zipDiv").addClass("has-error");
        @endif
        @if ($errors->has('city'))
            $("#cityDiv").addClass("has-error");
        @endif
        @if ($errors->has('country'))
            $("#countryDiv").addClass("has-error");
        @endif

        @if ($errors->has('kvk'))
            $("#kvkDiv").addClass("has-error");
        @endif
        @if ($errors->has('btw'))
            $("#btwDiv").addClass("has-error");
        @endif
    </script>
@endsection
