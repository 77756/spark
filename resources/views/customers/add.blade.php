@extends('welcome')

@section('content')
    <!-- add company panel -->
    <div class="padding">
        <div class="box">
            <div class="box-header"><h2>Add customer</h2></div>
            <div class="box-body">
                <form role="form" class="form-horizontal" enctype="multipart/form-data" action="/customers/store"
                      method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <!-- company name -->
                    <div id="nameDiv"
                         class="col-sm-6 form-group {{ $errors->has('companyName') ? ' has-error' : '' }}{{ $errors->has('companyName') ? ' has-feedback' : '' }}">
                        <label for="companyName" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="companyName" id="companyName"
                                   placeholder="Max. 100 long, unique" value="{{ old('companyName') }}">
                        </div>

                        @if ($errors->has('companyName'))
                            <i class="form-control-feedback m-r-xs">
                                <span class="fa fa-exclamation-triangle" aria-hidden="true"></span>
                            </i>
                            <span class="sr-only">(error)</span>
                            <span class="help-block"><strong>{{ $errors->first('companyName') }}</strong></span>
                        @endif
                    </div>

                    <!-- company mail -->
                    <div id="emailDiv"
                         class="col-sm-6 form-group {{ $errors->has('email') ? ' has-error' : '' }}{{ $errors->has('email') ? ' has-feedback' : '' }}">
                        <label for="email" class="col-sm-2 control-label">E-mail address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" id="email"
                                   placeholder="Valid e-mail, unique" value="{{ old('email') }}">
                        </div>
                        @if ($errors->has('email'))
                            <i class="form-control-feedback m-r-xs">
                                <span class="fa fa-exclamation-triangle" aria-hidden="true"></span>
                            </i>
                            <span class="sr-only">(error)</span>
                            <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                        @endif
                    </div>


                    <!-- company phone number -->
                    <div id="phoneDiv"
                         class="col-sm-6 form-group {{ $errors->has('phone') ? ' has-error' : '' }}{{ $errors->has('phone') ? ' has-feedback' : '' }}">
                        <label for="phone" class="col-sm-2 control-label">Phone number</label>
                        <div class="col-sm-10">
                            <input type="tel" class="form-control" name="phone" id="phone"
                                   placeholder="Max. 20 long" value="{{ old('phone') }}">
                        </div>

                        @if ($errors->has('phone'))
                            <i class="form-control-feedback m-r-xs">
                                <span class="fa fa-exclamation-triangle" aria-hidden="true"></span>
                            </i>
                            <span class="sr-only">(error)</span>
                            <span class="help-block"><strong>{{ $errors->first('phone') }}</strong></span>
                        @endif
                    </div>

                    <!-- end date -->
                    <div id="ending_onDiv"
                         class="col-sm-6 form-group {{ $errors->has('ending_on') ? ' has-error' : '' }}{{ $errors->has('ending_on') ? ' has-feedback' : '' }}">
                        <label for="ending_on" class="col-sm-2 control-label">End date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="ending_on" id="ending_on"
                                   value="{{ old('ending_on') }}">
                        </div>

                        @if ($errors->has('ending_on'))
                            <i class="form-control-feedback m-r-xs">
                                <span class="fa fa-exclamation-triangle" aria-hidden="true"></span>
                            </i>
                            <span class="sr-only">(error)</span>
                            <span class="help-block"><strong>{{ $errors->first('ending_on') }}</strong></span>
                        @endif
                    </div>


                    <!-- company street -->
                    <div id="streetDiv"
                         class="col-sm-6 form-group {{ $errors->has('street') ? ' has-error' : '' }}{{ $errors->has('street') ? ' has-feedback' : '' }}">
                        <label for="street" class="col-sm-2 control-label">Street</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="street" id="street"
                                   placeholder="Max. 100 long" value="{{ old('street') }}">
                        </div>

                        @if ($errors->has('street'))
                            <i class="form-control-feedback m-r-xs">
                                <span class="fa fa-exclamation-triangle" aria-hidden="true"></span>
                            </i>
                            <span class="sr-only">(error)</span>
                            <span class="help-block"><strong>{{ $errors->first('street') }}</strong></span>
                        @endif
                    </div>

                    <!-- company street number -->
                    <div id="streetNumDiv"
                         class="col-sm-6 form-group {{ $errors->has('streetNum') ? ' has-error' : '' }}{{ $errors->has('streetNum') ? ' has-feedback' : '' }}">
                        <label for="streetNum" class="col-sm-2 control-label">Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="streetNum" id="streetNum"
                                   placeholder="Max. 11 long" value="{{ old('streetNum') }}">
                        </div>

                        @if ($errors->has('streetNum'))
                            <i class="form-control-feedback m-r-xs">
                                <span class="fa fa-exclamation-triangle" aria-hidden="true"></span>
                            </i>
                            <span class="sr-only">(error)</span>
                            <span class="help-block"><strong>{{ $errors->first('streetNum') }}</strong></span>
                        @endif
                    </div>


                    <!-- company zip code -->
                    <div id="zipDiv"
                         class="col-sm-6 form-group {{ $errors->has('zip') ? ' has-error' : '' }}{{ $errors->has('zip') ? ' has-feedback' : '' }}">
                        <label for="zip" class="col-sm-2 control-label">Zip code</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="zip" id="zip"
                                   placeholder="Max. 10 long" value="{{ old('zip') }}">
                        </div>

                        @if ($errors->has('zip'))
                            <i class="form-control-feedback m-r-xs">
                                <span class="fa fa-exclamation-triangle" aria-hidden="true"></span>
                            </i>
                            <span class="sr-only">(error)</span>
                            <span class="help-block"><strong>{{ $errors->first('zip') }}</strong></span>
                        @endif
                    </div>

                    <!-- company city -->
                    <div id="cityDiv"
                         class="col-sm-6 form-group {{ $errors->has('city') ? ' has-error' : '' }}{{ $errors->has('city') ? ' has-feedback' : '' }}">
                        <label for="city" class="col-sm-2 control-label">City</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="city" id="city"
                                   placeholder="Max. 100 long" value="{{ old('city') }}">
                        </div>

                        @if ($errors->has('city'))
                            @foreach($errors->get('city') as $error)
                                <span class="help-block"><strong>{{ $error }}</strong></span>
                            @endforeach
                        @endif
                    </div>

                    <!-- company country -->
                    <div id="countryDiv"
                         class="m-l-1 col-sm-6 col-sm-pull-6 form-group {{ $errors->has('country') ? ' has-error' : '' }}{{ $errors->has('country') ? ' has-feedback' : '' }}">
                        <label for="country" class="col-sm-2 control-label">Country</label>
                        .3+
