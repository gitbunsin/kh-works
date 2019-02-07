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
                        <h2> Attendance Configuration </h2>
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
                            <form id="frmProject" method="POST" enctype="multipart/form-data" action="{{url('administration/defined-project')}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <section>
                                        <label class="label"></label>
                                        <div class="inline-group">
                                            <label class="checkbox">
                                                <input type="checkbox" id="myCheck">
                                                <i></i> Employee can change current time when punching in/out
                                            </label>
                                        </div>
                                    </section><section>
                                        <label class="label"></label>
                                        <div class="inline-group">
                                            <label class="checkbox">
                                                <input type="checkbox" id="myCheck">
                                                <i></i> Employee can edit/delete own attendance records
                                            </label>
                                        </div>
                                    </section><section>
                                        <label class="label"></label>
                                        <div class="inline-group">
                                            <label class="checkbox">
                                                <input type="checkbox" id="myCheck">
                                                <i></i> Supervisor can add/edit/delete attendance records of subordinates
                                            </label>
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
            var $loginForm = $("#frmProject").validate({
                // Rules for form validation
                rules : {
                    name : {
                        required : true
                    },
                    customer_name : {
                        required: true
                    },
                    project_name : {
                        required : true
                    }
                },
                // Do not change code below
                errorPlacement : function(error, element) {
                    error.insertAfter(element.parent());
                }
            });
    </script>
@endsection