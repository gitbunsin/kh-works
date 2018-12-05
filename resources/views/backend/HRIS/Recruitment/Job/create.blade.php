@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <section>
<div class="row">

    <!-- NEW WIDGET START -->
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">

            <header>
                <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                <h2> Post Your Job</h2>
            </header>
            <!-- widget div-->
            <div>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->
                </div>
                <!-- widget content -->
                <div class="widget-body no-padding">

                    <form id="job_validate" method="POST" enctype="multipart/form-data" action="{{url('administration/post-jobs')}}" class="smart-form">
                        @if(Session::get('user_register'))
                            <input type="hidden" value="{{Session::get('user_register')->id}}" name="hiring_manager" id="hiring_manager" />
                        @elseif(Session::get('company_log'))
                            <input type="hidden" value=" {{Session::get('company_log')->id }}" name="hiring_manager" id="hiring_manager" />
                        @endif
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                            <section>
                                <label class="label">Job Types</label>
                                <div class="inline-group">
                                    <label class="radio">
                                        <input value="Full time" type="radio" name="radio-inline" id="job_type">
                                        <i></i>Full time
                                    </label>
                                    <label class="radio">
                                        <input type="radio" value="Part Time" id="job_type" name="radio-inline">
                                        <i></i>Part Time
                                    </label>
                                    <label class="radio">
                                        <input type="radio" value="Freelance" id="job_type" name="radio-inline">
                                        <i></i>Freelance</label>
                                    <label class="radio">
                                        <input type="radio" value="Contract" id="job_type" name="radio-inline">
                                        <i></i>Contract</label>
                                </div>
                            </section>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="label">Title for your job*</label>
                                    <label class="input">
                                        <input type="text" id="job_title" name="job_title" class="custom-scroll">
                                    </label>
                                    <div class="note">
                                        <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                    </div>
                                </section>
                                <section class="col col-6">
                                    <label class="label"> City</label>
                                    <label class="select">
                                        <select name="city" id="city">
                                            <option value="1">Phnom Penh</option>
                                            <option value="2" >Banlung</option>
                                            <option value="3" >Banteay Meanchey</option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="label"> Salary*</label>
                                    <label class="input">
                                        <input type="number" id="mix" name="mix" placeholder="mix ($)" class="custom-scroll">
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
                                    <label class="label"> Negotiable *</label>
                                    <div class="inline-group">
                                        <label class="radio">
                                            <input type="radio" name="negotiable" id="negotiable">
                                            <i></i></label>
                                    </div>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="label"> Salary Types</label>
                                    <label class="select">
                                        <select name="salary_type" id="salary_type">
                                            <option value="1">Per Hour</option>
                                            <option value="2">Daily</option>
                                            <option value="1">Monthly</option>
                                            <option value="2">Yearly</option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label"> Experience *</label>
                                    <label class="select">
                                        <select name="salary_type" id="salary_type">
                                            <option value="1">Mid Level</option>
                                            <option value="2">Mid Level</option>
                                            <option value="1">Mid-Senior Level</option>
                                            <option value="2">Top Level</option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label"> JobResponsible **</label>
                                    <label class="input">
                                        <input type="text" name="jobResponsible" id="jobResponsible">
                                    </label>
                                </section>
                            </div>
                            <section>

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

                                        <textarea id="note" name="job_description"></textarea>

                                    </div>
                                    <!-- end widget content -->

                                </div>
                                <!-- end widget div -->

                            </section>

                            <section>
                                <label class="label"> Job Required *</label>
                                <label class="textarea">
                                    <textarea name="job_required" cols="40" rows="6"></textarea>
                                </label>
                            </section>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="label"> Posting Date </label>
                                    <label class="input">
                                        <i class="icon-append fa fa-calendar"></i>
                                        <input type="text" id="date-of-application" name="postingDate"  class="datepicker">
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label"> Closing Date </label>
                                    <label class="input">
                                        <i class="icon-append fa fa-calendar"></i>
                                        <input type="text" id="closing_date" name="closing_date" class="datepicker">
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label"> Upload resume </label>
                                    <label class="input">
                                        <input type="file" id="resume" name="resume">
                                    </label>
                                </section>
                            </div>
                            <hr>
                            <br/>
                            @if(Session::has('user_register'))
                                @php
                                    $id = Session::get('user_register')->id;
                                @endphp
                            @else
                                @php
                                    $id = Session::get('company_log')->id;
                                @endphp
                            @endif
                            <h5><strong>Company Profiles</strong></h5>
                            <br/>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="label">Company Name*</label>
                                    <label class="input">
                                        @if(Session::has('user_register'))
                                            <input  value="{{ Session::get('user_register')->name}}" type="text" name="CompanyName" id="name">
                                        @else
                                            <input  value="{{  Session::get('company_log')->name }}" type="text" name="CompanyName" id="name">
                                        @endif
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
                                        {{--<input id="email"  type="text" name="email">--}}
                                        @if(Session::has('user_register'))
                                            <input  value="{{ Session::get('user_register')->email}}" type="text" name="email" id="email">
                                        @else
                                            <input  value="{{ Session::get('company_log')->email}}" type="text" name="email" id="email">
                                        @endif
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="label">Mobile Number *</label>
                                    <label class="input">
                                        {{--<input id="mobile" type="text" name="mobile">--}}
                                        @if(Session::has('company_log'))
                                            <input  value="{{ Session::get('company_log')->phone}}" type="text" name="mobile" id="mobile">
                                        @endif
                                    </label>
                                </section>
                            </div>
                            <section>
                                <label class="label"> Address *</label>
                                <label class="textarea">
                                    <textarea name="address" cols="40" rows="6"></textarea>
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
                            </section>
                        </fieldset>

                        <footer>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-default" onclick="window.history.back();">
                                Back
                            </button>
                        </footer>
                    </form>

                </div>
                <!-- end widget content -->

            </div>
        </div>
    </article>
</div>
</section>
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
    <script type="text/javascript">

        // DO NOT REMOVE : GLOBAL FUNCTIONS!

        $(document).ready(function() {

            CKEDITOR.replace( 'job_description', { height: '380px', startupFocus : true} );

        })

    </script>
    <script>
        $(document).ready(function() {
            pageSetUp();
            $('#startdate').datepicker({
                // format: 'DD - dd MM yyyy'
            });
            var $loginForm = $("#job_validate").validate({
                // Rules for form validation
                rules : {
                    name : {
                        required : true
                    },
                    job_description : {
                        required : true
                    },
                    job_required : {
                        required:true
                    },
                    CompanyName:{
                        required : true
                    },
                    email: {
                        required : true
                    }
                },
                // Messages for form validation
                messages : {
                    name : {
                        required : 'Name is requried !'
                    },
                    job_description : {
                        required: 'Job Required is required !'
                    },
                    job_required : {
                        required:' Job Required is required !'
                    },
                    CompanyName : {
                       required : 'Company name is required !'
                    },
                    email :{
                        required:'please enter correct email !'
                    }
                },

                // Do not change code below
                errorPlacement : function(error, element) {
                    error.insertAfter(element.parent());
                }
            });
        });
    </script>
    @endsection