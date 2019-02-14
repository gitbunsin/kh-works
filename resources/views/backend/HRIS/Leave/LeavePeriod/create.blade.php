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
                                    <div class="row">
                                    <section class="col col-6">

                                        <label class="label"> Start Month</label>
                                        <label class="select">
                                            <select name="leaveperiod" id="leaveperiod_cmbStartMonth">
                                                <option value="0">-- Month --</option>
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label class="label"> Start Date</label>
                                        <label class="select">
                                            <select name="leaveperiod" id="leaveperiod_cmbStartDate">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label">End Date</label>
                                            <label class="input">
                                                <span><strong>January 31 (Following Year)</strong></span>
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label">Current Leave Period</label>
                                            <label class="input">
                                                <span><strong>2019-01-01 to 2020-01-31</strong></span>
                                            </label>
                                        </section>
                                    </div>

                                </fieldset>
                                <footer>
                                    <input  type="button" value="" id="btn_save_leave" name="btn_save" class="btn_save btn btn-primary" />
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
        $('#btn_save_leave').val('Edit');
        $('#leaveperiod_cmbStartMonth').prop('disabled',true);
        $('#leaveperiod_cmbStartDate').prop('disabled',true);
        let baseURL = "{{URL::to('/')}}/";
        $('#btn_save_leave').click(function () {
            var IsEdit = $('#btn_save_leave').val();
            if (IsEdit == "Edit") {
                $('#leaveperiod_cmbStartMonth').prop("disabled", false);
                $('#leaveperiod_cmbStartDate').prop("disabled", false);
                $('#btn_save_leave').val('Save');
            } else {
                var Save = $('#btn_save_leave').val();
                if (Save == "Save") {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var formData = {
                        start_month : $('#leaveperiod_cmbStartMonth').val(),
                        start_date  :  $('#leaveperiod_cmbStartDate').val(),
                    }
                    $.ajax({
                        url: baseURL + "administration/define-leave-period",
                        method: "POST",
                        type: "json",
                        data: formData,
                        success: function (respond) {
                            //console.log(respond);
                            $('#leaveperiod_cmbStartMonth').prop('disabled',true);
                            $('#leaveperiod_cmbStartDate').prop('disabled',true);
                            $('#btn_save_leave').val('Edit');
                        },
                        error: function (err) {
                            console.log(err)
                        }
                    });
                }
            }
        });
        $( "#leaveperiod_cmbStartDate" ).change(function() {

            $start_month = $('#leaveperiod_cmbStartMonth').val();
            $start_date = $('#leaveperiod_cmbStartDate').val();

            //alert($start_date);
        });
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