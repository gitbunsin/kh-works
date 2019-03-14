@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2>Employee Work Shift </h2>
                    </header>
                    <!-- widget div-->
                    <div>
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                        </div>
                        <form id="frmWorkshift" method="POST" enctype="multipart/form-data" action="{{url('administration/work-shift')}}" class="">
                            <div class="widget-body">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="user_id" value="{{Auth::guard('admins')->user()->id}}"/>
                                <fieldset class="smart-form">
                                    <section>
                                        <label class="label">Name</label>
                                        <label class="input">
                                            <input type="text" name="name" id="name">
                                        </label>
                                    </section>
                                    <div class="row">
                                        <section class="col col-5">
                                            <label class="label">From</label>
                                            <label class="select">
                                                <select id="fromDate" class="Time1 valid" name="fromDate">
                                                    <option value="00:00">00:00</option>
                                                    <option value="00:15">00:15</option>
                                                    <option value="00:30">00:30</option>
                                                    <option value="00:45">00:45</option>
                                                    <option value="01:00">01:00</option>
                                                    <option value="01:15">01:15</option>
                                                    <option value="01:30">01:30</option>
                                                    <option value="01:45">01:45</option>
                                                    <option value="02:00">02:00</option>
                                                    <option value="02:15">02:15</option>
                                                    <option value="02:30">02:30</option>
                                                    <option value="02:45">02:45</option>
                                                    <option value="03:00">03:00</option>
                                                    <option value="03:15">03:15</option>
                                                    <option value="03:30">03:30</option>
                                                    <option value="03:45">03:45</option>
                                                    <option value="04:00">04:00</option>
                                                    <option value="04:15">04:15</option>
                                                    <option value="04:30">04:30</option>
                                                    <option value="04:45">04:45</option>
                                                    <option value="05:00">05:00</option>
                                                    <option value="05:15">05:15</option>
                                                    <option value="05:30">05:30</option>
                                                    <option value="05:45">05:45</option>
                                                    <option value="06:00">06:00</option>
                                                    <option value="06:15">06:15</option>
                                                    <option value="06:30">06:30</option>
                                                    <option value="06:45">06:45</option>
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
                                                    <option value="11:00">11:00</option>
                                                    <option value="11:15">11:15</option>
                                                    <option value="11:30">11:30</option>
                                                    <option value="11:45">11:45</option>
                                                    <option value="12:00">12:00</option>
                                                    <option value="12:15">12:15</option>
                                                    <option value="12:30">12:30</option>
                                                    <option value="12:45">12:45</option>
                                                    <option value="13:00">13:00</option>
                                                    <option value="13:15">13:15</option>
                                                    <option value="13:30">13:30</option>
                                                    <option value="13:45">13:45</option>
                                                    <option value="14:00">14:00</option>
                                                    <option value="14:15">14:15</option>
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
                                                    <option value="17:00">17:00</option>
                                                    <option value="17:15">17:15</option>
                                                    <option value="17:30">17:30</option>
                                                    <option value="17:45">17:45</option>
                                                    <option value="18:00">18:00</option>
                                                    <option value="18:15">18:15</option>
                                                    <option value="18:30">18:30</option>
                                                    <option value="18:45">18:45</option>
                                                    <option value="19:00">19:00</option>
                                                    <option value="19:15">19:15</option>
                                                    <option value="19:30">19:30</option>
                                                    <option value="19:45">19:45</option>
                                                    <option value="20:00">20:00</option>
                                                    <option value="20:15">20:15</option>
                                                    <option value="20:30">20:30</option>
                                                    <option value="20:45">20:45</option>
                                                    <option value="21:00">21:00</option>
                                                    <option value="21:15">21:15</option>
                                                    <option value="21:30">21:30</option>
                                                    <option value="21:45">21:45</option>
                                                    <option value="22:00">22:00</option>
                                                    <option value="22:15">22:15</option>
                                                    <option value="22:30">22:30</option>
                                                    <option value="22:45">22:45</option>
                                                    <option value="23:00">23:00</option>
                                                    <option value="23:15">23:15</option>
                                                    <option value="23:30">23:30</option>
                                                    <option value="23:45">23:45</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-5">
                                            <label class="label">To</label>
                                            <label class="select">
                                                <select id="ToDate" class="Time2 valid" name="ToDate">
                                                    <option value="00:00">00:00</option>
                                                    <option value="00:15">00:15</option>
                                                    <option value="00:30">00:30</option>
                                                    <option value="00:45">00:45</option>
                                                    <option value="01:00">01:00</option>
                                                    <option value="01:15">01:15</option>
                                                    <option value="01:30">01:30</option>
                                                    <option value="01:45">01:45</option>
                                                    <option value="02:00">02:00</option>
                                                    <option value="02:15">02:15</option>
                                                    <option value="02:30">02:30</option>
                                                    <option value="02:45">02:45</option>
                                                    <option value="03:00">03:00</option>
                                                    <option value="03:15">03:15</option>
                                                    <option value="03:30">03:30</option>
                                                    <option value="03:45">03:45</option>
                                                    <option value="04:00">04:00</option>
                                                    <option value="04:15">04:15</option>
                                                    <option value="04:30">04:30</option>
                                                    <option value="04:45">04:45</option>
                                                    <option value="05:00">05:00</option>
                                                    <option value="05:15">05:15</option>
                                                    <option value="05:30">05:30</option>
                                                    <option value="05:45">05:45</option>
                                                    <option value="06:00">06:00</option>
                                                    <option value="06:15">06:15</option>
                                                    <option value="06:30">06:30</option>
                                                    <option value="06:45">06:45</option>
                                                    <option value="07:00">07:00</option>
                                                    <option value="07:15">07:15</option>
                                                    <option value="07:30">07:30</option>
                                                    <option value="07:45">07:45</option>
                                                    <option value="08:00">08:00</option>
                                                    <option value="08:15">08:15</option>
                                                    <option value="08:30">08:30</option>
                                                    <option value="08:45">08:45</option>
                                                    <option value="09:00">09:00</option>
                                                    <option value="09:15">09:15</option>
                                                    <option value="09:30">09:30</option>
                                                    <option value="09:45">09:45</option>
                                                    <option value="10:00">10:00</option>
                                                    <option value="10:15">10:15</option>
                                                    <option value="10:30">10:30</option>
                                                    <option value="10:45">10:45</option>
                                                    <option value="11:00">11:00</option>
                                                    <option value="11:15">11:15</option>
                                                    <option value="11:30">11:30</option>
                                                    <option value="11:45">11:45</option>
                                                    <option value="12:00">12:00</option>
                                                    <option value="12:15">12:15</option>
                                                    <option value="12:30">12:30</option>
                                                    <option value="12:45">12:45</option>
                                                    <option value="13:00">13:00</option>
                                                    <option value="13:15">13:15</option>
                                                    <option value="13:30">13:30</option>
                                                    <option value="13:45">13:45</option>
                                                    <option value="14:00">14:00</option>
                                                    <option value="14:15">14:15</option>
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
                                                    <option value="18:30">18:30</option>
                                                    <option value="18:45">18:45</option>
                                                    <option value="19:00">19:00</option>
                                                    <option value="19:15">19:15</option>
                                                    <option value="19:30">19:30</option>
                                                    <option value="19:45">19:45</option>
                                                    <option value="20:00">20:00</option>
                                                    <option value="20:15">20:15</option>
                                                    <option value="20:30">20:30</option>
                                                    <option value="20:45">20:45</option>
                                                    <option value="21:00">21:00</option>
                                                    <option value="21:15">21:15</option>
                                                    <option value="21:30">21:30</option>
                                                    <option value="21:45">21:45</option>
                                                    <option value="22:00">22:00</option>
                                                    <option value="22:15">22:15</option>
                                                    <option value="22:30">22:30</option>
                                                    <option value="22:45">22:45</option>
                                                    <option value="23:00">23:00</option>
                                                    <option value="23:15">23:15</option>
                                                    <option value="23:30">23:30</option>
                                                    <option value="23:45">23:45</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <label class="label">Durations</label>
                                            <label class="input">
                                                <input disabled type="text" name="duration" id="duration" value="">
                                            </label>
                                        </section>
                                    </div>
                                </fieldset>
                                @php  use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\DB;
                                                $e = DB::table('employees')
                                                ->where('company_id',Auth::guard('admins')->user()->id)
                                                ->get();
                                @endphp
                                <select multiple="multiple" size="10" name="duallistbox_demo2[]" id="initializeDuallistboxCustomWorkshift">
                                    @foreach($e as $es)
                                        <option value="{{$es->emp_number}}">{{$es->emp_lastname}}{{$es->emp_firstname}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br/>
                            <!-- end widget content -->
                            <fieldset class="smart-form">
                                <footer>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-default" onclick="window.history.back();">
                                        Back
                                    </button>
                                    <br/>
                                </footer>
                            </fieldset>

                        </form>


                    </div>
                    <!-- end widget div -->
                    <br/>
                </div>
                <!-- end widget -->

            </article>
            <!-- END COL -->
        </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript">

        var demo1 = $('select[name="duallistbox_demo2[]"]').bootstrapDualListbox({
            nonSelectedListLabel: 'Available Reviewers',
            selectedListLabel: 'Assigned Reviewer',
            preserveSelectionOnMove: 'moved',
            moveOnSelect: true,
            helperSelectNamePostfix: '_helper',
            nonSelectedFilter: ''

        });


        $('#duration').val("8:00");
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


            $("#duration").val(result);
        }
        $(".Time1,.Time2").on('change',function () {
            calculate();
        });

        var $loginForm = $("#frmWorkshift").validate({
            // Rules for form validation
            rules : {
                name : {
                    required : true
                },
                hours_per_day : {
                    required : true
                }
            },
            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });
    </script>
@endsection