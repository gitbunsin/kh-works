
@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <form id="frmJob" method="POST" enctype="multipart/form-data" action="{{url('administration/post-jobs')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <section id="widget-grid" class="">
            <div class="row">
                <!-- NEW WIDGET START -->
                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                        <header>
                            <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                            <h2>Post Job</h2>
                        </header>
                        <div>
                            <div class="jarviswidget-editbox">
                            </div>
                            <div class="widget-body no-padding">
                                <div class="smart-form">
                                    <fieldset>
                                        <section>
                                            <label class="label"> Job Title</label>
                                            <label class="select">
                                                @php
                                                   $JobTitle = \App\Model\JobTitle::all();
                                                @endphp
                                                <select name="job_title_code" id="job_title_code" class="required">
                                                    <option value="">Choose Manager</option>
                                                    @foreach($JobTitle as $JobTitles)
                                                        <option value="{{$JobTitles->id}}">{{$JobTitles->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label class="label">Vacancy Name</label>
                                                <label class="input">
                                                    <i class="icon-append fa fa-joomla"></i>
                                                    <input type="text" name="name" placeholder="vacancy name">
                                                    <b class="tooltip tooltip-bottom-right">Needed to enter available vacancy name</b> </label>
                                            </section>
                                            <section class="col col-6">
                                                <label class="label"> Hiring Manager </label>
                                                <div class="form-group">
                                                    <select name="hiring_manager_id"
                                                            id="hiring_manager_id"
                                                            style="width:100%" class="select2 select2-hidden-accessible"
                                                            tabindex="-1" aria-hidden="true">
                                                        <optgroup label="Performance Employee Trackers">
                                                            <option value="">--  select  --</option>
                                                            @php $tracker = \App\Model\Employee::all(); @endphp
                                                            @foreach($tracker as $trackers)
                                                                <option value="{{$trackers->emp_number}}">{{$trackers->emp_lastname}}{{$trackers->emp_firstname}}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </section>

                                        </div>

                                        <div class="row">
                                            <section class="col col-6">
                                                <label class="label">Number of Position</label>
                                                <label class="input">
                                                    <i class="icon-append fa fa-joomla"></i>
                                                    <input type="number" name="number_of_position" placeholder="">
                                                    <b class="tooltip tooltip-bottom-right">Needed to enter available vacancy name</b> </label>
                                            </section>
                                            <section class="col col-6">
                                                <div class="row">
                                                    <label class="label col col-2"> Active </label>
                                                    <div class="inline-group col col-8">
                                                        <label class="checkbox">
                                                            <input checked="" type="checkbox" id="myCheck">
                                                            <i></i>
                                                        </label>
                                                        <label class="checkbox">
                                                            <input checked="" type="checkbox" id="myCheck">
                                                            <i></i> Publish in RSS feed(1) and web page(2)
                                                        </label>

                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label class="label"> Upload Job </label>
                                                <label class="input">
                                                    <input type="file" id="resume" name="resume">
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label class="label"> Closing Date </label>
                                                <label class="input">
                                                    <i class="icon-append fa fa-calendar"></i>
                                                    <input type="text" id="closingDate" name="closingDate" class="datepicker">
                                                </label>
                                            </section>
                                            <span id="lblErrorresume" style="color: red;"></span>

                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <!-- end widget content -->
                        </div>
                    </div>
                </article>
            </div>
        </section>
        <section id="widget-grid" class="">
            <!-- row -->
            <div class="row">

                <!-- NEW WIDGET START -->
                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget jarviswidget-color-blue" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false">
                        <header>
                            <span class="widget-icon"> <i class="fa fa-pencil"></i> </span>
                            <h2>Job Description</h2>
                        </header>
                        <div>
                            <div class="jarviswidget-editbox">
                            </div>
                            <div class="widget-body no-padding">
                                <textarea name="job_description" class="job_description"></textarea>
                            </div>
                        </div>

                    </div>
                </article>
            </div>
        </section>

        <section id="widget-grid" class="">
            <!-- row -->
            <div class="row">

                <!-- NEW WIDGET START -->
                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget jarviswidget-color-blue" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false">
                        <header>
                            <span class="widget-icon"> <i class="fa fa-pencil"></i> </span>
                            <h2>Job Requirements</h2>

                        </header>
                        <div>
                            <div class="jarviswidget-editbox">
                            </div>
                            <div class="widget-body no-padding">
                                <textarea name="job_requirements" class="job_requirements"></textarea>
                            </div>
                        </div>

                    </div>
                </article>
            </div>
        </section>


        <section id="widget-grid" class="">

            <!-- row -->
            <div class="row">
                <!-- NEW WIDGET START -->
                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                        <header>
                            <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                            <h2>Company Profiles</h2>
                        </header>
                        <!-- widget div-->
                        <div>
                            <!-- widget edit box -->
                            <div class="jarviswidget-editbox">
                                <!-- This area used as dropdown edit box -->
                            </div>
                            <!-- end widget edit box -->
                            <!-- widget content -->
                            <div class="widget-body no-padding">
                                <div class="smart-form">
                                    <fieldset>
                                        <section>
                                            <div class="row">
                                                <section class="col col-6">
                                                    <label class="label">Company Name</label>
                                                    <div class="input-group">
                                                        <input disabled  class="form-control" value="{{Auth::guard('admins')->user()->name}}" type="text" name="email" id="email">
                                                        <span class="input-group-addon"><i class="fa fa-send-o "></i></span>
                                                    </div>
                                                </section>
                                                <section class="col col-6">
                                                    <label class="label">Contact Number</label>
                                                    <div class="input-group">
                                                        <input disabled  class="form-control" value="" type="text" name="email" id="email">
                                                        <span class="input-group-addon"><i class="fa fa-phone-square "></i></span>
                                                    </div>
                                                </section>
                                            </div>
                                            <div class="row">
                                                <section class="col col-6">
                                                    <label class="label">Email</label>
                                                    <div class="input-group">
                                                        <input disabled  class="form-control" value="{{(Auth::guard('admins')->user()) ? Auth::guard('admins')->user()->email : Auth::guard('employee')->user()->email}}" type="text" name="email" id="email">
                                                        <span class="input-group-addon"><i class="fa fa-mail-forward "></i></span>
                                                    </div>
                                                </section>
                                                <section class="col col-6">
                                                    <label class="label">Mobile Number</label>
                                                    <div class="input-group">
                                                        <input disabled  class="form-control" value="{{Auth::guard('admins')->user()->phone}}" type="text" name="email" id="email">
                                                        <span class="input-group-addon"><i class="fa fa-phone "></i></span>
                                                    </div>
                                                </section>
                                            </div>
                                            <section>
                                                <label class="label"> Address *</label>
                                                <label class="textarea">
                                                    <textarea class="form-control" disabled name="address" cols="40" rows="6">{{Auth::guard('admins')->user()->postal_address}}</textarea>
                                                </label>
                                            </section>
                                            <section>
                                                <hr>
                                                <br/>
                                                <footer>
                                                    {{--<input type="submit" id="btnUploadJob" class="btn btn-primary" value="save"/>--}}
                                                    <button type="submit" id="btnUploadJob" class="btn btn-primary">Save <i class="fa fa-arrow-circle-right"></i> </button>
                                                    <button type="button" class="btn btn-default" onclick="window.history.back();">
                                                        Back
                                                    </button>
                                                </footer>
                                            </section>
                                        </section>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </section>
    </form>
@endsection
@section('script')
    <script type="text/javascript">
        // DO NOT REMOVE : GLOBAL FUNCTIONS!
        $(document).ready(function() {
            /*
             * SUMMERNOTE EDITOR
             */

            $('.job_description').summernote({
                height : 180,
                focus : false,
                tabsize : 2
            });

            $('.job_requirements').summernote({
                height : 180,
                focus : false,
                tabsize : 2
            });
            /*
             * MARKDOWN EDITOR
             */

            $("#mymarkdown").markdown({
                autofocus:false,
                savable:true
            })
        })

        $(document).ready(function() {
            // CKEDITOR.replace( 'description', { height: '380px', startupFocus : true} );
            // CKEDITOR.replace( 'requirement', { height: '380px'} );

            var $loginForm = $("#frmJob").validate({
                // Rules for form validation
                rules : {
                    city : {
                        required : true
                    },
                    job_titles_code:{
                        required: true
                    },
                    manager:{
                        required:true
                    },
                    description:{
                        required : true
                    },
                    requirement : {
                        required : true
                    }
                },
                // Do not change code below
                errorPlacement : function(error, element) {
                    error.insertAfter(element.parent());
                }
            });
        });
        // var allowedFiles = [".doc", ".docx", ".pdf"];
        // $('#btnUploadJob').click(function () {
        //     var allowedFiles = [".pdf"];
        //     var fileUpload = $("#resume");
        //     var lblError = $("#lblErrorresume");
        //     var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
        //     if (!regex.test(fileUpload.val().toLowerCase())) {
        //         lblError.html("Please upload files having extensions: <b>" + allowedFiles.join(', ') + "</b> only.");
        //         return false;
        //     }
        //     lblError.html('');
        //     return true;
        // });
    </script>
@endsection
