@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a style="background: #333;" class="btn btn-primary" href="{{url('administration/post-jobs/create')}}" role="button">
                                <i class="glyphicon glyphicon-plus-sign "></i> Add new</a>
                        </div>
                    </div>
                </div>
                <br/>
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2> List all Jobs</h2>
                    </header>
                    <!-- widget div-->
                    <div>
                        <!-- end widget edit box -->

                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th data-hide="phone">Compnay Name</th>
                                    <th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i>Contact Name</th>
                                    <th data-hide="phone"><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i>Job title</th>
                                    <th data-hide="posting-date">Posting Date</th>
                                    <th data-hide="closing-date">Closing Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="products-list" name="products-list">
                                @foreach($job as $jobs)
                                    <tr id="job_id{{$jobs->id}}">
                                        <td>{{$jobs->CompanyName}}</td>
                                        <td>{{$jobs->ContactName}}</td>
                                        <td>{{$jobs->job_title}}</td>
                                        <td>{{$jobs->postingDate}}</td>
                                        <td>{{$jobs->ClosingDate}}</td>
                                        <td>
                                            <a href="{{url('administration/post-jobs/'.$jobs->id.'/edit')}}" style="text-decoration:none;" class="btn-detail">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                            <a data-id="{{$jobs->id}}" href="#" style="text-decoration:none;" class="delete-item">
                                                <i class="glyphicon glyphicon-trash"  style="color:red;"></i>
                                            </a>
                                        </td>
                                        {{--<td>--}}
                                            {{--<a data-id="{{$jobs->id}}" href="#" style="text-decoration:none;" class="btn-detail open_modal">--}}
                                                {{--<i class="glyphicon glyphicon-edit"></i>--}}
                                            {{--</a>--}}
                                            {{--<a data-id="{{$jobs->id}}" href="#" style="text-decoration:none;" class="delete-item">--}}
                                                {{--<i class="glyphicon glyphicon-trash"  style="color:red;"></i>--}}
                                            {{--</a>--}}
                                        {{--</td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        {{--<input id="url" type="hidden" value="{{ \Request::url() }}">--}}
        {{--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
            {{--<div class="modal-dialog modal-lg">--}}
                {{--<div class="modal-content">--}}
                {{--<div class="modal-body">--}}
                    {{--<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">--}}
                        {{--<!-- Widget ID (each widget will need unique ID)-->--}}
                        {{--<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">--}}
                            {{--<header>--}}
                                {{--<span class="widget-icon"> <i class="fa fa-table"></i> </span>--}}
                                {{--<h2> JOB</h2>--}}
                            {{--</header>--}}
                            {{--<!-- widget div-->--}}
                            {{--<div>--}}
                                {{--<!-- widget edit box -->--}}
                                {{--<div class="jarviswidget-editbox">--}}
                                    {{--<!-- This area used as dropdown edit box -->--}}
                                {{--</div>--}}
                                {{--<!-- widget content -->--}}
                                {{--<div class="widget-body no-padding">--}}
                                    {{--<form action="{{url("administration/post-jobs/create")}}" id="frmProducts"  class="smart-form">--}}
                                        {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
                                        {{--<fieldset>--}}
                                            {{--<section>--}}
                                                {{--<label class="label"> Job Title</label>--}}
                                                {{--<label class="select">--}}
                                                    {{--@php use App\JobTitle;$Job_Title= JobTitle::all(); @endphp--}}
                                                    {{--<select name="job_title_code" id="job_title_code">--}}
                                                        {{--<option value="0">Choose Manager</option>--}}
                                                        {{--@foreach($Job_Title as $Job_Titles)--}}
                                                            {{--<option value="{{$Job_Titles->id}}">{{$Job_Titles->job_title}}</option>--}}
                                                        {{--@endforeach--}}
                                                    {{--</select>--}}
                                                    {{--<i></i>--}}
                                                {{--</label>--}}
                                            {{--</section>--}}
                                            {{--<section>--}}
                                                {{--<label class="label">Job Types</label>--}}
                                                {{--<div class="inline-group">--}}
                                                    {{--<label class="radio">--}}
                                                        {{--<input value="Full time" type="radio" name="radio-inline" id="job_type">--}}
                                                        {{--<i></i>Full time--}}
                                                    {{--</label>--}}
                                                    {{--<label class="radio">--}}
                                                        {{--<input type="radio" value="Part Time" id="job_type" name="radio-inline">--}}
                                                        {{--<i></i>Part Time--}}
                                                    {{--</label>--}}
                                                    {{--<label class="radio">--}}
                                                        {{--<input type="radio" value="Freelance" id="job_type" name="radio-inline">--}}
                                                        {{--<i></i>Freelance</label>--}}
                                                    {{--<label class="radio">--}}
                                                        {{--<input type="radio" value="Contract" id="job_type" name="radio-inline">--}}
                                                        {{--<i></i>Contract</label>--}}
                                                {{--</div>--}}
                                            {{--</section>--}}
                                            {{--<div class="row">--}}
                                                {{--<section class="col col-6">--}}
                                                    {{--<label class="label">Title for your job*</label>--}}
                                                    {{--<label class="input">--}}
                                                        {{--<input type="text" id="name" name="name" class="custom-scroll">--}}
                                                    {{--</label>--}}
                                                    {{--<div class="note">--}}
                                                        {{--<strong>Note:</strong> height of the textarea depends on the rows attribute.--}}
                                                    {{--</div>--}}
                                                {{--</section>--}}
                                                {{--<section class="col col-6">--}}
                                                    {{--<label class="label"> City</label>--}}
                                                    {{--<label class="select">--}}
                                                        {{--<select name="city" id="city">--}}
                                                            {{--<option value="1">Phnom Penh</option>--}}
                                                            {{--<option value="2" >Banlung</option>--}}
                                                            {{--<option value="3" >Banteay Meanchey</option>--}}
                                                        {{--</select>--}}
                                                        {{--<i></i>--}}
                                                    {{--</label>--}}
                                                {{--</section>--}}
                                            {{--</div>--}}
                                            {{--<div class="row">--}}
                                                {{--<section class="col col-4">--}}
                                                    {{--<label class="label"> Salary*</label>--}}
                                                    {{--<label class="input">--}}
                                                        {{--<input type="number" id="mix" name="mix" placeholder="mix ($)" class="custom-scroll">--}}
                                                    {{--</label>--}}
                                                    {{--<div class="note">--}}
                                                        {{--<strong>Note:</strong> height of the textarea depends on the rows attribute.--}}
                                                    {{--</div>--}}
                                                {{--</section>--}}
                                                {{--<section class="col col-4">--}}
                                                    {{--<label class="label">**</label>--}}
                                                    {{--<label class="input">--}}
                                                        {{--<input type="number" id="max" name="max" placeholder="max ($)">--}}
                                                    {{--</label>--}}
                                                {{--</section>--}}
                                                {{--<section class="col col-4">--}}
                                                    {{--<label class="label"> Negotiable *</label>--}}
                                                    {{--<div class="inline-group">--}}
                                                        {{--<label class="radio">--}}
                                                            {{--<input type="radio" name="radio-inline" id="negotiable">--}}
                                                            {{--<i></i></label>--}}
                                                    {{--</div>--}}
                                                {{--</section>--}}
                                            {{--</div>--}}
                                            {{--<div class="row">--}}
                                                {{--<section class="col col-4">--}}
                                                    {{--<label class="label"> Salary Types</label>--}}
                                                    {{--<label class="select">--}}
                                                        {{--<select name="salary_type" id="salary_type">--}}
                                                            {{--<option value="1">Per Hour</option>--}}
                                                            {{--<option value="2">Daily</option>--}}
                                                            {{--<option value="1">Monthly</option>--}}
                                                            {{--<option value="2">Yearly</option>--}}
                                                        {{--</select>--}}
                                                        {{--<i></i>--}}
                                                    {{--</label>--}}
                                                {{--</section>--}}
                                                {{--<section class="col col-4">--}}
                                                    {{--<label class="label"> Experience *</label>--}}
                                                    {{--<label class="select">--}}
                                                        {{--<select name="salary_type" id="salary_type">--}}
                                                            {{--<option value="1">Mid Level</option>--}}
                                                            {{--<option value="2">Mid Level</option>--}}
                                                            {{--<option value="1">Mid-Senior Level</option>--}}
                                                            {{--<option value="2">Top Level</option>--}}
                                                        {{--</select>--}}
                                                        {{--<i></i>--}}
                                                    {{--</label>--}}
                                                {{--</section>--}}
                                                {{--<section class="col col-4">--}}
                                                    {{--<label class="label"> JobResponsible **</label>--}}
                                                    {{--<label class="input">--}}
                                                        {{--<input placeholder="human,resource,job,hrm" type="text" name="" id="">--}}
                                                    {{--</label>--}}
                                                {{--</section>--}}
                                            {{--</div>--}}
                                            {{--<section>--}}
                                                {{--<header>--}}
                                                    {{--<span class="widget-icon"> <i class="fa fa-pencil"></i> </span>--}}
                                                    {{--<h2>Job Description </h2>--}}
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

                                                        {{--<textarea id="note" name="ckeditor"></textarea>--}}

                                                    {{--</div>--}}
                                                    {{--<!-- end widget content -->--}}
                                                {{--</div>--}}
                                                {{--<!-- end widget div -->--}}
                                            {{--</section>--}}
                                            {{--<section>--}}
                                                {{--<label class="label"> Job Required *</label>--}}
                                                {{--<label class="textarea">--}}
                                                    {{--<textarea placeholder="address" name="address" cols="40" rows="6"></textarea>--}}
                                                {{--</label>--}}
                                            {{--</section>--}}
                                            {{--<div class="row">--}}
                                                {{--<section class="col col-4">--}}
                                                    {{--<label class="label"> Posting Date </label>--}}
                                                    {{--<label class="input">--}}
                                                        {{--<i class="icon-append fa fa-calendar"></i>--}}
                                                        {{--<input type="text" id="date-of-application" name="postingDate" placeholder="Request activation on" class="datepicker">--}}
                                                    {{--</label>--}}
                                                {{--</section>--}}
                                                {{--<section class="col col-4">--}}
                                                    {{--<label class="label"> Closing Date </label>--}}
                                                    {{--<label class="input">--}}
                                                        {{--<i class="icon-append fa fa-calendar"></i>--}}
                                                        {{--<input type="text" id="date-of-application" name="postingDate" placeholder="Request activation on" class="datepicker">--}}
                                                    {{--</label>--}}
                                                {{--</section>--}}
                                            {{--</div>--}}
                                            {{--<hr>--}}
                                            {{--<br/>--}}
                                            {{--<h5><strong>Company Profiles</strong></h5>--}}
                                            {{--<br/>--}}
                                            {{--<div class="row">--}}
                                                {{--<section class="col col-6">--}}
                                                    {{--<label class="label">Company Name*</label>--}}
                                                    {{--<label class="input">--}}
                                                        {{--<input id="CompanyName" placeholder="CompanyName" type="text" name="CompanyName">--}}
                                                    {{--</label>--}}
                                                {{--</section>--}}
                                                {{--<section class="col col-6">--}}
                                                    {{--<label class="label">Contact Name * </label>--}}
                                                    {{--<label class="input">--}}
                                                        {{--<input type="text" name="ContactName" id="ContactName" placeholder="Maketing and Advertising">--}}
                                                    {{--</label>--}}
                                                {{--</section>--}}
                                            {{--</div>--}}
                                            {{--<div class="row">--}}
                                                {{--<section class="col col-6">--}}
                                                    {{--<label class="label">Email ID *</label>--}}
                                                    {{--<label class="input">--}}
                                                        {{--<input id="email" placeholder="" type="text" name="email">--}}
                                                    {{--</label>--}}
                                                {{--</section>--}}
                                                {{--<section class="col col-6">--}}
                                                    {{--<label class="label">Mobile Number *</label>--}}
                                                    {{--<label class="input">--}}
                                                        {{--<input placeholder="ex, 962711117" type="text" name="mobile">--}}
                                                    {{--</label>--}}
                                                {{--</section>--}}
                                            {{--</div>--}}
                                            {{--<section>--}}
                                                {{--<label class="label"> Address *</label>--}}
                                                {{--<label class="textarea">--}}
                                                    {{--<textarea placeholder="address" name="address" cols="40" rows="6"></textarea>--}}
                                                {{--</label>--}}
                                            {{--</section>--}}

                                            {{--<section>--}}
                                                {{--<label class="label">Active</label>--}}
                                                {{--<div class="inline-group">--}}
                                                    {{--<label class="checkbox">--}}
                                                        {{--<input  type="checkbox"  name="checkbox-inline" checked>--}}
                                                        {{--<i></i>--}}
                                                    {{--</label>--}}
                                                    {{--<label class="checkbox">--}}
                                                        {{--<input type="checkbox" name="checkbox-inline" checked>--}}
                                                        {{--<i></i>Publish in RSS feed(1) and web page(2)--}}
                                                    {{--</label>--}}
                                                {{--</div>--}}
                                            {{--</section>--}}
                                        {{--</fieldset>--}}
                                        {{--<footer>--}}
                                            {{--<input type="button" class="btn btn-primary" id="btn-save" value="add">--}}
                                            {{--<input type="hidden" id="product_id" name="product_id" value="0">--}}
                                            {{--<button type="button" class="btn btn-default" id="btnclose" data-dismiss="modal">Close</button>--}}
                                        {{--</footer>--}}
                                    {{--</form>--}}
                                {{--</div>--}}
                                {{--<!-- end widget content -->--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</article>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </section>
    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/JDMcKinstry/JavaScriptDateFormat/master/Date.format.min.js"></script>
    <script src="{{ asset('/js/hr/job.js') }}"></script>
@endsection