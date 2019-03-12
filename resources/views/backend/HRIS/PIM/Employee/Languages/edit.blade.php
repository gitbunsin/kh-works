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
                        <h2> Language </h2>
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
                            <form method="POST" action="{{url('/administration/employee-language/'.$lx->id)}}" id="frmLanguage"  class="smart-form">
                                <input name="_method" type="hidden" value="PATCH">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label">Language</label>
                                            <label class="select">
                                                <select name="lang_id" id="lang_id">
                                                    <option value="">-- select --</option>
                                                    @php $l = \App\Model\language::all(); @endphp
                                                    @foreach($l as $ls)
                                                        <option value="{{$ls->id}}" {{$ls->id == $lx->lang_id ? "selected=='selected' ":''}}>{{$ls->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label">Fluency</label>
                                            <label class="select">
                                                <select name="fluency_id" id="fluency_id">
                                                    @php $p = array('Poor','Basic','Good','Mother Tough'); @endphp
                                                    <option value="">-- select --</option>
                                                    @foreach($p as $ps)
                                                        <option {{$ps==$lx->fluency? "selected=='selected'":''}} value="{{$ps}}">{{$ps}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>

                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> Competency *</label>
                                            <label class="select">
                                                <select name="competency_id" id="competency_id">
                                                    <option value="">-- select --</option>
                                                    @php $f = array('writing','speaking','reading'); @endphp
                                                    @foreach($f as $fs)
                                                        <option value="{{$fs}}" {{$fs == $lx->competency? "selected =='selected'":''}}>{{$fs}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label">comments *</label>
                                            <label class="input">
                                                <input value="{{$lx->comments}}" name="comments_id" id="comments_id" type="text"/>
                                            </label>
                                        </section>
                                    </div>
                                    <footer>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button type="button" class="btn btn-default" onclick="window.history.back();">
                                            Back
                                        </button>
                                    </footer>
                                </fieldset>
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