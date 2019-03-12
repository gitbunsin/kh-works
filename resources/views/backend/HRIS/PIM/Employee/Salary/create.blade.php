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
                            <form method="POST" action="{{url('/administration/employee-salary')}}" id="frmBasicSalary"  class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <div class="row">
                                    <section class="col col-6">
                                        @php $PayGrade= \App\Model\PayGrade::all(); @endphp
                                        <label class="label"> PayGrades</label>
                                        <label class="select">
                                            <select name="pay_grade" id="pay_grade">
                                                <option value=""> -- Select -- </option>
                                                @foreach($PayGrade as $PayGrades)
                                                    <option value="{{$PayGrades->id}}">{{$PayGrades->name}}</option>
                                                @endforeach
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                        <section class="col col-6">
                                            <label class="label"> Salary Component *</label>
                                            <label class="input">
                                                <input type="text" name="SalaryComponent" id="SalaryComponent">
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-6">
                                            @php $PayFrequency= \App\Model\Payperiod::all(); @endphp
                                            <label class="label"> Pay Frequency </label>
                                            <label class="select">
                                                <select name="Payperiod" id="Payperiod">
                                                    <option value=""> -- Select -- </option>
                                                    @foreach($PayFrequency as $PayFrequencys)
                                                        <option value="{{$PayFrequencys->id}}">{{$PayFrequencys->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            @php $Currency = \App\Model\currency::all(); @endphp
                                            <label class="label"> Currency </label>
                                            <label class="select">
                                                <select name="currency" id="currency">
                                                    <option value=""> -- Select -- </option>
                                                    @foreach($Currency as $Currencies)
                                                        <option value="{{$Currencies->id}}">{{$Currencies->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> amount *</label>
                                            <label class="input">
                                                <input type="number" maxlength="100" name="ebsal_basic_salary" id="ebsal_basic_salary">
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> comment *</label>
                                            <label class="input">
                                                <textarea id="comment" name="comment" cols="78" rows="5"></textarea>
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
            var $loginForm = $("#frmBasicSalary").validate({
                // Rules for form validation
                rules : {
                    pay_grade : {
                        required : true
                    },
                    currency : {
                        required: true
                    },Payperiod: {
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