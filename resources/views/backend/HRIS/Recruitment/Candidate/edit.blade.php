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
                        <h2>Edit Candidate</h2>

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

                            <form id="validate" method="POST" action="{{ url('administration/candidate') }}" class="smart-form" enctype="multipart/form-data" >
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="PATCH">
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">First Name</label>
                                            <label class="input">
                                                <input value="{{$candidate->first_name}}" type="text" maxlength="20" name="first_name" id="first_name">
                                            </label>
                                        </section >
                                        <section class="col col-4">
                                            <label class="label">last Name</label>
                                            <label class="input">
                                                <input value="{{$candidate->last_name}}" type="text"  id="last_name" name="last_name">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Middle Name</label>
                                            <label class="input">
                                                <input value="{{$candidate->middle_name}}" type="text" maxlength="20" name="middle_name" id="middle_name">
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">Email</label>
                                            <label class="input">
                                                <input value="{{$candidate->email}}" type="text" id="email" name="email">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">contact Number</label>
                                            <label class="input">
                                                <input value="{{$candidate->contact_number}}" name="contact_number" id="contact_number" type="text" list="list">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">KeyWord</label>
                                            <label class="input">
                                                <input value="{{$candidate->keywords}}" placeholder="Enter comma separated words..." type="text" maxlength="10">
                                            </label>
                                        </section>

                                    </div>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label">Resume</label>
                                            <div class="input input-file">
                                                <span class="button"><input id="file2" type="file" name="cv_file_id" onchange="this.parentNode.nextSibling.value = this.value">Browse</span><input type="text"  placeholder="Include some files" readonly="">
                                            </div>
                                            <div class="note">
                                                <strong>Note:</strong> Accepts .docx, .doc, .odt, .pdf, .rtf, .txt up to 1MB
                                            </div>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Date </label>
                                            <label class="input">
                                                <i class="icon-append fa fa-calendar"></i>
                                                <input type="text" name="date-of-application" placeholder="Request activation on" class="datepicker">
                                            </label>
                                        </section>
                                    </div>
                                    <section>
                                        <label class="label">Comment</label>
                                        <label class="textarea">
                                            <textarea rows="6" class="custom-scroll">{{$candidate->comment}}</textarea>
                                        </label>
                                        <div class="note">
                                            <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                        </div>
                                    </section>
                                </fieldset>
                                <footer>
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
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

    <!--================================================== -->

    <!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
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

            pageSetUp();
            $('#startdate').datepicker({
                // format: 'DD - dd MM yyyy'
            });
            var $loginForm = $("#validate").validate({
                // Rules for form validation
                rules : {
                    first_name : {
                        required : true
                    },
                    last_name : {
                        required : true,
                        maxlength : 20
                    },
                    middle_name : {
                        required:true
                    },
                    email:{
                        required : true,
                        email : true
                    }
                },

                // Messages for form validation
                messages : {
                    first_name : {
                        required : 'Please enter first name'
                    },
                    last_name : {
                        required: 'Please enter your last name'
                    },
                    middle_name : {
                        required:'Pleae inter middle name'
                    },
                    email :{
                        required:'please enter correct email'
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