@extends('welcome')

@section('content')
    <script>
        function goBack()
        {
            window.history.back();
        }
    </script>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Profile</h1></div>
                <div class="panel-body">
                    <h3>Here you can change your profile settings.</h3>
                    <hr>
                    <form role="form" action="/profile/{{ Auth::user()->id }}/update" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <!-- row 1 -->
                        <div class="row">
                            <!-- company name -->
                            <div id="nameDiv" class="form-group col-xs-6">
                                <label for="name" class="control-label">Company Name</label>
                                <input type="text" class="form-control" name="companyName" id="companyName"
                                       value="{{ Auth::user()->companyName }}">
                                @if ($errors->has('companyName'))
                                    @foreach($errors->get('companyName') as $error)
                                        <span class="help-block">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>

                            <!-- company mail -->
                            <div id="emailDiv" class="form-group col-xs-6">
                                <label for="email" class="control-label">Mail Address</label>
                                <input type="text" class="form-control" name="email" id="email"
                                       value="{{ Auth::user()->email }}">
                                @if ($errors->has('email'))
                                    @foreach($errors->get('email') as $error)
                                        <span class="help-block">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div id="firstNameDiv" class="form-group col-xs-6">
                                <label for="firstName" class="control-label">First Name</label>
                                <input type="text" class="form-control" name="firstName" id="firstName"
                                 value="{{ Auth::user()->firstName }}">
                                @if ($errors->has('firstName'))
                                    @foreach($errors->get('firstName') as $error)
                                        <span class="help-block">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>

                                <div id="lastNameDiv" class="form-group col-xs-6">
                                    <label for="lastName" class="control-label">First Name</label>
                                    <input type="text" class="form-control" name="lastName" id="lastName"
                                           value="{{ Auth::user()->lastName }}">
                                    @if ($errors->has('lastName'))
                                        @foreach($errors->get('lastName') as $error)
                                            <span class="help-block">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        <!-- row 1.2 -->
                        <div class="row">
                            <!-- company phone number -->
                            <div id="phoneDiv" class="form-group col-xs-6">
                                <label for="phone" class="control-label">Phone Number</label>
                                <input type="text" class="form-control" name="phone" id="phone"
                                       value="{{ Auth::user()->phone }}">
                                @if ($errors->has('phone'))
                                    @foreach($errors->get('phone') as $error)
                                        <span class="help-block">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>

                        </div>
                        <!-- /row 1.2 -->
                        <hr>
                        <!-- row 2 -->
                        <div class="row">
                            <!-- company street -->
                            <div class="form-group col-xs-6" id="streetDiv">
                                <label for="street" class="control-label">Street</label>
                                <input type="text" class="form-control" name="street" id="street"
                                       value="{{ Auth::user()->streetName }}">
                                @if ($errors->has('street'))
                                    @foreach($errors->get('street') as $error)
                                        <span class="help-block">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>

                            <!-- company street number -->
                            <div class="form-group col-xs-6" id="houseNumberDiv">
                                <label for="houseNumber" class="control-label">House Number</label>
                                <input type="text" class="form-control" name="houseNumber" id="houseNumber"
                                       value="{{ Auth::user()->houseNumber }}">
                                @if ($errors->has('houseNumber'))
                                    @foreach($errors->get('houseNumber') as $error)
                                        <span class="help-block">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- /row 2 -->

                        <!-- row 3 -->
                        <div class="row">
                            <!-- company zip code -->
                            <div class="form-group col-xs-6" id="zipDiv">
                                <label for="zipCode" class="control-label">Zip Code</label>
                                <input type="text" class="form-control" name="zipCode" id="zipCode"
                                       value="{{ Auth::user()->zipCode }}">
                                @if ($errors->has('zipCode'))
                                    @foreach($errors->get('zipCode') as $error)
                                        <span class="help-block">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>

                            <!-- company city -->
                            <div class="form-group col-xs-6" id="cityDiv">
                                <label for="city" class="control-label">City</label>
                                <input type="text" class="form-control" name="city" id="city"
                                       value="{{ Auth::user()->city }}">
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
                            <div class="form-group col-xs-6" id="countryDiv">
                                <label for="country" class="control-label">Country</label>
                                <input type="text" class="form-control" name="country" id="country"
                                       value="{{ Auth::user()->country }}">
                                @if ($errors->has('country'))
                                    @foreach($errors->get('country') as $error)
                                        <span class="help-block">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- /row 4 -->
                        <hr>
                        <!-- row 5 -->
                        <div class="row">
                            <!-- company kvk -->
                            <div class="form-group col-xs-6" id="kvkDiv">
                                <label for="country" class="control-label">KVK</label>
                                <input type="text" class="form-control" name="kvk" id="kvk"
                                       value="{{ Auth::user()->kvk }}">
                                @if ($errors->has('kvk'))
                                    @foreach($errors->get('kvk') as $error)
                                        <span class="help-block">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>

                            <!-- company btw -->
                            <div class="form-group col-xs-6" id="btwDiv">
                                <label for="country" class="control-label">BTW</label>
                                <input type="text" class="form-control" name="btw" id="btw"
                                       value="{{ Auth::user()->btw }}">
                                @if ($errors->has('btw'))
                                    @foreach($errors->get('btw') as $error)
                                        <span class="help-block">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <hr>
                        <!-- /row 5 -->
                        <div class="row pull-left">
                            <button type="submit" class="btn btn-primary col-xs-offset-2">Change Profile</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
@endsection