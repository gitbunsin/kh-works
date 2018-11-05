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
                    </header>
                    <!-- widget div-->
                    <div>
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                        </div>
                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            @if(Session::get('user_register'))
                            @php  $id = Session::get('user_register')->id @endphp
                            <form id="validate_job" method="POST" action="{{url('administration/companyProfile',$id)}}" class="smart-form">
                            <input name="_method" type="hidden" value="PATCH">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="company_id" value="{{Session::get('user_register')->id}}">
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label">Campany Profiles 1</label>
                                            <label class="input">
                                                <input  value="{{ Session::get('user_register')->name }}" type="text" name="company_name" id="company_name">
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                                <label class="label">Company Email</label>
                                                <label class="input">
                                                    <input  value="{{ Session::get('user_register')->email }}" type="text" name="company_email" id="company_email">
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
                                    <section>
                                        <label class="label">Websites</label>
                                        <label class="input">
                                            <input disabled value="" type="text" name="company_profiles" id="company_profiles">
                                        </label>
                                    </section>
                                    <section>

                                         <header>
                                                <span class="widget-icon"> <i class="fa fa-pencil"></i> </span>
                                                <h2>Company Profiles </h2>
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

											<textarea name="ckeditor"></textarea>

                                                </div>
                                                <!-- end widget content -->

                                            </div>
                                            <!-- end widget div -->

                                    </section>
                                    {{--<section>--}}
                                        {{--<label class="label">Company Profiles *</label>--}}
                                        {{--<label class="input">--}}
                                                {{--<textarea name="com_note" rows="10" cols="150"></textarea>--}}
                                        {{--</label>--}}
                                        {{--<div class="note">--}}
                                            {{--<strong>Note:</strong> height of the textarea depends on the rows attribute.--}}
                                        {{--</div>--}}
                                    {{--</section>--}}

                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">Phone *</label>
                                            <label class="input">
                                                <input  value="" type="text" name="com_phone" id="com_phone">
                                            </label>
                                            <div class="note">
                                                <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                            </div>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">fax *</label>
                                            <label class="input">
                                                <input  value="" type="text" name="com_phone" id="com_phone">
                                            </label>
                                            <div class="note">
                                                <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                            </div>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">mobile *</label>
                                            <label class="input">
                                                <input  value="" type="text" name="com_phone" id="com_phone">
                                            </label>
                                            <div class="note">
                                                <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                            </div>
                                        </section>
                                    </div>
                                    <section>
                                        <label class="label">Company Logos *</label>
                                        <label class="input">
                                            <input  value="" type="file" name="com_phone" id="com_phone">
                                        </label>
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
                    @endif
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

            CKEDITOR.replace( 'ckeditor', { height: '380px', startupFocus : true} );

        })

    </script>

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