
<!DOCTYPE html>
<!-- saved from url=(0053)https://demo.themeregion.com/jobs-updated/signin.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Theme Region">
    <meta name="description" content="">

    <title>kh-Works | The Easiest Way to Get Your New Job</title>

    @include('frontend.Kh-Works.partials.ui-styles')
</head>
<body>
<!-- header -->
@include('frontend.Kh-Works.partials.nav-ui')

<!-- signin-page -->
<section class="clearfix job-bg user-page">
    <div class="container">
        <div class="row text-center">
            <!-- user-login -->
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <div class="user-account job-user-account">
                {{--<div class="user-account">--}}
                    <h2> Login </h2>
                    <ul class="nav nav-tabs text-center" role="tablist">
                        <li role="presentation" class="active" ><a href="#seeker_log" aria-controls="find-job" role="tab" data-toggle="tab">Seeker</a></li>
                        <li role="presentation" ><a href="#company_log" aria-controls="post-job" role="tab" data-toggle="tab">Company</a></li>
                    </ul>
                    @if (session('global'))
                        <div class="alert alert-danger alert-dismissable custom-success-box" style="margin: 15px;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong> {{ session('global') }} </strong>
                        </div>
                    @endif
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="seeker_log">
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            {{--{{dd($errors->has('email'))}}--}}
                            <input placeholder="seeker email OR mobile number" id="email" type="email" class="form-control" name="email"
                                   value="{{ old('email') }}"  autofocus>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input placeholder="password" id="password" type="password" class="form-control"
                                   name="password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <button style="cursor: pointer" type="submit" href="#" class="btn">Login</button>
                        <div class="">
                            <div class="checkbox">
                                <label class="pull-left" for="signing-2">
                                    <input type="checkbox" name="remember-2" id="signing-2">
                                    Remember Me
                                </label>
                            </div><!-- checkbox -->
                            <div class="pull-right forgot-password">
                                <a href="{{ route('password.request') }}"> {{ __('Forgot Your Password?') }}</a>
                            </div>
                        </div><!-- forgot-password -->
                     </form><!-- form -->
                        </div>
                        <div role="tabpanel" class="tab-pane" id="company_log">
                        <form method="POST" action="{{route('admin.login.submit')}}">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                {{--{{dd($errors->has('email'))}}--}}
                                <input placeholder="company email" id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}"  autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input placeholder="password" id="password" type="password" class="form-control"
                                       name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button style="cursor: pointer" type="submit" href="#" class="btn">Login</button>

                            <div class="">
                                {{--<div class="checkbox pull-left form-check">--}}
                                    {{--<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}
                                    {{--<label class="form-check-label" for="remember">--}}
                                        {{--{{ __('Remember Me') }}--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                                <div class="checkbox">
                                    <label class="pull-left" for="signing-2">
                                        <input type="checkbox" name="remember-2" id="signing-2">
                                        Remember Me
                                    </label>
                                </div><!-- checkbox -->
                                <div class="pull-right forgot-password">
                                    <a href="{{ route('password.request') }}"> {{ __('Forgot Your Password?') }}</a>
                                </div>
                            </div><!-- forgot-password -->
                        </form><!-- form -->
                    </div>
                    </div>
                </div>
                <!-- forgot-password -->

                <a href="{{route('register')}}" class="btn-primary">Create a New Account</a>
            </div><!-- user-login -->
        </div><!-- row -->
    </div><!-- container -->
</section><!-- signin-page -->

@include('frontend.Kh-Works.partials.ui-footer')

<!--/Preset Style Chooser-->
<!--/End:Preset Style Chooser-->
<!-- JS -->
@include('frontend.Kh-Works.partials.ui-script')

</body></html>
