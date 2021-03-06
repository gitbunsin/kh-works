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
                            <form method="POST" action="{{url('/administration/employee-license/'.$lx->id)}}" id="frmProducts_license"  class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="PATCH">
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-6">
                                            @php $l = \App\Model\License::all(); @endphp
                                            <label class="label"> License Type</label>
                                            <label class="select">
                                                <select name="license_type_id" id="license_type_id">
                                                    <option value=""> -- Select license -- </option>
                                                    @foreach($l as $ls)
                                                        <option value="{{$ls->id}}" {{$ls->id == $lx->id ? "selected == 'selected'":''}}>{{$ls->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> License Number *</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-joomla"></i>
                                                    <input value="{{$lx->license->name}}" type="number" name="license_number" id="license_number">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available License Number</b> </label>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> Issued Date *</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-calendar"></i>
                                                <input value="{{$lx->issued_date}}" class="datepicker" type="text" name="issued_date" id="issued_date">
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Expiry Date *</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-calendar"></i>
                                                <input value="{{$lx->expiry_date}}" class="datepicker" type="text" name="expiry_date" id="expiry_date">
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
            var $loginForm = $("#frmProducts_license").validate({
                // Rules for form validation
                rules : {
                    license_type_id : {
                        required : true
                    },
                    license_number : {
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