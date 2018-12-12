@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
   <style>
       textarea {
           overflow-y: scroll;
           height: 200px;
           resize: none;
       }
   </style>
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
                            <form id="validate_works_shifts" method="POST" enctype="multipart/form-data" action="{{url('administration/jobs-title')}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="user_id" value="{{Auth::guard('admins')->user()->id}}"/>
                                <fieldset>
                                    <section>
                                        <label class="label">Works Shifts</label>
                                        <label class="input">
                                            <input class="col-6" type="text" name="name" id="job_title">
                                        </label>
                                    </section>
                                    <section>
                                        <label class="label">Hour Per Day</label>
                                        <label class="input">
                                            <input  type="number" name="hours_per_day" id="hours_per_day">
                                        </label>
                                    </section>
                                    <div class="row">
                                        <section class="col col-5">
                                            <label class="label">Avaible Employee</label>
                                            <label class="input">
                                                @php $emp = \App\Employee::all(); @endphp
                                                <select style="width: 365px;height: 200px;" name="emp_select" multiple>
                                                    @foreach($emp as $emps)
                                                        <option value="{{$emps->emp_id}}">{{$emps->emp_lastname}}{{$emps->emp_firstname}}</option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <div class="add" style="margin-top: 120px">
                                                <a style="background: #333;" class="btn btn-primary" href="#" role="button">
                                                    <i class="glyphicon glyphicon-plus-sign "></i> Add</a>

                                                <a style="background: #333;" class="btn btn-primary" href="#" role="button">
                                                    <i class="	glyphicon glyphicon-minus"></i> remove</a>
                                            </div>

                                        </section>
                                        <section class="col col-5">
                                            <label class="label">Assign Employer</label>
                                            <label class="input">
                                                <select style="width: 365px;height: 200px;" name="emp_select" multiple>
                                                        <option value="volvo"></option>
                                                </select>
                                            </label>
                                        </section>
                                    </div>
                                </fieldset>
                                <footer>
                                    <button type="submit" class="btn btn-primary">Save</button>
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
            var $loginForm = $("#validate_works_shifts").validate({
                // Rules for form validation
                rules : {
                    job_title : {
                        required : true
                    },
                },
                // Messages for form validation
                messages : {
                    job_title : {
                        required : 'field is required !'
                    },
                },
                // Do not change code below
                errorPlacement : function(error, element) {
                    error.insertAfter(element.parent());
                }
            });
        });

    </script>
@endsection