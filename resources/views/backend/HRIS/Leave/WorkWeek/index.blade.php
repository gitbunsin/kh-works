@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <style>
        .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control{
            background: #eee !important;
        }
    </style>
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
                            <br/>
                            <div style="display: none;" class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Success! message sent successfully.
                            </div>
                            @php $id  = 1; @endphp
                            <form id="frmWorkWeek" method="POST" enctype="multipart/form-data" action="{{url('administration/define-workweek/'.$id)}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input name="_method" type="hidden" value="PATCH">


                                <fieldset>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> Monday </label>
                                            <label class="select">
                                                <select class="form-control" name="mon" id="mon">
                                                            <option value="8" {{ $WorkWeek->mon == 8 ? "selected=='selected' ":''}}> Non Working day </option>
                                                            <option value="0" {{ $WorkWeek->mon == 0 ? "selected=='selected' ":''}}> Full Day</option>
                                                            <option value="4" {{ $WorkWeek->mon == 4 ? "selected=='selected' ":''}}> Half Day</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Tuesday </label>
                                            <label class="select">
                                                <select class="form-control" name="tue" id="tue">
                                                    <option value="8" {{ $WorkWeek->tue == 8 ? "selected=='selected' ":''}}> Non Working day </option>
                                                    <option value="0" {{ $WorkWeek->tue == 0 ? "selected=='selected' ":''}}> Full Day</option>
                                                    <option value="4" {{ $WorkWeek->tue == 4 ? "selected=='selected' ":''}}> Half Day</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> Wednesday </label>
                                            <label class="select">
                                                <select class="form-control" name="wed" id="wed">
                                                    <option value="8" {{ $WorkWeek->wed == 8 ? "selected=='selected' ":''}}> Non Working day </option>
                                                    <option value="0" {{ $WorkWeek->wed == 0 ? "selected=='selected' ":''}}> Full Day</option>
                                                    <option value="4" {{ $WorkWeek->wed == 4 ? "selected=='selected' ":''}}> Half Day</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Thursday </label>
                                            <label class="select">
                                                <select class="form-control" name="thu" id="thu">
                                                    <option value="8" {{ $WorkWeek->thu == 8 ? "selected=='selected' ":''}}> Non Working day </option>
                                                    <option value="0" {{ $WorkWeek->thu == 0 ? "selected=='selected' ":''}}> Full Day</option>
                                                    <option value="4" {{ $WorkWeek->thu == 4 ? "selected=='selected' ":''}}> Half Day</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> friday </label>
                                            <label class="select">
                                                <select class="form-control" name="fri" id="fri">
                                                    <option value="8" {{ $WorkWeek->fri == 8 ? "selected=='selected' ":''}}> Non Working day </option>
                                                    <option value="0" {{ $WorkWeek->fri == 0 ? "selected=='selected' ":''}}> Full Day</option>
                                                    <option value="4" {{ $WorkWeek->fri == 4 ? "selected=='selected' ":''}}> Half Day</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Saturday </label>
                                            <label class="select">
                                                <select class="form-control" name="sat" id="sat">
                                                    <option value="8" {{ $WorkWeek->sat == 8 ? "selected=='selected' ":''}}> Non Working day </option>
                                                    <option value="0" {{ $WorkWeek->sat == 0 ? "selected=='selected' ":''}}> Full Day</option>
                                                    <option value="4" {{ $WorkWeek->sat == 4 ? "selected=='selected' ":''}}> Half Day</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                    <section>
                                        <label class="label"> Sunday </label>
                                        <label class="select">
                                            <select class="form-control" name="sun" id="sun">
                                                <option value="8" {{ $WorkWeek->sun == 8 ? "selected=='selected' ":''}}> Non Working day </option>
                                                <option value="0" {{ $WorkWeek->sun == 0 ? "selected=='selected' ":''}}> Full Day</option>
                                                <option value="4" {{ $WorkWeek->sun == 4 ? "selected=='selected' ":''}}> Half Day</option>
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                </fieldset>
                                <footer>
                                    <input type="button" value="" class="btn btn-primary" id="btn_save_week"/>
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

        let baseURL = "{{URL::to('/')}}/";
        $('#mon').prop("disabled", true);
        $('#tue').prop("disabled", true);
        $('#wed').prop("disabled", true);
        $('#thu').prop("disabled", true);
        $('#fri').prop("disabled", true);
        $('#sat').prop("disabled", true);
        $('#sun').prop("disabled", true);
        $('#btn_save_week').val("Edit");
        $('#btn_save_week').click(function () {
            $isEdit = $('#btn_save_week').val();
            if($isEdit =="Edit") {
                $('#mon').prop("disabled", false);
                $('#tue').prop("disabled", false);
                $('#wed').prop("disabled", false);
                $('#thu').prop("disabled", false);
                $('#fri').prop("disabled", false);
                $('#sat').prop("disabled", false);
                $('#sun').prop("disabled", false);
                $('#btn_save_week').val("Save");

            }else{
                $isSave = $('#btn_save_week').val();
                if($isSave == "Save") {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#frmWorkWeek').submit();
            // var formData = {
            //
            //     mon : $('#mon').val(),
            //     tue : $('#tue').val(),
            //     wed : $('#wed').val(),
            //     thu : $('#thu').val(),
            //     fri : $('#fri').val(),
            //     sat : $('#sat').val(),
            //     sun : $('#sun').val(),
            // }
           // alert(JSON.stringify(formData));
           //  var id = 1;
           //  //alert(JSON.stringify(formData));
           //  $.ajax({
           //      url: baseURL+"administration/define-workweek/" + id,
           //      method: "PUT",
           //      type: "json",
           //      data: formData,
           //      success: function (respond) {
           //          DisabledForm();
           //          var Save = $('#btn_save_week').val('Edit');
           //          $('.alert').show();
           //          //$('#msg').html("data insert successfully").fadeIn('slow') //also show a success message
           //          $('.alert').delay(5000).fadeOut('slow');
           //      },
           //      error: function (err) {
           //          console.log(err)
           //      }
           //  });


                }

            }
        });
        function DisabledForm() {

            $('#mon').prop("disabled", true);
            $('#tue').prop("disabled", true);
            $('#wed').prop("disabled", true);
            $('#thu').prop("disabled", true);
            $('#fri').prop("disabled", true);
            $('#sat').prop("disabled", true);
            $('#sun').prop("disabled", true);
        }
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