<!DOCTYPE html>
<!-- saved from url=(0058)https://demo.themeregion.com/jobs-updated/post-resume.html -->
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

<section class=" job-bg ad-details-page">
    <div class="container">

        <div class="breadcrumb-section">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="">Home</a></li>
                <li>Post Resume</li>
            </ol><!-- breadcrumb -->
            <h2 class="title">Post Resume</h2>
        </div><!-- banner -->
        <div class="job-postdetails post-resume">
            <div class="row">
                <div class="col-md-8 clearfix">
                    @if(Auth::check())
                        @php
                            $id = Auth::user()->id;
                        @endphp
                        @endif
                    {{--<form id="validate_job" method="POST" action="{{url('administration/companyProfile')}}" class="smart-form">--}}
                    {{Form::open(array("url"=>"kh-works/post-resume", "class"=>"smart-form","enctype"=>"multipart/form-data"))}}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <fieldset>
                            <div class="section express-yourself">
                                <h4>Express Yourself</h4>
                                <div class="row form-group">
                                    <label class="col-sm-3 label-title">Full Name</label>
                                    <div class="col-sm-9">
                                        <input required type="text" name="full_name" class="form-control" placeholder="ex Jhon Doe">
                                    </div>
                                </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 label-title">Phone</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="mobile" class="form-control" placeholder="Phone number">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 label-title">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="address" class="form-control" placeholder="121 King Street, Melbourne Victoria, 1200 USA">
                                        </div>
                                    </div>
                                <div class="row form-group photos-resume">
                                    <label class="col-sm-3 label-title"> Resume</label>
                                    <div class="col-sm-9 ">
                                        <input name="cv_file_id" class="form-control" id="fileUpload" type="file" />
                                    </div>
                                        <span  id="lblError" style="color: red;"></span>
                                </div>



                                <br/>
                                <div class="row form-group photos-resume">
                                    <label class="col-sm-3 label-title"> Photo</label>
                                    <div class="col-sm-9 ">
                                        <input name="photo_file_id" class="form-control" id="fileUploadPhoto" type="file" />
                                    </div>
                                </div>
                                <span id="lblErrorPhoto" style="color: red;"></span>

                            </div><!-- postdetails -->

                            <div class="section career-objective">
                                <h4>Career Objective</h4>
                                <div class="form-group">
                                    <textarea name="experiences" class="form-control" placeholder="Write few lines about your career objective" rows="8"></textarea>
                                </div>
                                <span>5000 characters left</span>
                            </div><!-- career-objective -->
                        </fieldset>
                        <div class="buttons">
                            <input class="btn" type="submit" id="btnUpload" value="Update Profile" />
                            <a href="" class="btn cancle">Cancle</a>
                        </div>
                    {{ Form::close() }}
                </div>
                <!-- quick-rules -->
                <div class="col-md-4">
                    <div class="section quick-rules">
                        <h4>Quick rules</h4>
                        <p class="lead">Posting an ad on <a href="">kh-works.com</a> is free! However, all ads must follow our rules:</p>

                        <ul>
                            <li>Make sure you post in the correct category.</li>
                            <li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
                            <li>Do not upload pictures with watermarks.</li>
                            <li>Do not post ads containing multiple items unless it's a package deal.</li>
                            <li>Do not put your email or phone numbers in the title or description.</li>
                            <li>Make sure you post in the correct category.</li>
                            <li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
                            <li>Do not upload pictures with watermarks.</li>
                            <li>Do not post ads containing multiple items unless it's a package deal.</li>
                        </ul>
                    </div>
                </div><!-- quick-rules -->
            </div><!-- photos-ad -->
        </div>
    </div><!-- container -->
</section><!-- main -->

<!-- footer -->
@include('frontend.Kh-Works.partials.ui-footer')
<!--/End:Preset Style Chooser-->

<!-- JS -->
@include('frontend.Kh-Works.partials.ui-script')
{{--<script type="application/javascript">--}}
    {{--$("body").on("click", "#btnUpload", function () {--}}
{{--//        var allowedFiles = [".doc", ".docx", ".pdf"];--}}
        {{--var allowedFiles = [".pdf"];--}}
        {{--var fileUpload = $("#fileUpload");--}}
        {{--var lblError = $("#lblError");--}}
        {{--var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");--}}
        {{--if (!regex.test(fileUpload.val().toLowerCase())) {--}}
            {{--lblError.html("Please upload files having extensions: <b>" + allowedFiles.join(', ') + "</b> only.");--}}
            {{--return false;--}}
        {{--}--}}
        {{--lblError.html('');--}}
        {{--return true;--}}
    {{--});--}}
    {{--$("body").on("click", "#btnUpload", function () {--}}
        {{--var allowedFiles = [".jpg", ".png"];--}}
        {{--var fileUpload = $("#fileUploadPhoto");--}}
        {{--var lblError = $("#lblErrorPhoto");--}}
        {{--var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");--}}
        {{--if (!regex.test(fileUpload.val().toLowerCase())) {--}}
            {{--lblError.html("Please upload files having extensions: <b>" + allowedFiles.join(', ') + "</b> only.");--}}
            {{--return false;--}}
        {{--}--}}
        {{--lblError.html('');--}}
        {{--return true;--}}
    {{--});--}}
{{--</script>--}}

</body>
</html>