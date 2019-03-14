@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <section id="widget-grid" class="" xmlns="http://www.w3.org/1999/html">
        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2> Add Leave Entitlement </h2>
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
                            <form id="frmEntitlement" method="POST" enctype="multipart/form-data" action="{{url('administration/add-leave-entitlement')}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"></label>
                                            <div class="inline-group">
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" name="CheckEmployee" id="CheckEmployee" >Add new item type
                                                    <i></i> Add to Multiple Employee
                                                </label>
                                            </div>
                                        </section>

                                    </div>
                                    <div class="row" id="DivShow">
                                        <section class="col col-6">
                                            <label class="label"></label>
                                            <label class="input">
                                                <div class="employee">
                                                    {{--<h6 class="emp_number"> <strong></strong></h6>--}}
                                                    {{--<button type="button" id="emp_number" class="emp_number form-control btn btn-danger"></button>--}}
                                                </div>

                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"></label>
                                            <label class="input">
                                                <div class="employee">
                                                    {{--<h6 class="emp_number"> <strong></strong></h6>--}}
                                                    <button type="button" value="" name="emp_number" id="emp_number" class="emp_number form-control btn btn-danger"/>
                                                </div>
                                                {{--<input type="hidden" value="" id="EmpNumber" name="EmpNumber[]" />--}}
                                            </label>
                                            <section class="hidden" >
                                                <label class="label"> EmpNumber</label>
                                                <label class="select">
                                                    <select name="EmpNumber[]" id="EmpNumber" multiple>
                                                    </select>
                                                    <i></i>
                                                </label>
                                            </section>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Location * </label>
                                            <label class="select">
                                                <select name="location" id="location">
                                                    <option> -- All -- </option>
                                                      @foreach($country as $countries)
                                                            <option>&nbsp; {{$countries->name}}</option>
                                                                @foreach($countries->Location as $locations)
                                                                      <option>&nbsp;&nbsp;&nbsp;&nbsp;  {{$locations->name}}</option>
                                                                @endforeach
                                                      @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Sub Unit * </label>
                                            <label class="select">
                                                <select name="location" id="location">
                                                    <option value="">-- All  --</option>
                                                    {{--@php $SubUnit = \App\Model\SubUnit::all(); @endphp--}}
                                                    @foreach($categories as $category)
                                                        <option>{{$category->title}}</option>
                                                        @if(count($category->childs))
                                                            <option>&nbsp;&nbsp;&nbsp;@include('backend.HRIS.admin.Company.structure.SubUnit',['childs' => $category->childs])</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                            <br/>
                                    <div id="ShowEmployee">
                                        <section class="" id="ShowEmployee">
                                            <label class="label">Employee Name</label>
                                            <div class="form-group">
                                                <select name="EmployeeEntitlement"
                                                        id="EmployeeEntitlement"
                                                        style="width:100%" class="select2 select2-hidden-accessible"
                                                        tabindex="-1" aria-hidden="true">
                                                    <optgroup label="Performance Employee Trackers">
                                                        <option value="">-- select employee --</option>
                                                        @php $tracker = \App\Model\Employee::all(); @endphp
                                                        @foreach($tracker as $trackers)
                                                            <option value="{{$trackers->emp_number}}">{{$trackers->emp_lastname}}{{$trackers->emp_firstname}}</option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                                <div class="note">
                                                    <strong>Usage:</strong> Employee performance tracker
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label class="label"> Leave Type * </label>
                                                <label class="select">
                                                    <select name="leave_type" id="leave_type">
                                                        <option value="">-- select leave type --</option>
                                                        @php $leave_period = \App\Model\LeaveType::all(); @endphp
                                                        @foreach($leave_period as $leave_periods)
                                                            <option value="{{$leave_periods->id}}"> {{$leave_periods->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i></i>
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label class="label"> Leave Period * </label>
                                                <label class="select">
                                                    <select name="leave_period" id="leave_period">
                                                        <option value="">-- select leave periods --</option>
                                                       @php $leave_period = \App\Model\LeavePeriodHistory::all(); @endphp
                                                        @foreach($leave_period as $leave_periods)
                                                            <option value="{{$leave_periods->id}}"> {{$leave_periods->leave_period_start_month}} {{"-"}} {{$leave_periods->leave_period_start_day}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i></i>
                                                </label>
                                            </section>
                                        </div>
                                    <section>
                                        <label class="label">Entitlements  *</label>
                                        <label class="input">
                                            <input type="number" name="entitlements_day" id="entitlements_day">
                                        </label>
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
    $('#DivShow').hide();
    let baseURL = "{{URL::to('/')}}/";
    function CheckEmployeeEntitlement() {
        if($('#CheckEmployee').is(':checked')) {
            $('#DivShow').show({
                duration: 800,
            });
            $('#ShowEmployee').hide();
            $('#CheckEmployee').val('1');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = {}
            $.ajax({
                url: baseURL + "administration/addLeaveEntitlement",
                method: "GET",
                type: "json",
                data: formData,
                success: function (data) {
                    console.log('Success',data);

                    var $brand_options = $("#EmpNumber");
                    $.each(data, function(i , item) {
                        console.log(i,item);
                        $brand_options.append(
                            $("<option/>").val(item.emp_number).text(item.emp_lastname).attr('selected','selected')
                        );
                    });
                    // $.each(data, function(item) {
                    //     console.log(data[item].emp_number);
                    //     $('#EmpNumber').val(data[item].emp_number);
                    // });
                    //         $('#EmpNumber').val(data);
                    // $("article.post").html(temp);
                    //alert(JSON.stringify(respond));
                   $('.emp_number').text("( Matches "  + data.length + " Employees )");

                },
                error: function (err) {
                    console.log(err)
                    //$('.emp_number').hide();
                }
            });

    } else {
            $('#ShowEmployee').show();
            $('#DivShow').hide({
                duration: 800,
            });
            $('#CheckEmployee').val('0');

        }
    }

    $('#CheckEmployee').on('change',function () {
        CheckEmployeeEntitlement();
    });

            var $loginForm = $("#frmEntitlement").validate({
                // Rules for form validation
                rules : {
                    EmployeeEntitlement : {
                        required : true
                    },
                    leave_type : {
                        required: true
                    },
                    leave_period: {
                        required:true
                    },
                    entitlements : {
                        required : true
                    },
                    sub_unit : {
                        required: true
                    },
                    location : {
                        required: true
                    }
                },
                // Do not change code below
                errorPlacement : function(error, element) {
                    error.insertAfter(element.parent());
                }
            });
    </script>
@endsection