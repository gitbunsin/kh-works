<header id="header" class="clearfix">
    <!-- navbar -->
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/kh-works')}}"><img class="img-responsive" src="/img/logo-job.png" alt="Logo"></a>
            </div>
            <!-- /navbar-header -->

            <div class="navbar-left">
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="{{url('/kh-works')}}">Home</a>
                        </li>
                        <li class="{{ Request::segment(2) == "post-resume" ? "active" : " " }}">
                            <a href="{{url('/kh-works/post-resume')}}">Resume</a>
                        </li>
                        <li class="{{ Request::segment(2) == "policy" ? "active" : " " }}">
                            <a href="{{url('kh-works/policy')}}">About Us</a>
                        </li>
                        <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Pages<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="">Contact Us</a></li>
                                <li class="{{ Request::segment(3) == "resume" ? "active" : " " }}">
                                    <a href="{{url('/kh-works/resume')}}"> Post Resume</a>
                                </li>
                                {{--<li class="{{ Request::segment(2) == "lists" ? "active" : " " }}">--}}
                                    {{--<a href="{{url('/kh-works/lists')}}">Job list</a>--}}
                                {{--</li>--}}
                            </ul>
                        </li>
                    </ul>
                </div>
                {{--asdfasdfs--}}
            </div><!-- navbar-left -->
            <div>
                <span style="position:absolute !important;z-index:1 !important;margin-bottom:30px;">@include('flash::message')</span>
            </div>
            <!-- nav-right -->
            <div class="nav-right">
                <ul class="sign-in">
                    <li><i class="fa fa-user"></i></li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Sign In') }}</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </li>
                    @else
                        <li>
                            <a href="{{ url('/kh-works') }}"> {{ Auth::user()->name }} </a>
                        </li>
                        <li>
                            <a  href="{{url('logout')}}">Sign Out</a>
                        </li>
                        @endguest
                </ul><!-- sign-in -->
            </div>

            <!-- nav-right -->
        </div><!-- container -->
    </nav><!-- navbar -->
</header><!-- header -->
