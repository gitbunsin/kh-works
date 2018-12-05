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
                    @php  use App\JobCategory;
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
            @php $i=1; @endphp
            @foreach($Job as $Jobs)
                <div role="tabpanel" class="tab-pane fade in active" id="popular-jobs">
                    <div class="job-ad-item">
                        <div class="item-info">
                            <div class="item-image-box">
                                <div class="item-image">
                                    <a href="https:http://localhost:8000/uijob-details.html"><img src="/img/1(1).png" alt="Image" class="img-responsive"></a>
                                </div><!-- item-image -->
                            </div>
                            <div class="ad-info">
                                <span><a target="_blank" href="{{url('kh-works/jobs/'.$Jobs->id)}}" class="title">{{$Jobs->job_title}}</a></span>
                                <div class="ad-meta">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>San Francisco, CA, US </a></li>
                                        <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>Full Time</a></li>
                                        <li><a href="#"><i class="fa fa-money" aria-hidden="true"></i>$25,000 - $35,000</a></li>
                                        <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i>HR/Org. Development</a></li>
                                    </ul>
                                </div><!-- ad-meta -->
                            </div><!-- ad-info -->

                            {{--<input id="url" type="hidden" value="{{ \Request::url() }}">--}}
                            {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
                            {{--<div class="apply_dev">--}}
                                {{--<a id="btn{{$Jobs->id}}"  href="{{$id}}"  data-id="{{$Jobs->id}}" class="btn btn-primary apply_id">Apply Now</a>--}}
                            {{--</div>--}}
                        </div><!-- item-info -->
                    </div><!-- ad-item -->
                </div><!-- tab-pane -->
                @php $i++;@endphp
            @endforeach
            {{ $Job->appends(request()->query())->links() }}
        </div><!-- item-info -->
    </div><!-- job-ad-item -->
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
{{--<script>--}}
    {{--jQuery(document).ready(function(){--}}
        {{--jQuery('.apply_id').click(function(e){--}}
            {{--// alert('ok');--}}
            {{--var id = $(this).data("id");--}}
            {{--var user_id = $(this).attr('href');--}}
            {{--e.preventDefault();--}}
            {{--$.ajaxSetup({--}}
                {{--headers: {--}}
                    {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
                {{--}--}}
            {{--});--}}
            {{--$.ajax({--}}
                {{--type: "POST",--}}
                {{--contentType: "application/json",--}}
                {{--url: 'kh-works/apply/'+id+'/user_id/'+user_id,--}}
                {{--data:JSON.stringify({"id":id,"user_id" : user_id}),--}}
                {{--dataType: 'JSON',--}}
                {{--cache: false,--}}
                {{--success: function(data) {--}}
                    {{--alert(JSON.stringify(data));--}}
                    {{--$('#btn'+id).text('applied');--}}
                    {{--$('#btn'+id).attr('disabled', 'disabled');--}}
                {{--},--}}
                {{--error:function(){--}}
                    {{--alert('failure');--}}
                {{--}--}}
            {{--});--}}
        {{--});--}}
    {{--});--}}

{{--</script>--}}