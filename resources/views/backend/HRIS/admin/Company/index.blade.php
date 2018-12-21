@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">

                    <header>
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2> Edit Company Profiles</h2>
                        {{--{{ Session::get('company_log')->name}}--}}
                    </header>
                    <!-- widget div-->
                    <div>
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                        </div>
                        <!-- widget content -->
                        <div class="widget-body no-padding">
                                @php
                                    $id = Auth::guard('admins')->user()->id;
                                @endphp
                            {{--<form id="validate_job" method="POST" action="{{url('administration/companyProfile')}}" class="smart-form">--}}
                            {{Form::open(array("url"=>"administration/companyProfile/".$id, "class"=>"smart-form","enctype"=>"multipart/form-data"))}}
                            <input name="_method" type="hidden" value="PATCH">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="company_id" value="">
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label">Company Profiles </label>
                                            <label class="input">
                                                <input  value="{{Auth::guard('admins')->user()->name}}" type="text" name="name" id="name">
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                                <label class="label">Company Email</label>
                                                <label class="input">
                                                    <input  value="{{Auth::guard('admins')->user()->email}}" type="text" name="email" id="email">
                                                </label>
                                        </section>
                                    </div>
                                    <section>
                                        <label class="label">Postal Address *</label>
                                        <label class="input">
                                            <textarea name="postal_address" rows="10" cols="150"></textarea>
                                        </label>
                                        <div class="note">
                                            <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                        </div>
                                    </section>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">City</label>
                                            <label class="input">
                                                <input  value="" type="text" name="city" id="city">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Zip Code</label>
                                            <label class="input">
                                                <input  value="" type="text" name="zip_code" id="zip_code">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Street</label>
                                            <label class="input">
                                                <input  value="" type="text" name="street1" id="street1">
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">Country</label>
                                            <label class="input">
                                                <input  value="" type="text" name="country" id="country">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Province</label>
                                            <label class="input">
                                                <input  value="" type="text" name="province" id="province">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Tax Id</label>
                                            <label class="input">
                                                <input  value="" type="text" name="tax_id" id="tax_id">
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">Websites</label>
                                            <label class="input">
                                                <input  value="" type="text" name="website" id="website">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">registration number</label>
                                            <label class="input">
                                                <input  value="" type="text" name="registration_number" id="registration_number">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Noted</label>
                                            <label class="input">
                                                <input  value="" type="text" name="note" id="note">
                                            </label>
                                        </section>
                                    </div>

                                    {{--<section>--}}

                                         {{--<header>--}}
                                                {{--<span class="widget-icon"> <i class="fa fa-pencil"></i> </span>--}}
                                                {{--<h2>Company Profiles </h2>--}}
                                            {{--</header>--}}

                                            {{--<!-- widget div-->--}}
                                            {{--<div>--}}

                                                {{--<!-- widget edit box -->--}}
                                                {{--<div class="jarviswidget-editbox">--}}
                                                    {{--<!-- This area used as dropdown edit box -->--}}

                                                {{--</div>--}}
                                                {{--<!-- end widget edit box -->--}}

                                                {{--<!-- widget content -->--}}
                                                {{--<div class="widget-body no-padding">--}}

											{{--<textarea id="note" name="ckeditor"></textarea>--}}

                                                {{--</div>--}}
                                                {{--<!-- end widget content -->--}}

                                            {{--</div>--}}
                                            {{--<!-- end widget div -->--}}

                                    {{--</section>--}}

                                    <section>
                                        <label class="label">Company Profiles *</label>
                                        <label class="input">
                                            <textarea name="ckeditor" rows="10" cols="150"></textarea>
                                        </label>
                                        <div class="note">
                                            <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                        </div>
                                    </section>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">Phone *</label>
                                            <label class="input">
                                                <input  value="" type="text" name="phone" id="phone">
                                            </label>
                                            <div class="note">
                                                <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                            </div>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">fax *</label>
                                            <label class="input">
                                                <input  value="" type="text" name="fax" id="fax">
                                            </label>
                                            <div class="note">
                                                <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                            </div>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">mobile *</label>
                                            <label class="input">
                                                <input  value="" type="text" name="mobile" id="mobile">
                                            </label>
                                            <div class="note">
                                                <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                            </div>
                                        </section>
                                    </div>
                                    <section>
                                        <label class="label">Company Logos *</label>
                                        <label class="input">
                                            <input  value="" type="file" name="company_logo" id="company_logo">
                                        </label>
                                    </section>
                                </fieldset>

                                <footer>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="button" class="btn btn-default" onclick="window.history.back();">
                                        Back
                                    </button>
                                </footer>
                            {{ Form::close() }}
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
    {{--<script type="text/javascript">--}}

        {{--// DO NOT REMOVE : GLOBAL FUNCTIONS!--}}

        {{--$(document).ready(function() {--}}

            {{--CKEDITOR.replace( 'ckeditor', { height: '380px', startupFocus : true} );--}}

        {{--})--}}

    {{--</script>--}}

    <script type="text/javascript">

        // DO NOT REMOVE : GLOBAL FUNCTIONS!

        $(document).ready(function() {

            pageSetUp();
            $('#startdate').datepicker({
                // format: 'DD - dd MM yyyy'
            });
            var $loginForm = $("#validate_job").validate({
                // Rules for form validation
                rules : {
                    job_title : {
                        required : true
                    },
                    job_description : {
                        required : true,
                    },
                    note:{
                        required:true
                    }
                },

                // Messages for form validation
                messages : {
                    job_title : {
                        required : 'Please enter Job_title'
                    },
                    job_description : {
                        required: 'Please enter your job desciption'
                    },
                    note:{
                        required:'please enter noted of job description'
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