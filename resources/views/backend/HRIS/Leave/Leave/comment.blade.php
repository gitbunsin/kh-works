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
                        <h2> Leave Comments</h2>
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
                            <form id="frmLeavetype" method="POST" enctype="multipart/form-data" action="{{url('administration/leave-comment')}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">Employee</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-joomla"></i>
                                                <input  disabled class="form-control" type="text" value="{{$leaveComments->employee->emp_firstname .' '.$leaveComments->employee->emp_firstname}}" name="emp_number" id="name">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available Leave Types</b> </label>
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Leave Types</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-joomla"></i>
                                                <input disabled class="form-control" type="text" value="{{$leaveComments->leavetype->name}}" name="name" id="name">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available Leave Types</b> </label>
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Leave Balance</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-joomla"></i>
                                                <input disabled class="form-control" type="text" value="{{$leaveComments->length_hours}}" name="name" id="name">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available Leave Types</b> </label>
                                            </label>
                                        </section>

                                    </div>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">Number of Day</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-joomla"></i>
                                                <input disabled class="form-control" type="text" value="{{$leaveComments->length_days}}" name="name" id="name">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available Leave Types</b> </label>
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Status</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-joomla"></i>
                                                <input disabled class="form-control" type="text" value="{{$leaveComments->leaveStatus->name}}" name="name" id="name">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available Leave Types</b> </label>
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Date</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-joomla"></i>
                                                <input disabled class="form-control" type="text" value="{{$leaveComments->date}}" name="name" id="name">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available Leave Types</b> </label>
                                            </label>
                                        </section>

                                    </div>
                                    <section>
                                        <label class="label">Comments</label>
                                        <label class="textarea">
                                            <textarea rows="8" id="comments" name="comments" class="custom-scroll"></textarea>
                                        </label>
                                        <div class="note">
                                            <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                        </div>
                                    </section>
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
@endsection
@section('script')
    <script type="text/javascript">
        // DO NOT REMOVE : GLOBAL FUNCTIONS!
        $(document).ready(function() {

            pageSetUp();
            $('#startdate').datepicker({
                // format: 'DD - dd MM yyyy'
            });
            var $loginForm = $("#frmLeavetype").validate({
                // Rules for form validation
                rules : {
                    name : {
                        required : true
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