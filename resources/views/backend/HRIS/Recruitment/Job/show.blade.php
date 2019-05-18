<!DOCTYPE html>
<!-- saved from url=(0058)https://demo.themeregion.com/jobs-updated/job-details.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Theme Region">
    <meta name="description" content="">
    <title>kh-works</title>
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
                            {{--@if($company->company_logo)--}}
                            {{--<img src="{{asset('/uploaded/companyLogo/'.$company->company_logo)}}" alt="Image" class="img-responsive">--}}
                                {{--@else--}}
                                <img src="{{asset('img/noimage.jpg')}}" alt="Image" class="img-responsive">
                            {{--@endif--}}
                        </div><!-- item-image -->
                    </div>

                    <div class="ad-info">
                        <span style="font-size: 20px;" class="title"></span>
                        <span style="font-size: 20px;" class="title">{{$jobVacancy->name}}</span>

                        {{--<a id="btn{$JobDetail->id}}"  href="{{$id}}"  data-id="{{$JobDetail->id}}" class="btn btn-primary">Apply Now</a>--}}
                        {{--{{ Form::close() }}--}}
                        <div class="ad-meta">
                            <ul>
                                <li><a href="#"><i class="fa fa-money" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>full time</a></li>
                                <li><a href="#"><i class="fa fa-money" aria-hidden="true"></i>$500 - $600</a></li>
                                <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i>HR/Org. Development</a></li>

                                <li><i class="fa fa-dashcube " aria-hidden="true"></i>Application Deadline : {{$jobVacancy->closingDate}}</li>
                                <li>
                                    {{Form::open(array("url"=>"administration/apply-job/".$jobVacancy->id.'/'.$jobVacancy->company->id,"class"=>"smart-form"))}}
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                    @if($isApply)
                                            <button disabled  style="margin-top: -14px;" class="btn btn-primary" type="submit" value="apply" ><i class="fa fa-paper-plane"></i> Applied</button>
                                        @else
                                            <button  style="margin-top: -14px;" class="btn btn-primary" type="submit" value="apply" ><i class="fa fa-paper-plane"></i> Apply Now</button>
                                    @endif
                                    {{ Form::close() }}
                                </li>
                                {{--{{date('d-m-Y', strtotime())}}--}}
                            </ul>
                        </div><!-- ad-meta -->
                    </div><!-- ad-info -->
                </div><!-- item-info -->
            </div><!-- job-ad-item -->

            <div class="job-details-info">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="section job-description">
                            <div class="description-info">
                                <h1>Job Description</h1>
                                <p> {!! $jobVacancy->job_description !!} </p>
                            </div>
                            <div class="requirements">
                                <h1>Job Requirements</h1>
                                <p> {!! $jobVacancy->job_requirements !!} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="section company-info">
                            <h1>Short Info</h1>
                            <ul>
                                <li> closing Date: {{date('d-m-Y', strtotime($jobVacancy->created_at))}}</li>
                                <li> Job poster: <strong>{{$jobVacancy->name}}</strong></li>
                                <li> Experience: <a href="#">Entry level</a></li>
                                <li> Job function: Advertising </li>

                            </ul>
                        </div>
                        <div class="section company-info">
                            <h1>Company Info</h1>

                            <ul>
                                <li>Company Name:<a href="">
                                        <strong>
                                            {{$jobVacancy->name}}
                                        </strong></a></li>
                                <li>Address: {{$jobVacancy->company->postal_address}}</li>
                                <li>company SIze:  2k Employee</li>
                                <li>Industry: <a href="#">Technology</a></li>
                                <li>Phone: {{$jobVacancy->company->phone}}</li>
                                <li>Email: <a href="#">{{$jobVacancy->company->email}}</a></li>
                                <li>Website: <a href=""><strong>{{$jobVacancy->company->website}}</strong></a></li>

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

{{--<section id="something-sell" class="clearfix parallax-section">--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-sm-12 text-center">--}}
                {{--<h2 class="title">Add your resume and let your next job find you.</h2>--}}
                {{--<h4>Post your Resume for free on <a href="#">Jobs.com</a></h4>--}}
                {{--<a href="" class="btn btn-primary">Add Your Resume</a>--}}
            {{--</div>--}}
        {{--</div><!-- row -->--}}
    {{--</div><!-- contaioner -->--}}
{{--</section><!-- something-sell -->--}}

<!-- footer -->
@include('frontend.Kh-Works.partials.ui-footer')

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