-                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="country" id="country"
                                   placeholder="Max. 100 long" value="{{ old('country') }}">
                        </div>

                        @if ($errors->has('countryDiv'))
                            <i class="form-control-feedback m-r-xs">
                                <span class="fa fa-exclamation-triangle" aria-hidden="true"></span>
                            </i>
                            <span class="sr-only">(error)</span>
                            <span class="help-block"><strong>{{ $errors->first('countryDiv') }}</strong></span>
                        @endif
                    </div>


                    <!-- company kvk -->
                    <div id="kvkDiv"
                         class="col-sm-6 form-group {{ $errors->has('kvk') ? ' has-error' : '' }}{{ $errors->has('kvk') ? ' has-feedback' : '' }}">
                        <label for="kvk" class="col-sm-2 control-label">KVK Nr.</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="kvk" id="kvk"
                                   placeholder="Must be 8 long, unique" value="{{ old('kvk') }}">
                        </div>

                        @if ($errors->has('kvk'))
                            <i class="form-control-feedback m-r-xs">
                                <span class="fa fa-exclamation-triangle" aria-hidden="true"></span>
                            </i>
                            <span class="sr-only">(error)</span>
                            <span class="help-block"><strong>{{ $errors->first('kvk') }}</strong></span>
                        @endif
                    </div>

                    <!-- company btw -->
                    <div id="btwDiv"
                         class="col-sm-6 form-group {{ $errors->has('btw') ? ' has-error' : '' }}{{ $errors->has('btw') ? ' has-feedback' : '' }}">
                        <label for="btw" class="col-sm-2 control-label">BTW Nr.</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="btw" id="btw"
                                   placeholder="Max. 25 long, unique" value="{{ old('btw') }}">
                        </div>

                        @if ($errors->has('btw'))
                            <i class="form-control-feedback m-r-xs">
                                <span class="fa fa-exclamation-triangle" aria-hidden="true"></span>
                            </i>
                            <span class="sr-only">(error)</span>
                            <span class="help-block"><strong>{{ $errors->first('btw') }}</strong></span>
                        @endif
                    </div>


                    <div id="picDiv"
                         class="form-group {{ $errors->has('pic') ? ' has-error' : '' }}{{ $errors->has('pic') ? ' has-feedback' : '' }}">
                        <label class="col-sm-2 control-label" for="pic">Profile picture</label>
                        <div class="col-sm-10">
                            <input type="file" name="pic" id="pic">
                        </div>


                        @if ($errors->has('pic'))
                            <i class="form-control-feedback m-r-xs">
                                <span class="fa fa-exclamation-triangle" aria-hidden="true"></span>
                            </i>
                            <span class="sr-only">(error)</span>
                            <span class="help-block">
                                    <strong>{{ $errors->first('pic') }}</strong>
                                </span>
                        @endif
                    </div>

                    <!-- /row 6 -->
                    <hr/>
                    <button type="submit" class="btn btn-primary">Add customer</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /company panel -->
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

