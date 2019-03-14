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
                            <a style="background: #333;" class="btn btn-primary" href="{{url('administration/vacancy/create')}}" role="button">
                                <i class="glyphicon glyphicon-plus-sign "></i> Add new</a>
                            {{--<button style="background: #333;" id="btn_add" name="btn_add" class="btn btn-default pull-right"><span style="color:white;">Add New Vacancy</span></button>--}}
                        </div>
                    </div>
                </div>
                <br/>
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2>List all Vacancy </h2>

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

                            <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th data-hide="phone">Vacany</th>
                                    <th data-class="expand">Job Tittle</th>
                                    <th data-hide="phone">Hiring Manger</th>
                                    <th data-hide="phone">Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="products-list" name="products-list">
                                @foreach($vacancy as $vacancies)
                                        <tr id="vacancy_id{{$vacancies->id}}">
                                        <td>{{$vacancies->name}}</td>
                                        <td>{{$vacancies->job_titles}}</td>
                                        <td>{{$vacancies->emp_lastname}}</td>
                                        <td>{{$vacancies->description}}</td>
                                        <td>
                                            <a href="{{url('administration/vacancy/'.$vacancies->id.'/edit')}}" style="text-decoration:none;" class="btn-detail">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                            <a data-id="{{$vacancies->id}}" href="" style="text-decoration:none;" class="delete-item">
                                                <i class="glyphicon glyphicon-trash"  style="color:red;"></i>
                                            </a>
                                        </td>
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
                                {{--<h2> Vacancy</h2>--}}
                            {{--</header>--}}
                            {{--<!-- widget div-->--}}
                            {{--<div>--}}
                                {{--<!-- widget edit box -->--}}
                                {{--<div class="jarviswidget-editbox">--}}
                                    {{--<!-- This area used as dropdown edit box -->--}}
                                {{--</div>--}}
                                {{--<!-- widget content -->--}}
                                {{--<div class="widget-body no-padding">--}}
                                    {{--<form id="frmProducts"  class="smart-form">--}}
                                        {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
                                        {{--<fieldset>--}}
                                            {{--<div class="row">--}}
                                                {{--<section class="col col-6">--}}
                                                    {{--<label class="label">Job Title</label>--}}
                                                    {{--<label class="select">--}}
                                                        {{--@php $job_titles = \App\JobTitle::all(); @endphp--}}
                                                        {{--<select name="job_titles_code" id="job_titles_code">--}}
                                                            {{--<option value="0">Choose JobTitle</option>--}}
                                                            {{--@foreach ($job_titles as $job_title)--}}
                                                                {{--<option value="{{$job_title->id}}">{{$job_title->job_titles}}</option>--}}
                                                            {{--@endforeach--}}
                                                        {{--</select>--}}
                                                        {{--<i></i>--}}
                                                    {{--</label>--}}
                                                    {{--<div class="note note-success">Thanks for your selection.</div>--}}
                                                {{--</section>--}}
                                                {{--<section class="col col-6">--}}
                                                    {{--<label class="label">Vacancy Name</label>--}}
                                                    {{--<label class="input">--}}
                                                        {{--<input type="text" name="name" id="name" maxlength="10">--}}
                                                    {{--</label>--}}
                                                {{--</section>--}}
                                            {{--</div>--}}
                                            {{--<section>--}}
                                                {{--<label class="label">Hiring Manager</label>--}}
                                                {{--<label class="select">--}}
                                                    {{--@php use \App\Model\Employee;$employee= Employee::all(); @endphp--}}
                                                    {{--<select name="hiring_manager_id" id="hiring_manager_id">--}}
                                                        {{--<option value="0">Choose Manager</option>--}}
                                                        {{--@foreach($employee as $employees)--}}
                                                            {{--<option value="{{$employees->emp_number}}">{{$employees->emp_lastname}}</option>--}}
                                                        {{--@endforeach--}}
                                                    {{--</select>--}}
                                                    {{--<i></i>--}}
                                                {{--</label>--}}
                                            {{--</section>--}}
                                            {{--<section>--}}
                                                {{--<label class="label">description</label>--}}
                                                {{--<label class="textarea">--}}
                                                    {{--<textarea rows="8" id="description" name="description" class="custom-scroll"></textarea>--}}
                                                {{--</label>--}}
                                                {{--<div class="note">--}}
                                                    {{--<strong>Note:</strong> height of the textarea depends on the rows attribute.--}}
                                                {{--</div>--}}
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
    {{--<script src="{{ asset('/js/hr/vacancy.js') }}"></script>--}}
@endsection