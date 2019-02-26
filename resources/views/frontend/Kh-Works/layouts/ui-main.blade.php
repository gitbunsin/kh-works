<!DOCTYPE html>
<!-- saved from url=(0052)https:http://localhost:8000/uiindex.html -->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Theme Region">
    <meta name="description" content="">
    <title> kh-works / The Easiest Way to Get Your New Job</title>
    @include('frontend.Kh-Works.partials.ui-styles')
    <![endif]-->
    <!-- Template Developed By ThemeRegion -->
</head>
<body>
<!-- header -->
@include('frontend.Kh-Works.partials.nav-ui')

<div class="banner-job">
    <div class="banner-overlay"></div>
    <div class="container text-center">
        <h1 class="title">The Easiest Way to Get Your New Job</h1>
        <h3>We offer 12000 jobs vacation right now</h3>
        <div class="banner-form">
            <form method="GET" action="{{url('kh-works')}}">
                {{--<input name="_token" type="hidden" value="{{ csrf_token() }}"/>--}}
                <input name="searchTerm" id="search" type="text" class="form-control" placeholder="Type your key word">
                    {{--<a data-toggle="dropdown" href="#" aria-expanded="false">--}}
                        {{--<span id="job_filter" class="change-text job_filter">Job Category</span>--}}
                        {{--<i class="fa fa-angle-down"></i>--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu category-change">--}}
                        {{--@php  use App\JobCategory;--}}
                          {{--$jobCategories = JobCategory::all();--}}
                        {{--@endphp--}}
                        {{--@foreach($jobCategories as $jobCategory)--}}
                            {{--<li><a href="#">{{$jobCategory->name}}</a></li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--</div><!-- category-change -->--}}
                <div class="dropdown category-dropdown" >
                <select name="" id=""  class="" style="width:160px; " title="">
                    <option value="">-- Job Categories --</option>
                    @php  use App\Model\Backend\JobCategory;
                              $jobCategories = JobCategory::all();
                    @endphp
                    @foreach($jobCategories as $jobCategory)
                        <option value="">{{$jobCategory->name}}</option>
                    @endforeach
                </select>
                </div>
                <style>
                    .banner-job .category-dropdown {
                        border-left: 1px solid #e6e6e6;
                        border-right: 0;
                        border-radius: 0;
                        width: 20%;
                        padding: 0 15px;
                    }
                    select {
                        border-radius: 0px;
                        border-color: #fff;
                    }
                </style>
                <button type="submit" class="btn btn-primary" value="Search">Search</button>
            </form>
        </div><!-- banner-form -->
        <p id="demo"></p>
        <ul class="banner-socail list-inline">
            <li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#" title="Youtube"><i class="fa fa-youtube"></i></a></li>
        </ul><!-- banner-socail -->
    </div><!-- container -->
</div><!-- banner-section -->
<section class="page job-list-page">
    <div class="container">
        <br/>
        <div class="section latest-jobs-ads">
            <div class="section-title tab-manu">
                <h4>Latest Jobs</h4>
            </div>
            {{--{{dd($Job)}}--}}

            @php
                $i=1;
            @endphp
            @foreach($Job as $Jobs)
                <div role="tabpanel" class="tab-pane fade in active" id="popular-jobs">
                    <div class="job-ad-item">
                        <div class="item-info">
                            <div class="item-image-box">
                                <div class="item-image">
                                    <a href="#">
                                        @if($Jobs->company_logo)
                                            <img src="{{asset('/uploaded/companyLogo/'.$Jobs->company_logo)}}" alt="Image" class="img-responsive">
                                        @else
                                            <img src="{{asset('img/noimage.jpg')}}" alt="Image" class="img-responsive">
                                        @endif
                                    </a>
                                </div><!-- item-image -->
                            </div>
                            <div class="ad-info">
                                <span><a style="font-size: 16px;" href="{{url('administration/display-job-details/'.$Jobs->job_id.'/'.$Jobs->company_id)}}" class="title">{{$Jobs->job_title}}</a></span>
                                <div class="ad-meta">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>{{$Jobs->NameEn}}</a></li>
                                        <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>{{$Jobs->job_type}}</a></li>
                                        <li><a href="#"><i class="fa fa-money" aria-hidden="true"></i>${{$Jobs->min_salary}} - ${{$Jobs->max_salary}}</a></li>
                                        <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i>HR/Org. Development</a></li>
                                    </ul>
                                </div><!-- ad-meta -->
                            </div><!-- ad-info -->
                        </div><!-- item-info -->
                    </div><!-- ad-item -->
                </div><!-- tab-pane -->
                @php $i++;@endphp
            @endforeach

        <div class="col-md-12">
            {{--<div class="showing pull-left">--}}
                {{--<br/><br/>--}}
                {{--<a href="#">Showing <span>6-10</span> Of 24 Jobs</a>--}}
            {{--</div>--}}
            <ul class="pull-right">
                 {{ $Job->appends(request()->query())->links() }}
            </ul>
        </div>
    </div><!-- job-ad-item -->
    </div>
</section><!-- main -->
<!-- download -->
<section id="download" class="clearfix parallax-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2>Download on App Store</h2>
            </div>
        </div><!-- row -->

        <!-- row -->
        <div class="row">
            <!-- download-app -->
            <div class="col-sm-4">
                <a href="https:http://localhost:8000/uiindex.html#" class="download-app">
                    <img src="/img/16.png" alt="Image" class="img-responsive">
                    <span class="pull-left">
							<span>available on</span>
							<strong>Google Play</strong>
						</span>
                </a>
            </div><!-- download-app -->

            <!-- download-app -->
            <div class="col-sm-4">
                <a href="https:http://localhost:8000/uiindex.html#" class="download-app">
                    <img src="/img/17.png" alt="Image" class="img-responsive">
                    <span class="pull-left">
							<span>available on</span>
							<strong>App Store</strong>
						</span>
                </a>
            </div><!-- download-app -->

            <!-- download-app -->
            <div class="col-sm-4">
                <a href="https:http://localhost:8000/uiindex.html#" class="download-app">
                    <img src="/img/18.png" alt="Image" class="img-responsive">
                    <span class="pull-left">
							<span>available on</span>
							<strong>Windows Store</strong>
						</span>
                </a>
            </div><!-- download-app -->
        </div><!-- row -->
    </div><!-- contaioner -->
</section><!-- download -->

<!-- footer -->
@include('frontend.Kh-Works.partials.ui-footer')

<!--/Preset Style Chooser-->
<!--/End:Preset Style Chooser-->

<!-- JS -->
@include('frontend.Kh-Works.partials.ui-script')

</body></html>
