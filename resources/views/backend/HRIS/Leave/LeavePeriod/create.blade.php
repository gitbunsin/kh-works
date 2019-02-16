@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                        {{--@php dd(date('2019 1 1 (Y-m-d)', strtotime(' 5 days'))); @endphp--}}
                        <!-- widget content -->
                        @php
                           // dd(date("Y-m-d", strtotime("2019-02-16 + 365 days"))) @endphp
                        <div class="widget-body no-padding">
                            <form id="frmLeavetype" method="POST" enctype="multipart/form-data" action="{{url('administration/leave-type')}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <fieldset>
                                    <div class="row">
                                    {{--<section class="col col-4">--}}
                                        {{--<label class="label"> Current Years</label>--}}
                                        {{--<label class="select">--}}
                                            {{--<select id="byear" name="byear" required>--}}
                                                {{--<option value="">Select Year</option>--}}
                                                {{--<option value="{{date('Y')}}">{{date('Y')}}</option>--}}
                                            {{--</select>--}}
                                            {{--<i></i>--}}
                                        {{--</label>--}}
                                    {{--</section>--}}
                                        <section class="col col-6">
                                            <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                                <input type="text" name="startdate" id="startdate" placeholder="Expected start date" class="hasDatepicker">
                                            </label>
                                        </section>
                                    <section class="col col-4">
                                        <label class="label"> Start Date</label>
                                        <label class="select">
                                            <select id="bday" name="bday" required disabled>
                                                <option value="">Select Day</option>
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label">End Date</label>
                                            <label class="input">
                                                <span><strong> {{ date("Y-m-d", strtotime( "2019-02-16 + 365 days"))}} </strong></span>
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
    {{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>--}}
    <script type="text/javascript">
        // START AND FINISH DATE
        $('#startdate').datepicker({
            dateFormat : 'dd.mm.yy',
            prevText : '<i class="fa fa-chevron-left"></i>',
            nextText : '<i class="fa fa-chevron-right"></i>'
        });

        {{--function daysInMonth(month, year) {--}}
            {{--return new Date(year, month, 0).getDate();--}}
        {{--}--}}
        {{--$('#byear, #bmonth').change(function() {--}}

            {{--if ($('#byear').val().length > 0 && $('#bmonth').val().length > 0) {--}}
                {{--$('#bday').prop('disabled', false);--}}
                {{--$('#bday').find('option').remove();--}}
                {{--var EndDate = year.concat(month,day);--}}
                {{----}}
                {{--var daysInSelectedMonth = daysInMonth($('#bmonth').val(), $('#byear').val());--}}

                {{--for (var i = 1; i <= daysInSelectedMonth; i++) {--}}
                    {{--$('#bday').append($("<option></option>").attr("value", i).text(i));--}}
                {{--}--}}
            {{--} else {--}}
                {{--$('#bday').prop('disabled', true);--}}
            {{--}--}}

        {{--});--}}
        {{--function GetValue()--}}
        {{--{--}}


        {{--}--}}


        {{--function daysInMonth(month, year) {--}}
            {{--return new Date(year, month, 0).getDate();--}}
        {{--}--}}
        {{--$('#byear, #bmonth').change(function() {--}}

            {{--if ($('#byear').val().length > 0 && $('#bmonth').val().length > 0) {--}}
                {{--$('#bday').prop('disabled', false);--}}
                {{--$('#bmonth').prop('disabled', false);--}}
                {{--$('#bday').find('option').remove();--}}


                {{--var daysInSelectedMonth = daysInMonth($('#bmonth').val(), $('#byear').val());--}}

                {{--for (var i = 1; i <= daysInSelectedMonth; i++) {--}}
                    {{--$('#bday').append($("<option></option>").attr("value", i).text(i));--}}
                {{--}--}}

            {{--} else {--}}
                {{--//alert('ok');--}}
                {{--$('#bday').prop('disabled', true);--}}
            {{--}--}}
        {{--});--}}
        {{--$('#btn_save_leave').val('Edit');--}}
        {{--$('#bmonth').prop('disabled',true);--}}
        {{--$('#bday').prop('disabled',true);--}}
        {{--$('#byear').prop('disabled',true);--}}

        {{--let baseURL = "{{URL::to('/')}}/";--}}
        {{--$('#btn_save_leave').click(function () {--}}
            {{--var IsEdit = $('#btn_save_leave').val();--}}
            {{--if (IsEdit == "Edit") {--}}
                {{--$('#byear').prop('disabled',false);--}}
                {{--$('#btn_save_leave').val('Save');--}}
            {{--} else {--}}
                {{--var Save = $('#btn_save_leave').val();--}}
                {{--if (Save == "Save") {--}}
                    {{--$.ajaxSetup({--}}
                        {{--headers: {--}}
                            {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
                        {{--}--}}
                    {{--});--}}
                    {{--var formData = {--}}
                        {{--start_month : $('#leaveperiod_cmbStartMonth').val(),--}}
                        {{--start_date  :  $('#leaveperiod_cmbStartDate').val(),--}}
                    {{--}--}}
                    {{--$.ajax({--}}
                        {{--url: baseURL + "administration/define-leave-period",--}}
                        {{--method: "POST",--}}
                        {{--type: "json",--}}
                        {{--data: formData,--}}
                        {{--success: function (respond) {--}}
                            {{--//console.log(respond);--}}
                            {{--$('#leaveperiod_cmbStartMonth').prop('disabled',true);--}}
                            {{--$('#leaveperiod_cmbStartDate').prop('disabled',true);--}}
                            {{--$('#btn_save_leave').val('Edit');--}}
                        {{--},--}}
                        {{--error: function (err) {--}}
                            {{--console.log(err)--}}
                        {{--}--}}
                    {{--});--}}
                {{--}--}}
            {{--}--}}
        {{--});--}}
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