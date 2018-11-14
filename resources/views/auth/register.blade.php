
<!DOCTYPE html>
<!-- saved from url=(0053)https://demo.themeregion.com/jobs-updated/signup.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Theme Region">
    <meta name="description" content="">

    <title>Jobs | Job Portal / Job Board HTML Template</title>

    <!-- CSS -->
    @include('frontend.Kh-Works.partials.ui-styles')
</head>
<body>
<!-- header -->
@include('frontend.Kh-Works.partials.nav-ui')

<section class="job-bg user-page">
    <div class="container">
        <div class="row text-center">
            <!-- user-login -->
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <div class="user-account job-user-account">
                    <h2>Create An Account</h2>
                    <ul class="nav nav-tabs text-center" role="tablist">
                        <li role="presentation" class="active" ><a href="#find-job" aria-controls="find-job" role="tab" data-toggle="tab">Find A Job</a></li>
                        <li role="presentation" ><a href="#post-job" aria-controls="post-job" role="tab" data-toggle="tab">Post A Job</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="find-job">
                            <form method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}
                                    <div class="form-group">
                                    <input placeholder="employee name" id="name" type="text" class="form-control{{ $errors->has('emp_name') ? ' is-invalid' : '' }}" name="emp_name" value="{{ old('emp_name') }}" required autofocus>
                                    @if ($errors->has('emp_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('emp_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input placeholder="Email Address" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input placeholder="password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input placeholder="confirm password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                                <div class="checkbox">
                                    <label class="pull-left" for="signing-2">
                                        <input type="checkbox" name="signing-2" id="signing-2">
                                        By signing up for an account you agree to our Terms and Conditions
                                    </label>
                                </div><!-- checkbox -->
                                <button style="cursor: pointer" type="submit" class="btn">Registration</button>
                    </form>
                    </div>
                        <div role="tabpanel" class="tab-pane" id="post-job">
                            <form method="POST" action="{{url('hr-register')}}">
                                {{ csrf_field() }}
                                <div class="form-group ">
                                   <input placeholder="company name" id="com_name" type="text" class="form-control{{ $errors->has('com_name') ? ' is-invalid' : '' }}" name="com_name" value="{{ old('com_name') }}" required autofocus>
                                    @if ($errors->has('com_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('com_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input placeholder="Email Address" id="com_email" type="email" class="form-control{{ $errors->has('com_email') ? ' is-invalid' : '' }}" name="com_email" value="{{ old('com_email') }}" required>
                                    @if ($errors->has('com_email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('com_email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input placeholder="password" id="com_password" type="password" class="form-control{{ $errors->has('com_password') ? ' is-invalid' : '' }}" name="com_password" required>
                                    @if ($errors->has('com_password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('com_password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                        <input placeholder="confirm password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                                <div class="checkbox">
                                    <label class="pull-left" for="signing-2">
                                        <input type="checkbox" name="signing-2" id="signing-2">
                                        By signing up for an account you agree to our Terms and Conditions
                                    </label>
                                </div><!-- checkbox -->
                                <button style="cursor: pointer" type="submit" class="btn">Registration</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </div>
</section>

<!-- footer -->
@include('frontend.Kh-Works.partials.ui-footer')

<!--/Preset Style Chooser-->
<div class="style-chooser">
    <div class="style-chooser-inner">
        <a href="https://demo.themeregion.com/jobs-updated/signup.html#" class="toggler"><i class="fa fa-cog fa-spin"></i></a>
        <h4>Presets</h4>
        <ul class="preset-list clearfix">
            <li class="preset1 active" data-preset="1"><a href="https://demo.themeregion.com/jobs-updated/signup.html#" data-color="preset1"></a></li>
            <li class="preset2" data-preset="2"><a href="https://demo.themeregion.com/jobs-updated/signup.html#" data-color="preset2"></a></li>
            <li class="preset3" data-preset="3"><a href="https://demo.themeregion.com/jobs-updated/signup.html#" data-color="preset3"></a></li>
            <li class="preset4" data-preset="4"><a href="https://demo.themeregion.com/jobs-updated/signup.html#" data-color="preset4"></a></li>
        </ul>
    </div>
</div>
<!--/End:Preset Style Chooser-->

<!-- JS -->
@include('frontend.Kh-Works.partials.ui-script')

</body>
</html>