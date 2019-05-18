@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <section id="widget-grid" class="">
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget well" id="wid-id-3" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-comments"></i> </span>
                        <h2>Default Tabs with border </h2>

                    </header>
                    <div>
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->

                        </div>
                        <div class="widget-body">
                            <hr class="simple">
                            <ul id="myTab1" class="nav nav-tabs bordered">
                                <li class="active">
                                    <a href="#s1" data-toggle="tab">Punch IN <i class="fa fa-fw fa-lg fa-info-circle"></i></a>
                                </li>
                                <li>
                                    <a href="#s2" data-toggle="tab"><i class="fa fa-fw fa-lg fa-outdent"></i> Punch Out</a>
                                </li>
                            </ul>
                            <div id="myTabContent1" class="tab-content">
                                <div class="tab-pane fade in active" id="s1">
                                    <form id="frmProject" method="POST" enctype="multipart/form-data" action="{{url('administration/defined-project')}}" class="smart-form">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <fieldset>
                                            <div class="row">
                                                <section class="col col-6">
                                                    <label class="label"> Date </label>
                                                    <label class="input">
                                                        <i class="icon-append fa fa-calendar"></i>
                                                        <input type="text" id="startdate" name="startdate" class="datepicker">
                                                    </label>
                                                </section>
                                                <section class="col col-6">
                                                    <label class="label">Time</label>
                                                    <div class="input-group">
                                                        <input class="form-control" name="interview_time" id="timepicker1" type="text" placeholder="Select time">
                                                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                    </div>
                                                </section>
                                            </div>
                                            <section>
                                                <label class="label">Note</label>
                                                <label class="textarea">
                                                    <textarea rows="8" id="Note" name="Note" class="custom-scroll"></textarea>
                                                </label>
                                                <div class="note">
                                                    <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                                </div>
                                            </section>
                                        </fieldset>
                                        <footer>
                                            <button type="submit" class="btn btn-danger">Save</button>
                                            <button type="button" class="btn btn-default" onclick="window.history.back();">
                                                Back
                                            </button>
                                        </footer>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="s2">
                                    <form id="frmProject" method="POST" enctype="multipart/form-data" action="{{url('administration/defined-project')}}" class="smart-form">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <fieldset>
                                            <div class="row">
                                                <section class="col col-6">
                                                    <label class="label"> Date </label>
                                                    <label class="input">
                                                        <i class="icon-append fa fa-calendar"></i>
                                                        <input type="text" id="startdate" name="startdate" class="datepicker">
                                                    </label>
                                                </section>
                                                <section class="col col-6">
                                                    <label class="label">Time</label>
                                                    <div class="input-group">
                                                        <input class="form-control" name="interview_time" id="timepicker2" type="text" placeholder="Select time">
                                                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                    </div>
                                                </section>
                                            </div>
                                            <section>
                                                <label class="label">Note</label>
                                                <label class="textarea">
                                                    <textarea rows="8" id="Note" name="Note" class="custom-scroll"></textarea>
                                                </label>
                                                <div class="note">
                                                    <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                                </div>
                                            </section>
                                        </fieldset>
                                        <footer>
                                            <button type="submit" class="btn btn-danger">Save</button>
                                            <button type="button" class="btn btn-default" onclick="window.history.back();">
                                                Back
                                            </button>
                                        </footer>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->

                </div>

            </article>
        </div>
    </section>

@endsection
@section('script')
    <script type="text/javascript">
        $('#timepicker1').timepicker();
        $('#timepicker2').timepicker();
        $('#startdate').datepicker({
            dateFormat: 'yy-mm-dd',
            prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>',
            onSelect: function (selectedDate) {
                $('#finishdate').datepicker('option', 'minDate', selectedDate);
            }
        });
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