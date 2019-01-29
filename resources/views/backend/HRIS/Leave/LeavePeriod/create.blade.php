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
                        <h2>  Leave Period </h2>
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
                            <form id="frmLeavetype" method="POST" enctype="multipart/form-data" action="{{url('administration/leave-type')}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <section>
                                        <label class="label"> Start Month</label>
                                        <label class="select">
                                            <select name="marital_status" id="martial_Status">
                                                <option value="0">-- select month --</option>
                                                <option value="0">  one </option>
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                    <section>
                                        <label class="label"> Start Date</label>
                                        <label class="select">
                                            <select name="marital_status" id="martial_Status">
                                                <option value="0">-- select date --</option>
                                                <option value="0">  one </option>
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                    <div class="row">
                                            <section class="col col-6">
                                                <label class="label">End Date</label>
                                                <label class="input">
                                                    <input type="text" name="name" id="name">
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label class="label">Current Leave Period</label>
                                                <label class="input">
                                                    <input type="text" name="name" id="name">
                                                </label>
                                            </section>
                                    </div>

                                </fieldset>
                                <footer>
                                    <input  type="submit" value="Edit" id="btn_save" name="btn_save" class="btn_save btn btn-primary" />
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
    </script>
@endsection