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
                        <h2>Add New Employee</h2>
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
                            <form id="validate_employee" method="POST"  action="{{url('administration/employee')}}" class="smart-form" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">First Name</label>
                                            <label class="input"> <i class="icon-append fa fa-joomla"></i>
                                                <input type="text" name="emp_firstname" placeholder="First Name">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available first name</b> </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Middle Name</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-joomla"></i>
                                                <input type="text" name="emp_middle_name" placeholder="Middle Name">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available middle name</b> </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Last Name</label>
                                            <label class="input"> <i class="icon-append fa fa-joomla"></i>
                                                <input type="text" name="emp_lastname" placeholder="Last Name">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available last name</b> </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label">Employee ID</label>
                                            <label class="input"> <i class="icon-append fa fa-joomla"></i>
                                                <input type="text" name="employee_id" placeholder="Employee ID">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available Job name</b> </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label"> Employee Photo</label>
                            
                                            <img id="preview" src="{{asset('img/noimage.jpg')}}" width="200px" height="200px"/><br/>
                                            <input name="photo" type="file" id="image" style="display: none;"/>
                                            <!--<input type="hidden" style="display: none" value="0" name="remove" id="remove">-->
                                            <p>
                                                <a href="javascript:changeProfile()"><i class="glyphicon glyphicon-edit"></i> Change</a> |
                                                <a style="color: red" href="javascript:removeImage()"><i class="glyphicon glyphicon-trash"></i> Remove</a>
                                            </p>
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
@endsection
@section('script')
    <script>
        $( document ).ready(function() {
            $("#div_login").hide();
            $('#checkbox-login').change(function () {
                if (this.checked) {
                    $('#checkbox-login').val("1");
                    $('#div_login').fadeIn('slow');
                }
                else {
                    $('#div_login').fadeOut('slow')
                    $('#checkbox-login').val("0");
                }
            });
        });
        // DO NOT REMOVE : GLOBAL FUNCTIONS!

        $(document).ready(function() {
            var $loginForm = $("#validate_employee").validate({
                // Rules for form validation
                rules : {
                    emp_firstname : {
                        required : true
                    },
                    emp_lastname : {
                        required : true
                    },
                    emp_middle_name:{
                        required:true
                    },
                    employee_id :{
                        required:true
                    },
                },
                // Do not change code below
                errorPlacement : function(error, element) {
                    error.insertAfter(element.parent());
                }
            });
        });
    
        function changeProfile() {
            $('#image').click();
        }
        $('#image').change(function () {
            var imgPath = this.value;
            var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
                readURL(this);
            else
                alert("Please select image file (jpg, jpeg, png).")
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.readAsDataURL(input.files[0]);
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
//              $("#remove").val(0);
                };
            }
        }
        function removeImage() {
            $('#preview').attr('src', '{{asset('img/noimage.jpg')}}');
//      $("#remove").val(1);
        }
    </script>
@endsection