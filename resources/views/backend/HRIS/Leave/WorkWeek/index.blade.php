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
                        <h2> Work Week </h2>
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
                            <form id="frmWorkWeek" method="POST" enctype="multipart/form-data" action="{{url('administration/leave-type')}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> Monday </label>
                                            <label class="select">
                                                <select name="mon" id="mon">
                                                    <option value=""> Non Working day </option>
                                                    <option value="1"> Full Day</option>
                                                    <option value="2"> Half Day</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Tuesday </label>
                                            <label class="select">
                                                <select name="tue" id="tue">
                                                    <option value=""> Non Working day </option>
                                                    <option value="1"> Full Day</option>
                                                    <option value="2"> Half Day</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> Wednesday </label>
                                            <label class="select">
                                                <select name="wed" id="wed">
                                                    <option value=""> Non Working day </option>
                                                    <option value="1"> Full Day</option>
                                                    <option value="2"> Half Day</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Thursday </label>
                                            <label class="select">
                                                <select name="thu" id="thu">
                                                    <option value=""> Non Working day </option>
                                                    <option value="1"> Full Day</option>
                                                    <option value="2"> Half Day</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> friday </label>
                                            <label class="select">
                                                <select name="fri" id="fri">
                                                    <option value=""> Non Working day </option>
                                                    <option value="1"> Full Day</option>
                                                    <option value="2"> Half Day</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Saturday </label>
                                            <label class="select">
                                                <select name="sat" id="sat">
                                                    <option value=""> Non Working day </option>
                                                    <option value="1"> Full Day</option>
                                                    <option value="2"> Half Day</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                    <section>
                                        <label class="label"> Sunday </label>
                                        <label class="select">
                                            <select name="sun" id="sun">
                                                <option value=""> Non Working day </option>
                                                <option value="1"> Full Day</option>
                                                <option value="2"> Half Day</option>
                                            </select>
                                            <i></i>
                                        </label>
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
        var $loginForm = $("#frmWorkWeek").validate({
            // Rules for form validation
            rules : {
                mon : {
                    required : true
                },
                wed : {
                    required : true
                },
                sun : {
                    required : true
                }
                ,sat : {
                    required : true
                },
                tue : {
                    required: true
                },
                fri : {
                    required: true
                },
                thu: {
                    required:true
                }
            },
            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });
    </script>
@endsection