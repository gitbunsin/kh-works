
@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <form id="job_validate" method="POST" enctype="multipart/form-data" action="{{url('administration/post-jobs')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2>Post Job</h2>
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
                                        <label class="label"> Job Title</label>
                                        <label class="select">
                                            @php use App\JobTitle;$Job_Title= JobTitle::all(); @endphp
                                            <select name="job_title_code" id="job_title_code">
                                                <option value="0">Choose Manager</option>
                                                @foreach($Job_Title as $Job_Titles)
                                                    <option value="{{$Job_Titles->id}}">{{$Job_Titles->job_title}}</option>
                                                @endforeach
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>

                                    <div class="row">
                                        {{--<section class="col col-6">--}}
                                            {{--<label class="label"> Location</label>--}}
                                            {{--<label class="input">--}}
                                                {{--<input type="text" name="city" id="city" />--}}
                                                {{--<i></i>--}}
                                            {{--</label>--}}
                                        {{--</section>--}}
                                        <section class="col col-4">
                                            <label class="label">Location</label>
                                            <label class="select">
                                                @php
                                                    //$company_id = Auth::guard('admins')->user()->id;
                                                    $location = \App\Provinces::all();
                                                @endphp
                                                <select name="city" id="city">
                                                    <option value="0">-- Select location -- </option>
                                                    @foreach($location as $locations)
                                                        <option value="{{$locations->id}}">{{$locations->NameEn}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Job Types</label>
                                            <div class="inline-group">
                                                <label class="radio">
                                                    <input value="Full time" type="radio" name="job_type" id="job_type">
                                                    <i></i>Full time
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" value="Part Time" id="job_type" name="radio-inline">
                                                    <i></i>Part Time
                                                </label>
                                            </div>
                                        </section>

                                    </div>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label"> Salary*</label>
                                            <label class="input">
                                                <input type="number" id="min" name="min" placeholder="mix ($)" class="custom-scroll">
                                            </label>
                                            <div class="note">
                                                <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                            </div>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">**</label>
                                            <label class="input">
                                                <input type="number" id="max" name="max" placeholder="max ($)">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Hiring Manager</label>
                                            <label class="select">
                                                @php
                                                    $company_id = Auth::guard('admins')->user()->id;
                                                    $emp = \App\Employee::where('company_id',$company_id)->get();
                                                @endphp
                                                <select name="manager" id="manager_id">
                                                    <option value="0"> Select Manager </option>
                                                    @foreach($emp as $managers)
                                                        <option value="{{$managers->emp_id}}"> {{$managers->emp_lastname}} {{$managers->emp_firstname}}</option>
                                                        @endforeach
                                                </select>
                                                <i></i>
                                            </label>
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
                                                <input type="text" id="closing_date" name="closing_date" class="datepicker">
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
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false">
                    <!-- widget options:
                        usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                        data-widget-colorbutton="false"
                        data-widget-editbutton="false"
                        data-widget-togglebutton="false"
                        data-widget-deletebutton="false"
                        data-widget-fullscreenbutton="false"
                        data-widget-custombutton="false"
                        data-widget-collapsed="true"
                        data-widget-sortable="false"

                    -->
                    <header>
                        <span class="widget-icon"> <i class="fa fa-pencil"></i> </span>
                        <h2> Job Description </h2>

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

                            <textarea name="ckeditor">

                            </textarea>

                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->

                </div>
                <!-- end widget -->

            </article>
            <!-- WIDGET END -->

        </div>

        <!-- end row -->

    </section>
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false">
                    <!-- widget options:
                        usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                        data-widget-colorbutton="false"
                        data-widget-editbutton="false"
                        data-widget-togglebutton="false"
                        data-widget-deletebutton="false"
                        data-widget-fullscreenbutton="false"
                        data-widget-custombutton="false"
                        data-widget-collapsed="true"
                        data-widget-sortable="false"

                    -->
                    <header>
                        <span class="widget-icon"> <i class="fa fa-pencil"></i> </span>
                        <h2> Job Requirement </h2>

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

                            <textarea name="ckeditor1">

                            </textarea>

                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->

                </div>
                <!-- end widget -->

            </article>
            <!-- WIDGET END -->

        </div>

        <!-- end row -->

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
                        <h2>Add Job title</h2>
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
                                        <h5><strong>Company Profiles</strong></h5>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label class="label">Company Name*</label>
                                                <input name="company_id" type="hidden" value="{{Auth::guard('admins')->user()->id}}" />
                                                <label class="input">
                                                    <input  value="{{Auth::guard('admins')->user()->name}}" type="text" name="CompanyName" id="name">
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label class="label">Contact Name * </label>
                                                <label class="input">
                                                    <input type="text" name="ContactName" id="ContactName">
                                                </label>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label class="label">Email ID *</label>
                                                <label class="input">
                                                    <input  value="{{Auth::guard('admins')->user()->email}}" type="text" name="email" id="email">
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label class="label">Mobile Number *</label>
                                                <label class="input">
                                                    <input value="{{Auth::guard('admins')->user()->phone}}" id="mobile" type="text" name="mobile">
                                                </label>
                                            </section>
                                        </div>
                                        <section>
                                            <label class="label"> Address *</label>
                                            <label class="textarea">
                                                <textarea name="address" cols="40" rows="6">{{Auth::guard('admins')->user()->postal_address}}</textarea>
                                            </label>
                                        </section>

                                        <section>
                                            <label class="label">Active</label>
                                            <div class="inline-group">
                                                <label class="checkbox">
                                                    <input  type="checkbox"  name="checkbox-inline" checked>
                                                    <i></i>
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" name="checkbox-inline" checked>
                                                    <i></i>Publish in RSS feed(1) and web page(2)
                                                </label>
                                            </div>
                                            <hr>
                                            <br/>
                                            <footer>
                                                <button type="submit" id="btnUploadJob" class="btn btn-primary">Submit</button>
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        if (!window.jQuery) {
            document.write('<script src="js/libs/jquery-2.1.1.min.js"><\/script>');
        }
    </script>

    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script>
        if (!window.jQuery.ui) {
            document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');
        }
    </script>
    <script>
        $(document).ready(function() {

            CKEDITOR.replace( 'ckeditor', { height: '380px', startupFocus : true} );
            CKEDITOR.replace( 'ckeditor1', { height: '380px'} );

        })
    </script>
    <script>
        $("body").on("click", "#btnUploadJob", function () {
//        var allowedFiles = [".doc", ".docx", ".pdf"];
            var allowedFiles = [".pdf"];
            var fileUpload = $("#resume");
            var lblError = $("#lblErrorresume");
            var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
            if (!regex.test(fileUpload.val().toLowerCase())) {
                lblError.html("Please upload files having extensions: <b>" + allowedFiles.join(', ') + "</b> only.");
                return false;
            }
            lblError.html('');
            return true;
        });
    </script>

@endsection