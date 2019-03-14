@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <style>
        .modal-backdrop.in{

            opacity: 0 !important;
        }
        .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control{
            background: #eee !important;
        }
    </style>
    {{--@if (!$CheckExistingDateApplyLeave->isEmpty()) {--}}
    {{--<section id="widget-grid" class="">--}}
    {{--<!-- row -->--}}
    {{--<div class="row">--}}
    {{--<!-- NEW WIDGET START -->--}}
    {{--<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">--}}
    {{--<!-- Widget ID (each widget will need unique ID)-->--}}
    {{--<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">--}}
    {{--<header>--}}
    {{--<span class="widget-icon"> <i class="fa fa-table"></i> </span>--}}
    {{--<h2> List All Job Title</h2>--}}
    {{--</header>--}}

    {{--<!-- widget div-->--}}
    {{--<div>--}}
    {{--<!-- widget edit box -->--}}
    {{--<div class="jarviswidget-editbox">--}}
    {{--<!-- This area used as dropdown edit box -->--}}
    {{--</div>--}}
    {{--<!-- end widget edit box -->--}}
    {{--<!-- widget content -->--}}
    {{--<div class="widget-body no-padding">--}}
    {{--<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">--}}
    {{--<thead>--}}
    {{--<tr>--}}
    {{--<th> Job Title</th>--}}
    {{--<th> Job Description</th>--}}
    {{--<th> Action</th>--}}
    {{--</tr>--}}
    {{--</thead>--}}
    {{--<tbody id="products-list" name="products-list">--}}
    {{--@foreach($JobTitle as $JobTitles)--}}
    {{--<tr id="job_id{{$JobTitles->id}}">--}}
    {{--<td>{{$JobTitles->name}}</td>--}}
    {{--<td>{{$JobTitles->description}}</td>--}}
    {{--<td>--}}
    {{--<a  href="{{url('administration/jobs-title/'.$JobTitles->id.'/edit')}}" style="text-decoration:none;" class="">--}}
    {{--<i class="glyphicon glyphicon-edit"></i>--}}
    {{--</a>--}}

    {{--<form action="{{ url('/administration/jobs-title', ['id' => $JobTitles->id]) }}" style="display:inline" method="post">--}}
    {{--<input type="hidden" name="_method" value="delete" />--}}
    {{--{!! csrf_field() !!}--}}
    {{--<a href="#" target="_blank" data-toggle="confirmation"  data-title="Are You Sure Delete?" class="btn">--}}
    {{--<i class="glyphicon glyphicon-trash"  style="color:red;"></i>--}}
    {{--</a>--}}
    {{--</form>--}}
    {{--</td>--}}
    {{--</tr>--}}
    {{--@endforeach--}}
    {{--</tbody>--}}
    {{--</table>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</article>--}}
    {{--</div>--}}
    {{--</section>--}}
    {{--@endif--}}
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
                                        <label class="label">Employee Name</label>
                                        <div class="form-group">
                                            <select name="employee_tracker"
                                                    id="employee_tracker"
                                                    style="width:100%" class="select2 select2-hidden-accessible"
                                                    tabindex="-1" aria-hidden="true">
                                                <optgroup label="Performance Employee Trackers">
                                                    <option value="">-- select Employee --</option>
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
                                        <section class="col col-2" id="duration_to_date">
                                            <label class="label"> To</label>
                                            <label class="select">
                                                <select id="ToDate" class="Time2 valid" name="duration_to_date">
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
                                        <section class="col col-2" id="start_to_date">
                                            <label class="label"> To</label>
                                            <label class="select">
                                                <select id="ToDate" class="Time2 valid" name="start_day_to_date">
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
                                        <section class="col col-2" id="end_to_date">
                                            <label class="label"> To</label>
                                            <label class="select">
                                                <select id="ToDate" class="Time2 valid" name="End_Day_ToDate">
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
    {{--<span class="hour-1 hour">1</span> hour--}}
    {{--<span class="min-1 min">30</span> min--}}
    {{--<br>--}}
    {{--<span class="hour-2 hour">2</span> hour--}}
    {{--<span class="min-2 min">45</span> min--}}
    {{--<br>--}}
    {{--<span class="hour-3 hour">2</span> hour--}}
    {{--<span class="min-3 min">15</span> min--}}
    {{--<br><br>--}}
    {{--<span class="totalHour">0</span> hour--}}
    {{--<span class="totalMin">0</span> min--}}

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


        //        var minutes = 0;
        //
        //        $('.min').each(function() {
        //            minutes = parseInt($(this).html()) + minutes;
        //        });
        //
        //        var realmin = minutes % 60
        //        var hours = Math.floor(minutes / 60)
        //
        //        $('.hour').each(function() {
        //            hours = parseInt($(this).html()) + hours;
        //        });
        //
        //        $('.totalHour').html(hours);
        //        $('.totalMin').html(realmin);




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