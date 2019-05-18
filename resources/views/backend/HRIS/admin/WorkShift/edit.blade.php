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
                        <form id="frmWorkshift" method="POST" enctype="multipart/form-data" action="{{url('administration/work-shift/'.$workShift->id)}}" class="">
                            <div class="widget-body">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="PATCH">
                                <fieldset class="smart-form">
                                    <section>
                                        <label class="label">Name</label>
                                        <label class="input"> <i class="icon-append fa fa-joomla"></i>
                                            <input type="text" value="{{$workShift->name}}" name="name" placeholder="Name">
                                            <b class="tooltip tooltip-bottom-right">Needed to enter available name</b> </label>
                                    </section>
                                    <div class="row">
                                        <section class="col col-5">
                                            <label class="label">From</label>
                                            <label class="select">
                                                <select id="fromDate" class="Time1 valid" name="start_time">
                                                    @php $time = array('9:00','9:15') @endphp
                                                    @foreach($time as $times)
                                                        <option value="{{$times}}"{{$times == Carbon\Carbon::parse($workShift->start_time)->format('H:i') ? "selected='selected'":""}}>{{$times}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-5">
                                            <label class="label">To</label>
                                            <label class="select">
                                                <select id="ToDate" class="Time2 valid" name="end_time">
                                                    @php $time = array('9:00','17:15') @endphp
                                                    @foreach($time as $times)
                                                        <option value="{{$times}}"{{$workShift->end_time == $times ? "selected='selected'":""}}>{{$times}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <label class="label">Durations</label>
                                            <label class="input">
                                                <input type="text" name="hours_per_day" id="duration" value="{{$workShift->hours_per_day}}">
                                            </label>
                                        </section>
                                    </div>
                                </fieldset>
                                <select multiple="multiple" size="10" name="duallistbox_demo2[]" id="initializeDuallistboxCustomWorkshift">
                                    @foreach($emp as  $emps)
                                        <option value="{{$emps->emp_number}}"{{$emps->emp_number}}>{{$emps->emp_lastname}}{{$emps->emp_firstname}}</option>
                                    @endforeach
                                    @foreach($workShift->Employees as $EmployeeWorkShifts)
                                        <option selected value="{{$EmployeeWorkShifts->emp_number}}"{{$EmployeeWorkShifts->emp_number}}>{{$EmployeeWorkShifts->emp_lastname}}{{$EmployeeWorkShifts->emp_firstname}}</option>
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