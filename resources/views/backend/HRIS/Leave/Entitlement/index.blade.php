@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <section id="widget-grid" class="" xmlns="http://www.w3.org/1999/html">
        <!-- row -->
        <style>
            li ul.treeview-menu{
                padding: 10px;
            }
        </style>
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
                                                    <input type="checkbox" id="myCheck" >Add new item type
                                                    <i></i> Add to Multiple Employee
                                                </label>
                                            </div>
                                        </section>

                                    </div>
                                    <div class="row" id="div_show">
                                        <section>
                                            <label class="label"></label>
                                            <label class="input">
                                                <div class="employee">
                                                    <h6 class="emp_number"> <strong></strong></h6>
                                                </div>

                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Location * </label>
                                            <label class="select">
                                                <select name="location" id="location">
                                                    <option value="">-- select location --</option>
                                                    @php $location = \App\Location::all(); @endphp
                                                    @foreach($location as $locations)
                                                        <option value="{{$locations->id}}">{{$locations->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Sub Unit * </label>
                                            <label class="select">
                                                <select name="location" id="location">
                                                    <option value="">-- select location --</option>
                                                    @foreach($categories as $category)
                                                           @if(count($category->childs))
                                                            <li class="treeview">
                                                                <a href="#"><i class="fa fa-link"></i>
                                                                    <span>
                                                                        <option value="">{{ $category->title }}&nbsp;</option>
                                                                    </span>
                                                                    <i class="fa fa-angle-left pull-right"></i>
                                                                </a>
                                                                <ul class="treeview-menu">
                                                                    <option value="">@include('backend.HRIS.admin.Company.structure.manageChild',['childs' => $category->childs])&nbsp;</option>
                                                                </ul>
                                                            </li>
                                                        @else
                                                            <li><a href="#"><i class="fa fa-link"></i> <span>
                                                                         <option value="">{{ $category->title }}&nbsp;</option>
                                                                    </span></a></li>
                                                        @endif
                                                    @endforeach
                                                           {{--@endif--}}
                                                       {{----}}
                                                        {{--@endforeach--}}
                                                    {{--@foreach($categories as $category)--}}
                                                        {{--@if($category->has('allCategories'))--}}
                                                            {{--<li class="treeview">--}}
                                                                {{--<a href="#"><i class="fa fa-link"></i> <span>{{ $category->title }}</span>--}}
                                                                    {{--<i class="fa fa-angle-left pull-right"></i></a>--}}
                                                                {{--<ul class="treeview-menu">--}}
                                                                    {{--@foreach($category->allCategories as $subcategory)--}}
                                                                        {{--<li class=""><a href="#">{{$subcategory->childs}}</a></li>--}}
                                                                    {{--@endforeach--}}
                                                                {{--</ul>--}}
                                                            {{--</li>--}}
                                                        {{--@else--}}
                                                            {{--<li><a href="#"><i class="fa fa-link"></i> <span>{{ $category->title }}</span></a></li>--}}
                                                        {{--@endif--}}
                                                    {{--@endforeach--}}
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                            <br/>
                                        <section>
                                            <label class="label">Employee Name</label>
                                            <div class="form-group">
                                                <select name="employee_entitlement"
                                                        id="employee_entitlement"
                                                        style="width:100%" class="select2 select2-hidden-accessible"
                                                        tabindex="-1" aria-hidden="true">
                                                    <optgroup label="Performance Employee Trackers">
                                                        <option value="">-- select employee --</option>
                                                        @php $tracker = \App\Employee::all(); @endphp
                                                        @foreach($tracker as $trackers)
                                                            <option value="{{$trackers->emp_id}}">{{$trackers->emp_lastname}}{{$trackers->emp_firstname}}</option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                                <div class="note">
                                                    <strong>Usage:</strong> Employee performance tracker
                                                </div>
                                            </div>
                                        </section>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label class="label"> Leave Type * </label>
                                                <label class="select">
                                                    <select name="leave_type" id="leave_type">
                                                        <option value="">-- select leave type --</option>
                                                        @php $leave_period = \App\LeaveType::all(); @endphp
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
                                                        <option value="1"> 2019-01-01 - 2019-12-31</option>
                                                       {{--@php $leave_period = \App\LeavePeriod::all(); @endphp--}}
                                                        {{--@foreach($leave_period as $leave_periods)--}}
                                                            {{--<option value="{{$leave_periods->id}}"> {{$leave_periods->leave_period_start_month}}</option>--}}
                                                        {{--@endforeach--}}
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
    $('#div_show').hide();
    let baseURL = "{{URL::to('/')}}/";
    function checkval() {

        if ($('#myCheck').is(':checked')) {
            $('#div_show').show({
                duration: 800,
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = {}
            $.ajax({
                url: baseURL + "administration/viewMatchEmployee",
                method: "GET",
                type: "json",
                data: formData,
                success: function (respond) {
                    //alert(JSON.stringify(respond));
                    $('.emp_number').text("( Matches "  + respond + " Employees )");
                    $('.emp_number').css({"margin-left":"600px","margin-top":"-43px"});
                },
                error: function (err) {
                    console.log(err)
                    //$('.emp_number').hide();
                }
            });

    } else {
            $('#div_show').hide({
                duration: 800,
            });
        }

    }

    $(function () {
        checkval(); // this is launched on load
        $('#myCheck').click(function () {
             checkval();
            $('#employee_id').show();
        });

    });
            var $loginForm = $("#frmEntitlement").validate({
                // Rules for form validation
                rules : {
                    employee_entitlement : {
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