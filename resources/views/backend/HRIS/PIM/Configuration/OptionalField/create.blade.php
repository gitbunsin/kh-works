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
                        <h2> Configure PIM</h2>
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
                            <form id="frmKpi" method="POST" enctype="multipart/form-data" action="{{url('administration/employee-kpi')}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <h5><strong> Show Deprecated Fields </strong> </h5>
                                    <br/>
                                    <section>
                                        <label class="label"></label>
                                        <div class="inline-group">
                                            <label class="checkbox">
                                                <input value="" type="checkbox" name="NickName" id="NickName">
                                                <i></i> Show Nick Name , Smoker and Military Service in Personal Details
                                            </label>
                                        </div>
                                    </section>

                                </fieldset>
                                <fieldset>
                                    <h5><strong> Country Specific Information </strong></h5>
                                    <br/>
                                    <section>
                                        <label class="label"></label>
                                        <div class="inline-group">
                                            <label class="checkbox">
                                                <input value="" type="checkbox" name="SSN" id="SSN">
                                                <i></i> Show SSN field in Personal Details
                                            </label>
                                        </div>
                                    </section>
                                    <section>
                                        <label class="label"></label>
                                        <div class="inline-group">
                                            <label class="checkbox">
                                                <input value="" type="checkbox" name="SIN" id="SIN">
                                                <i></i> Show SIN Field in Personal Details
                                            </label>
                                        </div>
                                    </section>
                                    <section>
                                        <label class="label"></label>
                                        <div class="inline-group">
                                            <label class="checkbox">
                                                <input value="" type="checkbox" name="UsTax" id="UsTax">
                                                <i></i> Show US Tax Exemptions menu
                                            </label>
                                        </div>
                                    </section>
                                </fieldset>
                                <footer>
                                    <input value="" type="button" id="BtnSaveConfigurePim" class="btn btn-primary"></input>
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
            $('#SIN').prop('disabled',true);
            $('#SSN').prop('disabled',true);
            $('#NickName').prop('disabled',true);
            $('#UsTax').prop('disabled',true);
            $('#BtnSaveConfigurePim').val("Edit");
            $('#BtnSaveConfigurePim').on('click',function () {
                $('#BtnSaveConfigurePim').val("Save");
                DisabledField();
            });
            function DisabledField(){
                $('#SIN').prop('disabled',false);
                $('#SSN').prop('disabled',false);
                $('#NickName').prop('disabled',false);
                $('#UsTax').prop('disabled',false);
            }
            $(document).ready(function() {

                //custom rule method
                $.validator.addMethod("isBiggerThanMinSalary", function (value, element, arg) {
                    var maxSalary = $("#max_id").val();
                    return parseInt(maxSalary) > parseInt(value);
                }, "Minimum Salary must be smaller than Maximun Salary");
                var $loginForm = $("#frmKpi").validate({
                    // Rules for form validation
                    rules : {
                        job_title_code : {
                            required : true
                        },
                        performance : {
                            required: true
                        },
                        min_id : {
                            required : true,
                            isBiggerThanMinSalary: ""

                        },
                        max_id : {
                            required: true,


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