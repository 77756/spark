@extends('welcome')

@section('content')
    <div class="row">
        <!-- tabs nav -->
        <div class="col-sm-3 col-lg-2">
            <div class="p-y">
                <div class="nav-active-border box left b-primary  ">
                    <ul class="nav nav-sm">
                        <li class="nav nav-item">
                            <a class="nav-link block {{ empty($tabName) || $tabName == 'tab-1' ? 'active' : '' }}"
                               href="#tab-1" data-toggle="tab" data-target="#tab-1">
                                Profile
                            </a>
                        </li>
                        <li class="nav nav-item">
                            <a class="nav-link block {{ !empty($tabName) && $tabName == 'tab-2' ? 'active' : '' }}"
                               href="#tab-2"
                               data-toggle="tab" data-target="#tab-2">
                                Contact settings
                            </a>
                        </li>
                        <li class="nav nav-item">
                            <a class="nav-link block {{ !empty($tabName) && $tabName == 'tab-3' ? 'active' : '' }}"
                               href="#tab-3"
                               data-toggle="tab" data-target="#tab-3">
                                Security
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="col-lg-9 m-t-1">
            <div class="box tab-content">
                <!-- profile tab -->
                <div class="tab-pane {{ empty($tabName) || $tabName == 'tab-1' ? 'active' : '' }}" id="tab-1">
                    <div class="box-header"><h2>Profile</h2></div>
                    <div class="box-body">
                        <form role="form" method="post" action="/settings/profile/update">
                            {{ method_field('patch') }}
                            {{ csrf_field() }}
                            <input type="hidden" id="tabName" name="tabName" value="tab-1">

                            <div class="row">
                                <div class="col-xs-6 form-group {{ $errors->has('companyName') ? ' has-error' : '' }}{{ $errors->has('companyName') ? ' has-feedback' : '' }}">
                                    <label class="control-label" for="companyName">Company name</label>
                                    <input type="text" class="form-control" value="{{$user->companyName}}"
                                           name="companyName" id="companyName" placeholder="Required, max. 100 char."
                                           required
                                           autofocus>

                                    @if ($errors->has('companyName'))
                                        <i class="form-control-feedback m-r-xs">
                                            <span class="fa fa-exclamation-triangle"
                                                  aria-hidden="true">
                                            </span>
                                        </i>
                                        <span class="sr-only">(error)</span>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('companyName') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-xs-5 form-group {{ $errors->has('type') ? ' has-error' : '' }}{{ $errors->has('type') ? ' has-feedback' : '' }}">
                                    <label class="control-label" for="type">User type</label>
                                    <select onchange="typeSelect(this);" class="form-control" name="type" id="type">
                                        <option value="">
                                            -- Choose user type --
                                        </option>
                                        <option value="Guest" {{ $user->type == 'Guest' ? 'selected' : '' }}>
                                            Guest
                                        </option>
                                        <option value="Company" {{ $user->type == 'Company' ? 'selected' : '' }}>
                                            Company
                                        </option>
                                        <option value="Contact person" {{ $user->type == 'Contact person' ? 'selected' : '' }}>
                                            Contact person
                                        </option>
                                        <option value="Admin" {{ $user->type == 'Admin' ? 'selected' : '' }}>
                                            Admin
                                        </option>
                                    </select>

                                    @if ($errors->has('type'))
                                        <i class="form-control-feedback m-r-xs">
                                            <span class="fa fa-exclamation-triangle"
                                                  aria-hidden="true">
                                            </span>
                                        </i>
                                        <span class="sr-only">(error)</span>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 form-group {{ $errors->has('firstName') ? ' has-error' : '' }}{{ $errors->has('firstName') ? ' has-feedback' : '' }}">
                                    <label class="control-label" for="firstName">First name</label>
                                    <input type="text" class="form-control" value="{{$user->firstName}}"
                                           name="firstName" id="firstName" placeholder="Required, max. 50 char."
                                           required>

                                    @if ($errors->has('firstName'))
                                        <i class="form-control-feedback m-r-xs">
                                            <span class="fa fa-exclamation-triangle"
                                                  aria-hidden="true">
                                            </span>
                                        </i>
                                        <span class="sr-only">(error)</span>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('firstName') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-xs-5 form-group {{ $errors->has('lastName') ? ' has-error' : '' }}{{ $errors->has('lastName') ? ' has-feedback' : '' }}">
                                    <label class="control-label" for="lastName">Last name</label>
                                    <input type="text" class="form-control" value="{{$user->lastName}}"
                                           name="lastName" id="lastName" placeholder="Required, max. 50 char." required>

                                    @if ($errors->has('lastName'))
                                        <i class="form-control-feedback m-r-xs">
                                            <span class="fa fa-exclamation-triangle"
                                                  aria-hidden="true">
                                            </span>
                                        </i>
                                        <span class="sr-only">(error)</span>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('lastName') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 form-group {{ $errors->has('email') ? ' has-error' : '' }}{{ $errors->has('email') ? ' has-feedback' : '' }}">
                                    <label class="control-label" for="email">E-mail address</label>
                                    <input type="email" class="form-control" value="{{$user->email}}"
                                           name="email" id="email" placeholder="Required, must be valid e-mail address."
                                           required>

                                    @if ($errors->has('email'))
                                        <i class="form-control-feedback m-r-xs">
                                            <span class="fa fa-exclamation-triangle"
                                                  aria-hidden="true">
                                            </span>
                                        </i>
                                        <span class="sr-only">(error)</span>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <hr/>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
                <!-- contact settings tab -->
                <div class="tab-pane {{ !empty($tabName) && $tabName == 'tab-2' ? 'active' : '' }}" id="tab-2">
                    <div class="box-header"><h2>Contact settings</h2></div>
                    <div class="box-body">
                        <form role="form" method="post" action="/settings/contact/update">
                            {{ method_field('patch') }}
                            {{ csrf_field() }}
                            <input type="hidden" id="tabName" name="tabName" value="tab-2">

                            <div class="row">
                                <div class="col-xs-6 form-group {{ $errors->has('streetName') ? ' has-error' : '' }}{{ $errors->has('streetName') ? ' has-feedback' : '' }}">
                                    <label class="control-label" for="streetName">Street name</label>
                                    <input type="text" class="form-control" value="{{$user->streetName}}"
                                           name="streetName" id="streetName" placeholder="Max. 100 char." autofocus>

                                    @if ($errors->has('streetName'))
                                        <i class="form-control-feedback m-r-xs">
                                            <span class="fa fa-exclamation-triangle"
                                                  aria-hidden="true">
                                            </span>
                                        </i>
                                        <span class="sr-only">(error)</span>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('streetName') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-xs-3 form-group {{ $errors->has('houseNumber') ? ' has-error' : '' }}{{ $errors->has('houseNumber') ? ' has-feedback' : '' }}">
                                    <label class="control-label" for="houseNumber">House number</label>
                                    <input type="number" class="form-control" value="{{$user->houseNumber}}"
                                           name="houseNumber" id="houseNumber" placeholder="Max. 11 char.">

                                    @if ($errors->has('houseNumber'))
                                        <i class="form-control-feedback m-r-xs">
                                            <span class="fa fa-exclamation-triangle"
                                                  aria-hidden="true">
                                            </span>
                                        </i>
                                        <span class="sr-only">(error)</span>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('houseNumber') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-xs-3 form-group {{ $errors->has('zipCode') ? ' has-error' : '' }}{{ $errors->has('zipCode') ? ' has-feedback' : '' }}">
                                    <label class="control-label" for="zipCode">Zip code</label>
                                    <input type="text" class="form-control" value="{{$user->zipCode}}"
                                           name="zipCode" id="zipCode" placeholder="Max. 10. char.">

                                    @if ($errors->has('zipCode'))
                                        <i class="form-control-feedback m-r-xs">
                                            <span class="fa fa-exclamation-triangle"
                                                  aria-hidden="true">
                                            </span>
                                        </i>
                                        <span class="sr-only">(error)</span>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('zipCode') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6 form-group {{ $errors->has('city') ? ' has-error' : '' }}{{ $errors->has('city') ? ' has-feedback' : '' }}">
                                    <label class="control-label" for="city">City</label>
                                    <input type="text" class="form-control" value="{{$user->city}}"
                                           name="city" id="city" placeholder="Max. 100 char.">

                                    @if ($errors->has('city'))
                                        <i class="form-control-feedback m-r-xs">
                                            <span class="fa fa-exclamation-triangle"
                                                  aria-hidden="true">
                                            </span>
                                        </i>
                                        <span class="sr-only">(error)</span>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-xs-6 form-group {{ $errors->has('country') ? ' has-error' : '' }}{{ $errors->has('country') ? ' has-feedback' : '' }}">
                                    <label class="control-label" for="country">Country</label>
                                    <input type="text" class="form-control" value="{{$user->country}}"
                                           name="country" id="country" placeholder="Max. 100 char.">

                                    @if ($errors->has('country'))
                                        <i class="form-control-feedback m-r-xs">
                                            <span class="fa fa-exclamation-triangle"
                                                  aria-hidden="true">
                                            </span>
                                        </i>
                                        <span class="sr-only">(error)</span>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('country') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6 form-group {{ $errors->has('phone') ? ' has-error' : '' }}{{ $errors->has('phone') ? ' has-feedback' : '' }}">
                                    <label class="control-label" for="phone">Phone number</label>
                                    <input type="tel" class="form-control" value="{{$user->phone}}"
                                           name="phone" id="phone" placeholder="Max. 15 char.">

                                    @if ($errors->has('phone'))
                                        <i class="form-control-feedback m-r-xs">
                                            <span class="fa fa-exclamation-triangle"
                                                  aria-hidden="true">
                                            </span>
                                        </i>
                                        <span class="sr-only">(error)</span>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-xs-6 form-group {{ $errors->has('mobile') ? ' has-error' : '' }}{{ $errors->has('mobile') ? ' has-feedback' : '' }}">
                                    <label class="control-label" for="mobile">Mobile number</label>
                                    <input type="tel" class="form-control" value="{{$user->mobile}}"
                                           name="mobile" id="mobile" placeholder="Max. 15 char.">

                                    @if ($errors->has('mobile'))
                                        <i class="form-control-feedback m-r-xs">
                                            <span class="fa fa-exclamation-triangle"
                                                  aria-hidden="true">
                                            </span>
                                        </i>
                                        <span class="sr-only">(error)</span>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('mobile') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                @if($user->type == "Company")
                                    <div id="companyRow">
                                        <div class="col-xs-3 form-group {{ $errors->has('kvk') ? ' has-error' : '' }}{{ $errors->has('kvk') ? ' has-feedback' : '' }}">
                                            <label class="control-label" for="kvk">KVK number</label>
                                            <input type="number" class="form-control" value="{{$user->kvk}}"
                                                   name="kvk" id="kvk" placeholder="Max. 11 char." required>

                                            @if ($errors->has('kvk'))
                                                <i class="form-control-feedback m-r-xs">
                                            <span class="fa fa-exclamation-triangle"
                                                  aria-hidden="true">
                                            </span>
                                                </i>
                                                <span class="sr-only">(error)</span>
                                                <span class="help-block">
                                            <strong>{{ $errors->first('kvk') }}</strong>
                                        </span>
                                            @endif
                                        </div>

                                        <div class="col-xs-3 form-group {{ $errors->has('btw') ? ' has-error' : '' }}{{ $errors->has('btw') ? ' has-feedback' : '' }}">
                                            <label class="control-label" for="btw">BTW number</label>
                                            <input type="text" class="form-control" value="{{$user->btw}}"
                                                   name="btw" id="btw" placeholder="Max. 15 char." required>

                                            @if ($errors->has('btw'))
                                                <i class="form-control-feedback m-r-xs">
                                            <span class="fa fa-exclamation-triangle"
                                                  aria-hidden="true">
                                            </span>
                                                </i>
                                                <span class="sr-only">(error)</span>
                                                <span class="help-block">
                                            <strong>{{ $errors->first('btw') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                                @if($user->type == "Company" || $user->type == "Contact person")
                                    <div id="ending_onDiv">
                                        <div class="col-xs-6 form-group {{ $errors->has('ending_on') ? ' has-error' : '' }}{{ $errors->has('ending_on') ? ' has-feedback' : '' }}">
                                            <label class="control-label" for="ending_on">End date</label>
                                            <input type="date" class="form-control" value="{{$user->ending_on}}"
                                                   name="ending_on" id="ending_on" required>

                                            @if ($errors->has('ending_on'))
                                                <i class="form-control-feedback m-r-xs">
                                            <span class="fa fa-exclamation-triangle"
                                                  aria-hidden="true">
                                            </span>
                                                </i>
                                                <span class="sr-only">(error)</span>
                                                <span class="help-block">
                                            <strong>{{ $errors->first('ending_on') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <hr/>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
                <div class="tab-pane {{ !empty($tabName) && $tabName == 'tab-3' ? 'active' : '' }}" id="tab-3">
                    <div class="box-header"><h2>Security</h2></div>
                    <div class="box-body">
                        <form role="form" method="post" action="/settings/security/update">
                            {{ method_field('patch') }}
                            {{ csrf_field() }}
                            <input type="hidden" id="tabName" name="tabName" value="tab-3">

                            <div class="row">
                                <div class="col-xs-6 form-group {{ !empty ($errorpass) ? ' has-error' : '' }}{{ !empty ($errorpass) ? ' has-feedback' : '' }}">
                                    <label class="control-label" for="currentpass">Current password</label>
                                    <input type="text" class="form-control" name="currentpass"
                                           id="currentpass" placeholder="Required" required autofocus>

                                    @if (!empty ($errorpass))
                                        <i class="form-control-feedback m-r-xs">
                                            <span class="fa fa-exclamation-triangle"
                                                  aria-hidden="true">
                                            </span>
                                        </i>
                                        <span class="sr-only">(error)</span>
                                        <span class="help-block">
                                            <strong>{{ $errorpass }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6 form-group {{ $errors->has('password') ? ' has-error' : '' }}{{ $errors->has('password') ? ' has-feedback' : '' }}">
                                    <label class="control-label" for="password">New password</label>
                                    <input type="text" class="form-control" name="password"
                                           id="password" placeholder="Min. 5 char." required>

                                    @if ($errors->has('password'))
                                        <i class="form-control-feedback m-r-xs">
                                            <span class="fa fa-exclamation-triangle"
                                                  aria-hidden="true">
                                            </span>
                                        </i>
                                        <span class="sr-only">(error)</span>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6 form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}{{ $errors->has('password_confirmation') ? ' has-feedback' : '' }}">
                                    <label class="control-label" for="password_confirmation">Confirm password</label>
                                    <input type="text" class="form-control" name="password_confirmation"
                                           id="password_confirmation" placeholder="Retype new password" required>

                                    @if ($errors->has('password_confirmation'))
                                        <i class="form-control-feedback m-r-xs">
                                            <span class="fa fa-exclamation-triangle"
                                                  aria-hidden="true">
                                            </span>
                                        </i>
                                        <span class="sr-only">(error)</span>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <hr/>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        <br/>
                        <br/>
                        <button id="deletebtn" class="btn btn-danger" data-toggle="confirmation"
                                data-btn-ok-label="Delete" data-btn-ok-icon="fa fa-fw fa-trash"
                                data-btn-ok-class="btn-danger" data-bt-cancel-label="Stop"
                                data-btn-cancel-icon="fa fa-fw fa-close" data-btn-cancel-class="btn-info"
                                data-title="Delete account" data-content="Are you sure?"
                                data-placement="bottom" data-popout="true">
                            Delete account
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        function typeSelect() {
            var typeSelectList = $('select#type');
            var selectedValue  = $('option:selected', typeSelectList).val();

            if (selectedValue == "Company" || selectedValue == "Contact person") {
                if (selectedValue == "Contact person") {
                    $('#kvk').val('');
                    $('#btw').val('');
                }
            } else {
                $('#ending_on').val('');
                $('#kvk').val('');
                $('#btw').val('');
            }
        }

        $(function () {
            $('select#type').change(typeSelect);
        });

        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm:    function () {
                window.location.href = '/settings/delete';
            }
        });

//        $('#deletebtn').confirmation({
//            rootSelector: '#deletebtn',
//            selector: '[data-toggle=confirmation]',
//            onConfirm:    function () {
//                window.location.href = '/settings/delete';
//            }
//        });
    });
</script>
@endpush
