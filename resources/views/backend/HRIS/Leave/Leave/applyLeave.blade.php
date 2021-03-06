@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <section id="widget-grid" class="">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            Leave Details
                            {{--<img src="img/logo.png" width="150" alt="SmartAdmin">--}}
                        </h4>
                    </div>
                    <div class="modal-body no-padding">

                        <form id="login-form" class="smart-form">

                            <fieldset>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <b>As of Date: 2019-03-11</b>

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Entitled</th>
                                        <th>Taken</th>
                                        <th>Scheduled</th>
                                        <th>Pending Approval</th>
                                        <th>Leave Balance</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td> 0.0</td>
                                        <td> 0.0</td>
                                        <td> 0.0</td>
                                        <td> 0.0</td>
                                        <td> 18 </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </fieldset>

                            <footer>
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    OK
                                </button>

                            </footer>
                        </form>


                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <input id="url" type="hidden" value="{{ \Request::url() }}">
                <!-- Modal -->

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2> Apply Leave</h2>
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
                            <form id="frmLeavetype" method="POST" enctype="multipart/form-data" action="{{url('administration/leave-request')}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                        <section>
                                            <label class="label"> Leave Type</label>
                                            <label class="select">
                                                <select name="leave_type" id="leave_type">
                                                    <option value="">-- select --</option>
                                                    @php $LeaveType = \App\Model\LeaveType::all(); @endphp
                                                    @foreach($LeaveType as $LeaveTypes)
                                                        <option value="{{$LeaveTypes->id}}">{{$LeaveTypes->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    <div id="div_balance">
                                        <section>
                                            <div class="row">
                                            <label class="label col col-2"> Leave Balance</label>
                                            <label class="input col col-1">
                                                {{--<h3 id="leave_balance_id" style="color:red;"> </h3>--}}
                                                <button id="leave_balance_id" type="button" class="btn btn-danger form-control" data-toggle="modal" data-target="">
                                                    {{--View Leave Details--}}
                                                </button>
                                            </label>
                                                <label class="input col col-2">
                                                    <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#exampleModal">
                                                        View Leave Details
                                                    </button>

                                                    {{--<button  id="leave_balance_id" type="button" class="btn btn-danger form-control">View Leave Details</button>--}}
                                                </label>

                                            </div>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> From Date</label>
                                            <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                                <input type="text" name="startdate" id="startdate" placeholder="">
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> To Date</label>
                                            <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                                <input type="text" name="finishdate" id="finishdate" placeholder="">
                                            </label>
                                        </section>
                                    </div>
                                    <section>
                                        <label class="label"> Partial Days</label>
                                        <label class="select">
                                            <select name="partial_day" id="partial_day">
                                                <option value="">-- None --</option>
                                                    <option value="1">All Days</option>
                                                    <option value="2">Start Day Only</option>
                                                    <option value="3">End Day Only</option>
                                                    <option value="4">Start and End Day</option>
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                    <div class="row" id="duration">
                                        <section class="col col-3">
                                            <label class="label"> Duration </label>
                                            <label class="select">
                                                <select name="duration_half_day" id="duration_half_day">
                                                    <option value="4">Half Days</option>
                                                    <option value="2">Specific time</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-3" id="duration_morning">
                                            <label class="label"> - - -</label>
                                            <label class="select">
                                                <select name="duration_morning" id="duration_morning">
                                                    <option value="0.5">Morning</option>
                                                    <option value="0.5">Afternoon</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-2" id="duration_from_date">
                                            <label class="label"> From</label>
                                            <label class="select">
                                                <select id="fromDate" class="Time1 valid" name="duration_from_date">
                                                    <option value="07:45">07:45</option>
                                                    <option value="08:00">08:00</option>
                                                    <option value="08:15">08:15</option>
                                                    <option value="08:30">08:30</option>
                                                    <option value="08:45">08:45</option>
                                                    <option selected value="09:00">09:00</option>
                                                    <option value="09:15">09:15</option>
                                                    <option value="09:30">09:30</option>
                                                    <option value="09:45">09:45</option>
                                                    <option value="10:00">10:00</option>
                                                    <option value="10:15">10:15</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-2" id="duration_to_date">
                                            <label class="label"> To</label>
                                            <label class="select">
                                                <select id="ToDate" class="Time2 valid" name="duration_to_date">
                                                    <option value="15:30">15:30</option>
                                                    <option value="15:45">15:45</option>
                                                    <option value="16:00">16:00</option>
                                                    <option value="16:15">16:15</option>
                                                    <option value="16:30">16:30</option>
                                                    <option value="16:45">16:45</option>
                                                    <option selected value="17:00">17:00</option>
                                                    <option value="17:15">17:15</option>
                                                    <option value="17:30">17:30</option>
                                                    <option value="17:45">17:45</option>
                                                    <option value="18:00">18:00</option>
                                                    <option value="18:15">18:15</option>
                                                    <option value="18:30">18:30</option>
                                                    <option value="18:45">18:45</option>
                                                    <option value="19:00">19:00</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-1" id="duration_duration">
                                            <label class="label"> Duration </label>
                                            <label class="input">
                                                <input type="text" value="" disabled id="duration_Duration" name="duration_Duration" class="form-control">
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row" id="start_days">
                                        <section class="col col-3">
                                            <label class="label"> Start Day </label>
                                            <label class="select">
                                                <select name="start_day" id="start_day">
                                                    <option value="4">Half Days</option>
                                                    <option value="2">Specific time</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-3" id="start_date_morning">
                                            <label class="label"> - - -</label>
                                            <label class="select">
                                                <select name="start_date_morning" id="start_date_morning">
                                                    <option value="0.5">Morning</option>
                                                    <option value="0.5">Afternoon</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-2" id="start_from_date">
                                            <label class="label"> From</label>
                                            <label class="select">
                                                <select id="fromDate" class="Time1 valid" name="start_day_from_date">

                                                    <option value="07:00">07:00</option>
                                                    <option value="07:15">07:15</option>
                                                    <option value="07:30">07:30</option>
                                                    <option value="07:45">07:45</option>
                                                    <option value="08:00">08:00</option>
                                                    <option value="08:15">08:15</option>
                                                    <option value="08:30">08:30</option>
                                                    <option value="08:45">08:45</option>
                                                    <option selected value="09:00">09:00</option>
                                                    <option value="09:15">09:15</option>
                                                    <option value="09:30">09:30</option>
                                                    <option value="09:45">09:45</option>
                                                    <option value="10:00">10:00</option>
                                                    <option value="10:15">10:15</option>
                                                    <option value="10:30">10:30</option>
                                                    <option value="10:45">10:45</option>

                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-2" id="start_to_date">
                                            <label class="label"> To</label>
                                            <label class="select">
                                                <select id="ToDate" class="Time2 valid" name="start_day_to_date">

                                                    <option value="14:30">14:30</option>
                                                    <option value="14:45">14:45</option>
                                                    <option value="15:00">15:00</option>
                                                    <option value="15:15">15:15</option>
                                                    <option value="15:30">15:30</option>
                                                    <option value="15:45">15:45</option>
                                                    <option value="16:00">16:00</option>
                                                    <option value="16:15">16:15</option>
                                                    <option value="16:30">16:30</option>
                                                    <option value="16:45">16:45</option>
                                                    <option selected value="17:00">17:00</option>
                                                    <option value="17:15">17:15</option>
                                                    <option value="17:30">17:30</option>
                                                    <option value="17:45">17:45</option>
                                                    <option value="18:00">18:00</option>
                                                    <option value="18:15">18:15</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-1" id="start_date_duration">
                                            <label class="label"> Duration </label>
                                            <label class="input">
                                                <input type="text" disabled id="duration_start_Day" name="duration_start_Day" class="form-control">
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row" id="end_days">
                                        <section class="col col-3">
                                            <label class="label"> End Day </label>
                                            <label class="select">
                                                <select name="end_date" id="end_date">
                                                    <option value="4">Half Days</option>
                                                    <option value="2">Specific time</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-3" id="end_date_morning">
                                            <label class="label"> - - -</label>
                                            <label class="select">
                                                <select name="end_date_morning" id="end_date_morning">
                                                    <option value="0.5">Morning</option>
                                                    <option value="0.5">Afternoon</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-2" id="end_from_date">
                                            <label class="label"> From</label>
                                            <label class="select">
                                                <select id="fromDate" class="Time1 valid" name="End_Day_fromDate">
                                                    <option value="07:00">07:00</option>
                                                    <option value="07:15">07:15</option>
                                                    <option value="07:30">07:30</option>
                                                    <option value="07:45">07:45</option>
                                                    <option value="08:00">08:00</option>
                                                    <option value="08:15">08:15</option>
                                                    <option value="08:30">08:30</option>
                                                    <option value="08:45">08:45</option>
                                                    <option selected value="09:00">09:00</option>
                                                    <option value="09:15">09:15</option>
                                                    <option value="09:30">09:30</option>
                                                    <option value="09:45">09:45</option>
                                                    <option value="10:00">10:00</option>
                                                    <option value="10:15">10:15</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-2" id="end_to_date">
                                            <label class="label"> To</label>
                                            <label class="select">
                                                <select id="ToDate" class="Time2 valid" name="End_Day_ToDate">
                                                    <option value="15:45">15:45</option>
                                                    <option value="16:00">16:00</option>
                                                    <option value="16:15">16:15</option>
                                                    <option value="16:30">16:30</option>
                                                    <option value="16:45">16:45</option>
                                                    <option selected value="17:00">17:00</option>
                                                    <option value="17:15">17:15</option>
                                                    <option value="17:30">17:30</option>
                                                    <option value="17:45">17:45</option>
                                                    <option value="18:00">18:00</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-1" id="end_duration">
                                            <label class="label"> Duration </label>
                                            <label class="input">
                                                <input type="text" disabled id="duration_end_date" name="duration_end_date" class="form-control">
                                            </label>
                                        </section>
                                    </div>

                                    <section>
                                        <label class="label">Comment *</label>
                                        <label class="input">
                                            <textarea id="comments" name="comments" rows="10" cols="164"></textarea>
                                        </label>
                                        <div class="note">
                                            <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                        </div>
                                    </section>


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


    <script type="text/javascript">


        $('#duration_Duration').val("8:00");
        $('#duration_start_Day').val("8:00");
        $('#duration_end_date').val("8:00");
        function calculate() {
            // var hours = parseInt($(".Time2").val().split(':')[1], 10) - parseInt($(".Time1").val().split(':')[1], 10);
            // console.log("success",hours);
            var StartTime = $('.Time1').val();
            var Endtime = $('.Time2').val();
            var  s = StartTime.split(':');
            var   e = Endtime.split(':');

            var min = e[1]-s[1];
            var hour_carry = 0;
            if(min < 0){
                min += 60;
                hour_carry += 1;
            }
            var hour = e[0]-s[0]-hour_carry;
            var   result = hour + ":" + min;


            $("#duration_Duration").val(result);
        }
        $(".Time1,.Time2").on('change',function () {
            calculate();
        });

        // START AND FINISH DATE
        $('#startdate').datepicker({
        	dateFormat: 'yy-mm-dd',
        	prevText: '<i class="fa fa-chevron-left"></i>',
        	nextText: '<i class="fa fa-chevron-right"></i>',
        	onSelect: function (selectedDate) {
        		$('#finishdate').datepicker('option', 'minDate', selectedDate);
        	}
        });
        $('#finishdate').datepicker({
        	dateFormat: 'yy-mm-dd',
        	prevText: '<i class="fa fa-chevron-left"></i>',
        	nextText: '<i class="fa fa-chevron-right"></i>',
        	onSelect: function (selectedDate) {
        		$('#startdate').datepicker('option', 'maxDate', selectedDate);
        	}
        });

        //alert(url);
        //Display Leave Details
        $(document).on('click','#leave_balance_id',function(){
            //var url = $('#url').val();
           //alert(url);
           // var emergency_id = $(this).attr('data-id');
            // alert(emergency_id);
            // Populate Data in Edit Modal Form
            //('administration/job/' . $jobs->id . '/edit')
            $.ajax({
                type: "GET",
                url: '/administration/display-leave-details',
                success: function (data) {
                    //console.log(data);
                    // alert(JSON.stringify(data.eec_name));
                    $('#exampleModal').modal('show');
                    $(".modal-backdrop.in").hide();

                },
                error: function (data) {
                    alert(JSON.stringify(data));
                    console.log('Error:', data);
                }
            });
        });

        let baseURL = "{{URL::to('/')}}/";
        $("#leave_type").on('change', function () {
            let leave_id = this.value;
          //  console.log("Data",leave_id);
            //alert(employeeID);
            if (leave_id != 0) {
               // console.log("Leave ID = ", leave_id);
                /**
                 * 1. Make ajax Request
                 * 2. Append data result as employee option
                 *
                 */
                $.ajax({
                    url: baseURL+"administration/request-leave-balance/" + leave_id,
                    method: "GET",
                    type: "json",
                    success: function (respond) {
                       console.log('Data',respond);
                        $("#div_balance").show();
                        // var no_of_day = parseFloat(respond.no_of_day)
                        // var day_used = parseFloat(respond.day_used)
                        $("#leave_balance_id").text( respond.no_of_day - respond.day_used);
                        //console.log("Leave balance = ", respond);
                        //bindEmployeeOption(respond.data)
                    },
                    error: function (err) {
                        console.log(err)
                    }

                });
            }else{

                $("#div_balance").hide();
            }

        });
        var $loginForm = $("#frmLeavetype").validate({
            // Rules for form validation
            rules : {
                leave_type : {
                    required : true
                },
                from_date  : {
                    required: true
                },
                to_date : {
                    required : true
                }

            },
            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });
        $("#div_balance").hide();
        $('#end_days').hide();
        $('#start_days').hide();
        $('#duration').hide();

        $('#duration_from_date').hide();
        $('#duration_to_date').hide();
        $('#duration_duration').hide();


        $('#start_from_date').hide();
        $('#start_to_date').hide();
        $('#start_date_duration').hide();

        //Edn date
        $('#end_from_date').hide();
        $('#end_to_date').hide();
        $('#end_duration').hide();



        $('#duration_half_day').on('change',function () {
             var sp = $('#duration_half_day').val();
             if(sp == "2"){
                 $('#duration_morning').hide();
                 $('#duration_from_date').show({duration: 800,});
                 $('#duration_to_date').show({duration : 800 ,})
                 $('#duration_duration').show({duration : 800 ,})
             }
             if(sp == "4"){
                 $('#duration_morning').show({duration: 800,});
                 $('#duration_from_date').hide();
                 $('#duration_to_date').hide();
                 $('#duration_duration').hide();
             }
        });
        //Start Date

        $('#start_day').on('change',function () {
            var sp = $('#start_day').val();
            if(sp == "4"){
                $('#start_date_morning').show({duration: 800,})
                $('#start_from_date').hide();
                $('#start_to_date').hide();
                $('#start_date_duration').hide();
            }
            if(sp == "2"){
                $('#start_date_morning').hide();
                $('#start_from_date').show({duration: 800,})
                $('#start_to_date').show({duration: 800,})
                $('#start_date_duration').show({duration: 800,})
            }
        });

        //Eed Date
        $('#end_date').on('change',function () {
            var sp = $('#end_date').val();
            if(sp == "4"){
                $('#end_date_morning').show({duration: 800,})
                $('#end_from_date').hide();
                $('#end_to_date').hide();
                $('#end_duration').hide();
            }
            if(sp == "2"){

               $('#end_date_morning').hide();
                $('#end_from_date').show({duration: 800,})
                $('#end_to_date').show({duration: 800,})
                $('#end_duration').show({duration: 800,})
            }
        });



        $('#partial_day').on('change', function (){
            var all_day = $('#partial_day').val();
            // var specifictime = $('#duration_half_day').val();
            // alert(specifictime);
             if(all_day == "1"){
                 $('#end_days').hide();
                 $('#start_days').hide();
                 $('#duration').show({duration:800,});
             }
             if(all_day == "2"){
                 $('#duration').hide();
                 $('#start_days').show({duration: 800,});
                 $('#end_days').hide();
             }
             if(all_day == "3"){
                 $('#start_days').hide();
                 $('#end_days').show({duration:800,});
             }
             if(all_day == "4")
             {
                 $('#duration').hide();
                 $('#start_days').show({duration: 800,});
                 $('#end_days').show({duration:800,});
             }
             if(all_day == ""){

                 $("#div_balance").hide();
                 $('#end_days').hide();
                 $('#start_days').hide();
                 $('#duration').hide();

                 $('#duration_from_date').hide();
                 $('#duration_to_date').hide();
                 $('#duration_duration').hide();


                 $('#start_from_date').hide();
                 $('#start_to_date').hide();
                 $('#start_date_duration').hide();

                 //Edn date
                 $('#end_from_date').hide();
                 $('#end_to_date').hide();
                 $('#end_duration').hide();
             }
        });

    </script>
@endsection