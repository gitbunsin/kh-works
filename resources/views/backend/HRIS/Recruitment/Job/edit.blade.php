
@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <form id="frmJob" method="POST" enctype="multipart/form-data" action="{{url('administration/post-jobs/'.$job->id)}}">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
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
                                                    $company_id = Auth::guard('admins')->user()->id;
                                                    use App\JobTitle;use Illuminate\Support\Facades\Auth;
                                                    $t= JobTitle::where('company_id',$company_id)->get();
                                                @endphp
                                                <select name="job_titles_code" id="job_titles_code" class="required">
                                                    <option value="">Choose Manager</option>
                                                    @foreach($t as $ts)
                                                        <option value="{{$ts->id}}" {{$ts->id ==$job->job_titles_code ? 'selected="selected"':''}}>
                                                            {{$ts->job_titles}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>

                                        <div class="row">
                                            <section class="col col-4">
                                                <label class="label">Location</label>
                                                <label class="select">
                                                    @php
                                                        //$company_id = Auth::guard('admins')->user()->id;
                                                        $location = \App\Provinces::all();
                                                    @endphp
                                                    <select  name="city" id="city" class="required">
                                                        <option value="">-- Select location -- </option>
                                                        @foreach($location as $locations)
                                                            <option value="{{$locations->id}}" {{$locations->id ==$job->location ? 'selected="selected"':''}}>
                                                                {{$locations->NameEn}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <i></i>
                                                </label>
                                            </section>
                                            <section class="col col-4">
                                                <label class="label">Job Types</label>
                                                <div class="inline-group">
                                                    @if($job->job_type == "Full time")
                                                        <label class="radio">
                                                            <input value="Full time" type="radio" name="full" id="full" checked>
                                                            <i></i>Full time
                                                        </label>
                                                    @else
                                                        <label class="radio">
                                                            <input value="part time" type="radio" name="full" id="full">
                                                            <i></i>Part Time
                                                        </label>
                                                    @endif
                                                        @if($job->job_type == "part time")
                                                            <label class="radio">
                                                                <input value="part time" type="radio" name="full" id="full" checked>
                                                                <i></i>Full time
                                                            </label>
                                                        @else
                                                            <label class="radio">
                                                                <input value="Full time" type="radio" name="full" id="full">
                                                                <i></i>Part Time
                                                            </label>
                                                        @endif
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-4">
                                                <label class="label"> Salary*</label>
                                                <label class="input">
                                                    <input type="number" value="{{$job->min_salary}}" id="min" name="min" placeholder="min ($)" class="custom-scroll">
                                                </label>
                                                <div class="note">
                                                    <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                                </div>
                                            </section>
                                            <section class="col col-4">
                                                <label class="label">**</label>
                                                <label class="input">
                                                    <input type="number" value="{{$job->max_salary}}" id="max" name="max" placeholder="max ($)">
                                                </label>
                                            </section>
                                            <section class="col col-4">
                                                <label class="label">Hiring Manager</label>
                                                <label class="select">
                                                    @php
                                                        $company_id = Auth::guard('admins')->user()->id;
                                                        $e = \App\Model\Employee::where('company_id',$company_id)->get();
                                                    @endphp
                                                    <select name="manager" id="manager" class="required">
                                                        <option value=""> Select Manager </option>
                                                        @foreach($e as $m)
                                                            <option value="{{$m->emp_id}}" {{$m->emp_id ==$job->hiring_manager_id ? 'selected="selected"':''}}>
                                                                {{$m->emp_lastname}} {{$m->emp_firstname}}
                                                            </option>
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
                        <header>
                            <span class="widget-icon"> <i class="fa fa-pencil"></i> </span>
                            <h2> Job Description </h2>
                        </header>
                        <div>
                            <div class="jarviswidget-editbox">
                            </div>
                            <div class="widget-body no-padding">
                            <textarea name="description" id="description" required>
                                    {{$job->description}}
                            </textarea>

                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </section>
        <section id="widget-grid" class="">
            <div class="row">
                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false">
                        <header>
                            <span class="widget-icon"> <i class="fa fa-pencil"></i> </span>
                            <h2> Job Requirement </h2>
                        </header>
                        <div>
                            <div class="jarviswidget-editbox">
                            </div>
                            <div class="widget-body no-padding">
                            <textarea name="requirement" id="message" type="text" value=""  dir="ltr" required>
                                {!! $job->requirement !!}
                            </textarea>
                                <br>
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
                            <h2>Add Job title</h2>
                        </header>
                        <div>
                            <div class="jarviswidget-editbox">
                            </div>
                            <div class="widget-body no-padding">
                                <div class="smart-form">
                                    <fieldset>
                                        <section>
                                            <h5><strong>Company Profiles</strong></h5>
                                            <div class="row">
                                                <section class="col col-6">
                                                    <label class="label">Company Name*</label>
                                                    <input  name="company_id" type="hidden" value="{{Auth::guard('admins')->user()->id}}" />
                                                    <label class="input">
                                                        <input disabled value="{{Auth::guard('admins')->user()->name}}" type="text" name="CompanyName" id="name">
                                                    </label>
                                                </section>
                                                <section class="col col-6">
                                                    <label class="label">Contact Name * </label>
                                                    <label class="input">
                                                        <input disabled type="text" name="ContactName" id="ContactName">
                                                    </label>
                                                </section>
                                            </div>
                                            <div class="row">
                                                <section class="col col-6">
                                                    <label class="label">Email ID *</label>
                                                    <label class="input">
                                                        <input disabled  value="{{Auth::guard('admins')->user()->email}}" type="text" name="email" id="email">
                                                    </label>
                                                </section>
                                                <section class="col col-6">
                                                    <label class="label">Mobile Number *</label>
                                                    <label class="input">
                                                        <input disabled value="{{Auth::guard('admins')->user()->phone}}" id="mobile" type="text" name="mobile">
                                                    </label>
                                                </section>
                                            </div>
                                            <section>
                                                <label class="label"> Address *</label>
                                                <label class="textarea">
                                                    <textarea disabled name="address" cols="40" rows="6">{{Auth::guard('admins')->user()->postal_address}}</textarea>
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
                                                    <input type="submit" id="btnUploadJob" class="btn btn-primary" value="save"/>
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
        $(document).ready(function() {
            CKEDITOR.replace( 'description', { height: '380px', startupFocus : true} );
            CKEDITOR.replace( 'requirement', { height: '380px'} );

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
        var allowedFiles = [".doc", ".docx", ".pdf"];
        $('#btnUploadJob').click(function () {
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
