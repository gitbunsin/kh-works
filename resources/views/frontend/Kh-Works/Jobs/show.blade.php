<!DOCTYPE html>
<!-- saved from url=(0058)https://demo.themeregion.com/jobs-updated/job-details.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Theme Region">
    <meta name="description" content="">

    <title>Jobs | Job Portal / Job Board HTML Template</title>

    <!-- CSS -->
    <!-- icons -->
@include('frontend.Kh-Works.partials.ui-styles')
<!-- Template Developed By ThemeRegion -->
</head>
<body>
<!-- header -->
@include('frontend.Kh-Works.partials.nav-ui')

<section class="job-bg page job-details-page">
    <div class="container">
        <div class="breadcrumb-section">
            <ol class="breadcrumb">
                <li><a href="">Home</a></li>
                <li><a href="">Engineer/Architects</a></li>
                <li>UI &amp; UX Designer</li>
            </ol><!-- breadcrumb -->
            <h2 class="title">Creative &amp; Design</h2>
        </div><!-- breadcrumb -->

        <div class="job-details">
            <div class="section job-ad-item">
                <div class="item-info">
                    <div class="item-image-box">
                        <div class="item-image">
                            <img src="/img/4.png" alt="Image" class="img-responsive">
                        </div><!-- item-image -->
                    </div>

                    <div class="ad-info">
                        <span><a href="#" class="title">{{$JobDetail->job_title}}</a></span>
                        <div class="ad-meta">
                            <ul>
                                <li><a href="https://demo.themeregion.com/jobs-updated/job-details.html#"><i class="fa fa-map-marker" aria-hidden="true"></i>San Francisco, CA, US</a></li>
                                <li><a href="https://demo.themeregion.com/jobs-updated/job-details.html#"><i class="fa fa-clock-o" aria-hidden="true"></i>Full Time</a></li>
                                <li><i class="fa fa-money" aria-hidden="true"></i>$25,000 - $35,000</li>
                                <li><a href="https://demo.themeregion.com/jobs-updated/job-details.html#"><i class="fa fa-tags" aria-hidden="true"></i>HR/Org. Development</a></li>
                                <li><i class="fa fa-hourglass-start" aria-hidden="true"></i>Application Deadline : {{date('d-m-Y', strtotime($JobDetail->ClosingDate))}}</li>
                            </ul>
                        </div><!-- ad-meta -->
                    </div><!-- ad-info -->
                </div><!-- item-info -->
                <div class="social-media">
                    <div class="button">
                        {{--@if (Auth::check())--}}
                            {{--@php--}}
                                {{--$user_id = Auth::user()->id;--}}
                            {{--@endphp--}}
                        {{--@else--}}
                            {{--@php--}}
                                {{--$user_id = "";--}}
                            {{--@endphp--}}

                        {{--@endif--}}
                            {{Form::open(array("url"=>"kh-works/apply-job/".$JobDetail->id, "class"=>"smart-form"))}}
                             {{--{{Form::open(array("url"=>"kh-works/apply-job", "class"=>"smart-form"))}}--}}
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <input id="url" type="hidden" value="{{ \Request::url() }}">
                                <button class="btn btn-primary" type="submit" value="apply" >Apply Now</button>
                                {{--<a id="btn{{$JobDetail->id}}"  href="{{$id}}"  data-id="{{$JobDetail->id}}" class="btn btn-primary">Apply Now</a>--}}
                            {{ Form::close() }}
                        {{--<a href="#" class="btn btn-primary bookmark"><i class="fa fa-bookmark-o" aria-hidden="true"></i>Bookmark</a>--}}
                    </div>
                    <ul class="share-social">
                        <li>Share this ad</li>
                        <li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-tumblr-square" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div><!-- job-ad-item -->

            <div class="job-details-info">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="section job-description">
                            <div class="description-info">
                                <h1>Job Description</h1>
                                <p>{{$JobDetail->jobdesc}}</p>
                            </div>
                            <div class="responsibilities">
                                <h1>Key Responsibilities:</h1>
                                <p>{{$JobDetail->JobResponsible}} </p>
                            </div>
                            <div class="requirements">
                                <h1>Job Requirements</h1>
                                <ul>
                                    <li>{{$JobDetail->jobreqired}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="section job-short-info">
                            <h1>Short Info</h1>
                            <ul>
                                <li><span class="icon"><i class="fa fa-bolt" aria-hidden="true"></i></span>Posting Date: {{date('d-m-Y'),$JobDetail->postingDate}}</li>
                                <li><span class="icon"><i class="fa fa-user-plus" aria-hidden="true"></i></span> Job poster: <a href="#">Lance Ladaga</a></li>
                                <li><span class="icon"><i class="fa fa-industry" aria-hidden="true"></i></span>Industry: <a href="#">Marketing and Advertising</a></li>
                                <li><span class="icon"><i class="fa fa-line-chart" aria-hidden="true"></i></span>Experience: <a href="#">Entry level</a></li>
                                <li><span class="icon"><i class="fa fa-key" aria-hidden="true"></i></span>Job function: Advertising,Design, Art/Creative</li>
                            </ul>
                        </div>
                        <div class="section company-info">
                            <h1>Company Info</h1>
                            <ul>
                                <li>Compnay Name: <a href=""><strong>{{$JobDetail->CompanyName}}</strong></a></li>
                                <li>Address: London, United Kingdom</li>
                                <li>Compnay SIze:  2k Employee</li>
                                <li>Industry: <a href="#">Technology</a></li>
                                <li>Phone: {{$JobDetail->phone}}</li>
                                <li>Email: <a href="#">{{$JobDetail->email}}</a></li>
                                <li>Website: <a href="#">www.Reamea.com</a></li>
                            </ul>
                            <ul class="share-social">
                                <li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- row -->
            </div><!-- job-details-info -->
        </div><!-- job-details -->
    </div><!-- container -->
</section><!-- job-details-page -->

<section id="something-sell" class="clearfix parallax-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="title">Add your resume and let your next job find you.</h2>
                <h4>Post your Resume for free on <a href="#">Jobs.com</a></h4>
                <a href="" class="btn btn-primary">Add Your Resume</a>
            </div>
        </div><!-- row -->
    </div><!-- contaioner -->
</section><!-- something-sell -->

<!-- footer -->
@include('frontend.Kh-Works.partials.ui-footer')

<!--/Preset Style Chooser-->
<div class="style-chooser">
    <div class="style-chooser-inner">
        <a href="https://demo.themeregion.com/jobs-updated/job-details.html#" class="toggler"><i class="fa fa-cog fa-spin"></i></a>
        <h4>Presets</h4>
        <ul class="preset-list clearfix">
            <li class="preset1 active" data-preset="1"><a href="https://demo.themeregion.com/jobs-updated/job-details.html#" data-color="preset1"></a></li>
            <li class="preset2" data-preset="2"><a href="https://demo.themeregion.com/jobs-updated/job-details.html#" data-color="preset2"></a></li>
            <li class="preset3" data-preset="3"><a href="https://demo.themeregion.com/jobs-updated/job-details.html#" data-color="preset3"></a></li>
            <li class="preset4" data-preset="4"><a href="https://demo.themeregion.com/jobs-updated/job-details.html#" data-color="preset4"></a></li>
        </ul>
    </div>
</div>
<!--/End:Preset Style Chooser-->

<!-- JS -->
@include('frontend.Kh-Works.partials.ui-script')

</body></html>
<script>
//    jQuery(document).ready(function(){
//        jQuery('.apply_id').click(function(e){
//
//
//
//            var id = $(this).data("id");
//            var user_id = $(this).attr('href');
//
//             alert(user_id + id);
//            var url = $('#url').val();
//           //alert(url);
//            var rl = url.substring(0,30);
//            e.preventDefault();
//            $.ajaxSetup({
//                headers: {
//                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                }
//            });
//            $.ajax({
//                type: "POST",
//                contentType: "application/json",
//                url: rl+ '/apply/'+id+'/'+user_id,
//                data:JSON.stringify({"id":id,"user_id" : user_id}),
//                dataType: 'JSON',
//                cache: false,
//                success: function(data) {
//                    alert(JSON.stringify(data));
//                    $('#btn'+id).text('applied');
//                    $('#btn'+id).attr('disabled', 'disabled');
//                },
//                error:function(){
//                    alert('falsess');
//                }
//            });
//                    }
//            $.ajax({
//                type: "POST",
//                contentType: "application/json",
//                url: rl+ '/getExistingCandidate/'+id+'/'+user_id,
//                data:JSON.stringify({"id":id,"user_id" : user_id}),
//                dataType: 'JSON',
//                cache: false,
//                success: function(data) {
//                    console.log(data);
//                    if(data){//if existing do something
//                        alert('This job you already applied!');
//                    }else{
//                        $.ajax({
//                            type: "POST",
//                            contentType: "application/json",
//                            url: rl+ '/apply/'+id+'/'+user_id,
//                            data:JSON.stringify({"id":id,"user_id" : user_id}),
//                            dataType: 'JSON',
//                            cache: false,
//                            success: function(data) {
//                                alert(JSON.stringify(data));
//                                $('#btn'+id).text('applied');
//                                $('#btn'+id).attr('disabled', 'disabled');
//                            },
//                            error:function(){
//                                alert('falsess');
//                            }
//                        });
//                    }
//                },
//                error:function(){
//                    alert('failure');
//                }
//            });
//            // alert('ok');
                //alert(rl);
//
//        });
//    });

</script>