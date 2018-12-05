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
                        <li class="{{ Request::segment(2) == "lists" ? "active" : " " }}">
                            <a href="{{url('/kh-works/lists')}}">Job list</a>
                        </li>
                        <li class="{{ Request::segment(2) == "post-resume" ? "active" : " " }}">
                            <a href="{{url('/kh-works/post-resume')}}">Resume</a>
                        </li>
                        <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Pages<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="">About Us</a></li>
                                <li><a href="">Contact Us</a></li>
                                <li class="{{ Request::segment(3) == "resume" ? "active" : " " }}">
                                    <a href="{{url('/kh-works/resume')}}"> Post Resume</a>
                                </li>
                                <li><a href="{{url('kh-works/policy')}}">Privacy Policy</a></li>
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
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    {{--@if(Session::get('user_log'))--}}
                        {{--<li>--}}
                            {{--<a href="{{ url('/kh-works') }}"> {{ Session::get('user_log')->name }} </a>--}}
                        {{--</li>--}}

                        {{--<li>--}}
                            {{--<a  href="{{url('logout')}}">Logout</a>--}}
                        {{--</li>--}}
                    {{--@else--}}
                        {{--<li>--}}
                            {{--<a href="{{ route('login') }}">Sing In</a>--}}
                        {{--</li>--}}
                        {{--@if (Route::has('register'))--}}
                            {{--<li>--}}
                                {{--<a href="{{ route('register') }}">Register</a>--}}
                            {{--</li>--}}
                        {{--@endif--}}
                    {{--@endif--}}
                    {{--@endif--}}
                </ul><!-- sign-in -->
                {{--<a href="http://localhost:8000/posts" class="btn">Post Your Job</a>--}}
            </div>

            <!-- nav-right -->
        </div><!-- container -->
    </nav><!-- navbar -->
</header><!-- header -->
