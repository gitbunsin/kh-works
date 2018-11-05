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

                    <form id="validate_job" method="POST" enctype="multipart/form-data" action="{{url('administration/post-jobs')}}" class="smart-form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <fieldset>
                            <section>
                                <label class="label"> Job Title</label>
                                <label class="input">
                                    <input placeholder="company name" type="text" name="job_title">
                                </label>
                            </section>
                            <section>
                                <label class="label">Job Types</label>
                                <div class="inline-group">
                                    <label class="radio">
                                        <input type="radio" name="radio-inline" checked="checked">
                                        <i></i>Full time</label>
                                    <label class="radio">
                                        <input type="radio" name="radio-inline">
                                        <i></i>Part Time</label>
                                    <label class="radio">
                                        <input type="radio" name="radio-inline">
                                        <i></i>Freelance</label>
                                    <label class="radio">
                                        <input type="radio" name="radio-inline">
                                        <i></i>Contract</label>
                                </div>
                            </section>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="label">Title for your job*</label>
                                    <label class="input">
                                        <input type="text" class="custom-scroll">
                                    </label>
                                    <div class="note">
                                        <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                    </div>
                                </section>
                                <section class="col col-6">
                                    <label class="label"> Location *</label>
                                    <label class="input">
                                        <input type="text" name="" id="" list="list">
                                        <datalist id="list">
                                            <option value="Alexandra">cambodia</option>
                                            <option value="Alice">Alice</option>
                                        </datalist> </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="label"> Salary*</label>
                                    <label class="input">
                                        <input type="text" placeholder="mix ($)" class="custom-scroll">
                                    </label>
                                    <div class="note">
                                        <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                    </div>
                                </section>
                                <section class="col col-4">
                                    <label class="label">**</label>
                                    <label class="input">
                                        <input type="text" placeholder="max ($)">
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label"> Negotiable *</label>
                                    <div class="inline-group">
                                        <label class="radio">
                                            <input type="radio" name="radio-inline" checked="checked">
                                            <i></i>Alexandra</label>
                                    </div>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="label">Salary Type **</label>
                                    <label class="input">
                                        <input type="text" name="job_type" id="job_type" list="list">
                                        <datalist id="list">
                                            <option value="">hello</option>
                                        </datalist> </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label"> Experience **</label>
                                    <label class="input">
                                        <input type="text" name="" id="" list="list">
                                        <datalist id="list">
                                            <option value="Alexandra">Alexandra</option>
                                            <option value="Alice">Alice</option>
                                        </datalist>
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label"> Job function **</label>
                                    <label class="input">
                                        <input type="text" name="" id="">
                                    </label>
                                </section>
                            </div>
                            <hr>
                            <br/>
                            <h5><strong>Company Profiles</strong></h5>
                            <br/>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="label">Industry* </label>
                                    <label class="input">
                                        <input type="text" name="" id="" placeholder="Maketing and Advertising">
                                    </label>
                                </section>

                                <section class="col col-6">
                                    <label class="label">Company Name*</label>
                                    <label class="input">
                                        <input placeholder="company name" type="text" name="company_name">
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="label">Email ID*</label>
                                    <label class="input">
                                        <input placeholder="" type="text" name="email">
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="label">Mobile Number *</label>
                                    <label class="input">
                                        <input placeholder="ex, 962711117" type="text" name="radio-inline">
                                    </label>
                                </section>
                            </div>
                            <section>
                                <label class="label"> Address *</label>
                                <label class="textarea">
                                    <textarea placeholder="address" name="address" cols="40" rows="6"></textarea>
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
            required : 'Please enter Job Category'
            },
            job_description : {
            required: 'Please enter job Description'
            },
            note:{
            required:'please enter noted'
            }
            },
            // Do not change code below
            errorPlacement : function(error, element) {
            error.insertAfter(element.parent());
            }
            });
            });

            </script>
    <script type="text/javascript">
    (document).ready(function() {
    var bxSlider = $("<ul class='bxslider'></ul>"), img;
    for (var i = 1; i < 4; i++) {
    img = new Image();
    img.src = "images/bid_" + i + ".jpg";
    $("<li>").append(img).appendTo(bxSlider);
        }
        bxSlider.appendTo(".og-fullimg");

        bxSlider.bxSlider({
        auto: true,
        pager: false,
        adaptiveHeight: true,
        slideWidth: 550
        });
        });
    </script>
    @endsection