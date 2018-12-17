<!DOCTYPE html>
<!-- saved from url=(0053)https://demo.themeregion.com/jobs-updated/resume.html -->
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

<section class=" job-bg page  ad-profile-page">
    <div class="container">
        <div class="breadcrumb-section">
            <ol class="breadcrumb">
                <li><a href="">Home</a></li>
                <li>Candidate Profile</li>
            </ol>
            <h2 class="title">{{Auth::user()->full_name}} Resume</h2>
        </div><!-- breadcrumb-section -->

        <div class="resume-content">
            <div class="profile section clearfix">
                <div class="profile-logo">
                    <img  class="img-responsive" alt="Image" width="150px;" height="150px;" src="{{asset('uploaded/UserPhoto/'.Auth::user()->photo)}}"/>
                </div>
                <div class="profile-info">
                    <h1></h1>
                    <address>
                        <p>
                            name :  {{Auth::user()->full_name}}<br/>
                            Phone: {{Auth::user()->mobile}} <br/>
                            Email:<a href=""> {{Auth::user()->email}}</a><br/>
                            Address:  {{Auth::user()->address}}
                        </p>
                    </address>
                </div>
            </div><!-- profile -->
            <div class="career-objective section">
                <div class="icons">
                    <i class="fa fa-bolt" aria-hidden="true"></i>
                </div>
                <div class="career-info">
                    <h3>Career Objective</h3>
                    <p>
                        {{Auth::user()->address}}
                    </p>
                </div>
            </div><!-- career-objective -->
        </div>
    </div><!-- container -->
</section><!-- ad-profile-page -->

<!--/Preset Style Chooser-->
<!--/End:Preset Style Chooser-->
@include('frontend.Kh-Works.partials.ui-footer')
<!-- JS -->
@include('frontend.Kh-Works.partials.ui-script')
</body></html>