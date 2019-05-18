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
                <div class="dropdown category-dropdown" >
                <select name="" id=""  class="" style="width:160px; " title="">
                    <option value="">-- Job Categories --</option>
                    @php  use App\Model\JobCategory;
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
            @foreach($JobVacancy as $JobVacancies)
                <div role="tabpanel" class="tab-pane fade in active" id="popular-jobs">
                    <div class="job-ad-item">
                        <div class="item-info">
                            <div class="item-image-box">
                                <div class="item-image">
                                    <a href="#">
                                        {{--@if($Jobs->company_logo)--}}
                                            {{--<img src="{{asset('/uploaded/companyLogo/'.$JobVacancys->company_logo)}}" alt="Image" class="img-responsive">--}}
                                        {{--@else--}}
                                            <img src="{{asset('img/noimage.jpg')}}" alt="Image" class="img-responsive">
                                        {{--@endif--}}
                                    </a>
                                </div><!-- item-image -->
                            </div>
                            <div class="ad-info">
                                <span><a style="font-size: 16px;" href="{{url('administration/display-job-details/'.$JobVacancies->id.'/'.$JobVacancies->company->id)}}" class="title">{{$JobVacancies->name}}</a></span>
                                <span><a style="font-size: 16px;" href="{{url('administration/display-job-details/')}}" class="title"></a></span>
                                <div class="ad-meta">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i>HR/Org. Development</a></li>  <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a>HR/Org. Development</li>
                                        <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>full time</a></li>
                                        <li><a href="#"><i class="fa fa-money" aria-hidden="true"></i>$500 - $600</a></li>
                                        <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i>HR/Org. Development</a></li>
                                    </ul>
                                </div><!-- ad-meta -->
                            </div><!-- ad-info -->
                        </div><!-- item-info -->
                    </div><!-- ad-item -->
                </div><!-- tab-pane -->
            @endforeach
        <div class="col-md-12">
            <ul class="pull-right">
                 {{--{{ $JobVacancy->appends(request()->query())->links() }}--}}
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
