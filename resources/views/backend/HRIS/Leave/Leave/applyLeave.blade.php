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
                            <form id="frmLeavetype" method="POST" enctype="multipart/form-data" action="{{url('administration/leave-type')}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                        <section>
                                            <label class="label"> Leave Type</label>
                                            <label class="select">
                                                <select name="leave_type" id="leave_type">
                                                    <option value="">-- select --</option>
                                                    @php $l = \App\LeaveType::all(); @endphp
                                                    @foreach($l as $ls)
                                                        <option value="{{$ls->id}}">{{$ls->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    <div id="div_balance">
                                        <section>
                                            <label class="label"> Leave Balance</label>
                                            <label class="input">
                                                <h3 style="color:red;"><a href="#">Hello </a> </h3>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> From Date * </label>
                                            <label class="input">
                                                <i class="icon-append fa fa-calendar"></i>
                                                <input type="text" id="date" name="date" class="datepicker">
                                            </label>
                                        </section>

                                        <section class="col col-6">
                                            <label class="label"> To Date * </label>
                                            <label class="input">
                                                <i class="icon-append fa fa-calendar"></i>
                                                <input type="text" id="date" name="date" class="datepicker">
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
                                                    <option value="1">Half Days</option>
                                                    <option value="2">Specific time</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-3">
                                            <label class="label"> - - -</label>
                                            <label class="select">
                                                <select name="partial_day" id="partial_day">
                                                    <option value="1">Morning</option>
                                                    <option value="2">Afternoon</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-2" id="duration_from_date">
                                            <label class="label"> From</label>
                                            <label class="select">
                                                <select name="partial_day" id="partial_day">
                                                    <option value="1">Morning</option>
                                                    <option value="2">Afternoon</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-2" id="duration_to_date">
                                            <label class="label"> To</label>
                                            <label class="select">
                                                <select name="partial_day" id="partial_day">
                                                    <option value="1">Morning</option>
                                                    <option value="2">Afternoon</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-1" id="duration_duration">
                                            <label class="label"> Duration </label>
                                            <label class="input">
                                                <input type="text" disabled id="duration" name="duration" class="">
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row" id="start_days">
                                        <section class="col col-3">
                                            <label class="label"> Start Day </label>
                                            <label class="select">
                                                <select name="partial_day" id="partial_day">
                                                    <option value="1">Half Days</option>
                                                    <option value="2">Specific time</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-3">
                                            <label class="label"> - - -</label>
                                            <label class="select">
                                                <select name="partial_day" id="partial_day">
                                                    <option value="1">Morning</option>
                                                    <option value="2">Afternoon</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-2" id="from_date">
                                            <label class="label"> From</label>
                                            <label class="select">
                                                <select name="partial_day" id="partial_day">
                                                    <option value="1">Morning</option>
                                                    <option value="2">Afternoon</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <label class="label"> To</label>
                                            <label class="select">
                                                <select name="partial_day" id="partial_day">
                                                    <option value="1">Morning</option>
                                                    <option value="2">Afternoon</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-1">
                                            <label class="label"> Duration </label>
                                            <label class="input">
                                                <input type="text" disabled id="duration" name="duration" class="">
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row" id="end_days">
                                        <section class="col col-3">
                                            <label class="label"> End Day </label>
                                            <label class="select">
                                                <select name="partial_day" id="partial_day">
                                                    <option value="1">Half Days</option>
                                                    <option value="2">Specific time</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-3">
                                            <label class="label"> - - -</label>
                                            <label class="select">
                                                <select name="partial_day" id="partial_day">
                                                    <option value="1">Morning</option>
                                                    <option value="2">Afternoon</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-2" id="duration_from_date">
                                            <label class="label"> From</label>
                                            <label class="select">
                                                <select name="" id="partial_day">
                                                    <option value="1">Morning</option>
                                                    <option value="2">Afternoon</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <label class="label"> To</label>
                                            <label class="select">
                                                <select name="partial_day" id="partial_day">
                                                    <option value="1">Morning</option>
                                                    <option value="2">Afternoon</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-1">
                                            <label class="label"> Duration </label>
                                            <label class="input">
                                                <input type="text" disabled id="duration" name="duration" class="">
                                            </label>
                                        </section>
                                    </div>

                                    <section>
                                        <label class="label">Comment *</label>
                                        <label class="input">
                                            <textarea id="postal_address" name="postal_address" rows="10" cols="164"></textarea>
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
        let baseURL = "{{URL::to('/')}}/";
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
        $("#div_balance").hide();
        $('#end_days').hide();
        $('#start_days').hide();
        $('#duration').hide();
        $('#duration_from_date').hide();
        $('#duration_to_date').hide();
        $('#duration_duration').hide();


        $('#duration_half_day').on('change',function () {
             var sp = $('#duration_half_day').val();
             if(sp == "2"){
                 $('#duration_from_date').show({duration: 800,});
                 $('#duration_to_date').show({duration : 800 ,})
                 $('#duration_duration').show({duration : 800 ,})
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




        });
        $("#leave_type").on('change', function () {
            let employeeID = this.value;

            //alert(employeeID);
            if (employeeID != 0) {
                //console.log("Employee ID = ", employeeID);
                /**
                 * 1. Make ajax Request
                 * 2. Append data result as employee option
                 *
                 */
                $.ajax({
                    url: baseURL+"administration/request-leave-balance/" + employeeID,
                    method: "GET",
                    type: "json",
                    success: function (respond) {
                        $("#div_balance").show();
                        //bindEmployeeOption(respond.data)
                    },
                    error: function (err) {
                        console.log(err)
                    }

                });
            }

        });
    </script>
@endsection