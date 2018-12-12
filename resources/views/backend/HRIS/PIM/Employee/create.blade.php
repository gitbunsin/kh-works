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
                                            <label class="input">
                                                <input type="text" name="emp_firstname" id="emp_firstname">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Middle Name</label>
                                            <label class="input">
                                                <input type="text" name="emp_middle_name" id="emp_middle_name">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Last Name</label>
                                            <label class="input">
                                                <input type="text" name="emp_lastname" id="emp_lastname" >
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label"> Employee Id</label>
                                            <label class="input">
                                                <input type="text" name="employee_id" id="employee_id" >
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Job Title</label>
                                            <label class="select">
                                                @php $job_title = \App\JobTitle::all(); @endphp
                                                <select name="job_title" id="Job_title">
                                                    <option value="0">-- job title --</option>
                                                    @foreach($job_title as $job_titles)
                                                        <option value="{{$job_titles->id}}">{{$job_titles->job_title}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    <section class="col col-4">
                                        <label class="label"> Employee Photo</label>
                                        {{--<div style="width:200px;height: 200px; border: 1px solid whitesmoke ;text-align: center;position: relative" id="image">--}}
                                            {{--<img width="100%" height="100%" id="preview_image" src="{{asset('img/noimage.png')}}"/>--}}
                                            {{--<i id="loading" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display: none"></i>--}}
                                        {{--</div>--}}
                                        <img id="preview" src="{{asset('img/noimage.jpg')}}" width="200px" height="200px"/><br/>
                                        <input name="photo" type="file" id="image" style="display: none;"/>
                                        <!--<input type="hidden" style="display: none" value="0" name="remove" id="remove">-->
                                        <p>
                                            <a href="javascript:changeProfile()"><i class="glyphicon glyphicon-edit"></i> Change</a> |
                                            <a style="color: red" href="javascript:removeImage()"><i class="glyphicon glyphicon-trash"></i> Remove</a>
                                        </p>

                                        {{--<p>--}}
                                            {{--<a href="javascript:changeProfile()" style="text-decoration: none;">--}}
                                                {{--<i class="glyphicon glyphicon-edit"></i> Change--}}
                                            {{--</a>&nbsp;&nbsp;--}}
                                            {{--<a href="javascript:removeFile()" style="color: red;text-decoration: none;">--}}
                                                {{--<i class="glyphicon glyphicon-trash"></i>--}}
                                                {{--Remove--}}
                                            {{--</a>--}}
                                        {{--</p>--}}
                                        {{--<input type="file" name="file" id="file" style="display: none"/>--}}
                                        {{--<input type="hidden" name="file" id="file_name"/>--}}
                                    </section>
                                    </div>
                                    <section>
                                        <label class="checkbox">
                                            <input type="checkbox" value="checkbox-login" id="checkbox-login">
                                            <i></i><strong> Create Login Details</strong>
                                        </label>
                                    </section>
                                    <div id="div_login">
                                        <div  class="row">
                                            <section  class="col col-6">
                                                <label class="label"> Username *</label>
                                                <label class="input">
                                                    <input type="text" name="user_name" id="user_name" maxlength="10">
                                                </label>
                                            </section>
                                            <section  class="col col-6">
                                                <label class="label"> email *</label>
                                                <label class="input">
                                                    <input type="email" name="user_email" id="user_email" >
                                                </label>
                                            </section>
                                        </div>
                                        <div id="" class="row">
                                            <section  class="col col-6">
                                                <label class="label"> Password *</label>
                                                <label class="input">
                                                    <input type="password" name="user_password" id="user_password" maxlength="10">
                                                </label>
                                                <div class="note">
                                                    <strong>Note:</strong> For a strong password, please use a hard to guess combination of text with upper and lower
                                                    case characters, symbols and numbers
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label class="label"> Confirm Password ** </label>
                                                <label class="input">
                                                    <input type="password" id="emp_confimpassword" name="emp_confimpassword">
                                                </label>
                                            </section>
                                        </div>
                                    </div>
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
    <script>
        $( document ).ready(function() {
            $("#div_login").hide();
            $('#checkbox-login').change(function () {
                if (this.checked)
                    $('#div_login').fadeIn('slow');
                else
                    $('#div_login').fadeOut('slow');

            });
        });
            // DO NOT REMOVE : GLOBAL FUNCTIONS!

            $(document).ready(function() {

                pageSetUp();
                $('#startdate').datepicker({
                    // format: 'DD - dd MM yyyy'
                });
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
                        }
                    },

                    // Messages for form validation
                    messages : {
                        emp_firstname : {
                            required : 'filed is requried !'
                        },
                        emp_middle_name : {
                            required: 'field is required !'
                        },
                        emp_lastname:{
                            required:'field is required !'
                        },
                        employee_id : {
                            required:'field is required !'
                        }
                    },
                    // Do not change code below
                    errorPlacement : function(error, element) {
                        error.insertAfter(element.parent());
                    }
                });
            });

    </script>
    <script>
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

        {{--function changeProfile() {--}}
            {{--$('#file').click();--}}
        {{--}--}}
        {{--$('#file').change(function () {--}}
            {{--if ($(this).val() != '') {--}}
                {{--upload(this);--}}

            {{--}--}}
        {{--});--}}
        {{--function upload(img) {--}}
            {{--var form_data = new FormData();--}}
            {{--form_data.append('file', img.files[0]);--}}
            {{--form_data.append('_token', '{{csrf_token()}}');--}}
{{--//            form_data = {--}}
{{--//                employee_id : $('#employee_id').val(),--}}
{{--//                emp_lastname: $('#emp_lastname').val(),--}}
{{--//                emp_firstname : $('#emp_firstname').val(),--}}
{{--//                emp_middle_name:$('#emp_middle_name').val(),--}}
{{--//            }--}}
            {{--$('#loading').css('display', 'block');--}}
            {{--$.ajax({--}}
                {{--url: "{{url('administration/ajax-image-upload')}}",--}}
                {{--data: form_data,--}}
                {{--type: 'POST',--}}
                {{--contentType: false,--}}
                {{--processData: false,--}}
                {{--success: function (data) {--}}
                    {{--if (data.fail) {--}}
                        {{--$('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');--}}
                        {{--alert(data.errors['file']);--}}
                    {{--}--}}
                    {{--else {--}}
{{--//                        alert(JSON.stringify(data));--}}
                        {{--$('#file_name').val(data);--}}
                        {{--$('#preview_image').attr('src', '{{asset('uploads')}}/' + data);--}}
                    {{--}--}}
                    {{--$('#loading').css('display', 'none');--}}
                {{--},--}}
                {{--error: function (xhr, status, error) {--}}
                    {{--alert(xhr.responseText);--}}
                    {{--$('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');--}}
                {{--}--}}
            {{--});--}}
        {{--}--}}
        {{--function removeFile() {--}}
            {{--if ($('#file_name').val() != '')--}}
                {{--if (confirm('Are you sure want to remove profile picture?')) {--}}
                    {{--$('#loading').css('display', 'block');--}}
                    {{--var form_data = new FormData();--}}
                    {{--form_data.append('_method', 'DELETE');--}}
                    {{--form_data.append('_token', '{{csrf_token()}}');--}}
                    {{--var filename = $('#file_name').val();--}}
                    {{--alert(filename);--}}
                    {{--$.ajax({--}}
                        {{--url: "ajax-remove-image/"+ filename ,--}}
                        {{--data: form_data,--}}
                        {{--type: 'POST',--}}
                        {{--contentType: false,--}}
                        {{--processData: false,--}}
                        {{--success: function (data) {--}}
                            {{--$('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');--}}
                            {{--$('#file_name').val('');--}}
                            {{--$('#loading').css('display', 'none');--}}
                        {{--},--}}
                        {{--error: function (xhr, status, error) {--}}
                            {{--alert(xhr.responseText);--}}
                            {{--//alert(JSON.stringify(error));--}}
                        {{--}--}}
                    {{--});--}}
                {{--}--}}
        {{--}--}}
    </script>

@endsection