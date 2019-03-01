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
                        <h2>Education</h2>
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
                            <form method="POST" action="{{url('/administration/employee-education')}}" id="frmEducation"  class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <fieldset>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">Level</label>
                                            <label class="select">
                                                <select name="level_id" id="level_id">
                                                    <option value="">-- Level --</option>
                                                    @php $e = \App\Education::all(); @endphp
                                                    @foreach($e as $es)
                                                        <option value="{{$es->id}}">{{$es->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Institute *</label>
                                            <label class="input">
                                                <input type="text" name="institute_id" id="institute_id">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Major/Specialization *</label>
                                            <label class="input">
                                                <input type="text" name="major" id="major">
                                            </label>
                                        </section>
                                    </div>
                                    <div>
                                        <div class="row">
                                            <section class="col col-4">
                                                <label class="label"> Year </label>
                                                <label class="input">
                                                    <input value="" type="text" id="year" name="year" class="year">
                                                </label>
                                            </section>
                                            <section class="col col-4">
                                                <label class="label"> GPA/Score </label>
                                                <label class="input">
                                                    <input  value="" type="text" id="gpa_id" name="score" class="gpa_id">
                                                </label>
                                            </section>
                                            <section class="col col-4">
                                                <label class="label"> Start Date </label>
                                                <label class="input">
                                                    <i class="icon-append fa fa-calendar"></i>
                                                    <input value="" type="text" id="start_date" name="start_date" class="datepicker">
                                                </label>
                                            </section>
                                        </div>
                                        <section>
                                            <label class="label"> End Date </label>
                                            <label class="input">
                                                <i class="icon-append fa fa-calendar"></i>
                                                <input value="" type="text" id="end_date" name="end_date" class="datepicker">
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
            var $loginForm = $("#frmExperience").validate({
                // Rules for form validation
                rules : {
                    company : {
                        required : true
                    },
                    job_titles : {
                        required : true
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
@endsection