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
                            <a style="background: #333;" class="btn btn-primary" href="{{url('administration/jobs-title/create')}}" role="button">
                                <i class="glyphicon glyphicon-plus-sign "></i> Add new</a>
                        </div>
                    </div>
                </div>
                <br/>
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2> List All Job Title</h2>
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
                                    <th data-hide="phone"><i class="hidden-xs"></i>Job Title</th>
                                    <th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i>Job Description</th>
                                    <th data-hide="phone"><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i>Note</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="products-list" name="products-list">
                                @foreach($JobTitle as $jobs)
                                    <tr id="job_id{{$jobs->id}}">
                                        <td>{{$jobs->job_title}}</td>
                                        <td>{{$jobs->job_description}}</td>
                                        <td>{{$jobs->note}}</td>
                                        <td>
                                            <a data-id="{{$jobs->id}}" href="#" style="text-decoration:none;" class="btn-detail open_modal">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                            <a data-id="{{$jobs->id}}" href="#" style="text-decoration:none;" class="delete-item">
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
                                {{--<h2> Job Title</h2>--}}
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
                                            {{--<section>--}}
                                                {{--<label class="label">Job Title</label>--}}
                                                {{--<label class="input">--}}
                                                    {{--<input type="text" class="form-control has-error" id="job_title" name="job_title" placeholder="Job Title" value="">--}}
                                                {{--</label>--}}
                                            {{--</section>--}}
                                            {{--<section>--}}
                                                {{--<label class="label"> Job description</label>--}}
                                                {{--<label class="textarea">--}}
                                                    {{--<input type="text" class="form-control" id="description" name="description" placeholder="Job Description" value="">--}}
                                                {{--</label>--}}
                                                {{--<div class="note">--}}
                                                    {{--<strong>Note:</strong> height of the textarea depends on the rows attribute.--}}
                                                {{--</div>--}}
                                            {{--</section>--}}
                                            {{--<section>--}}
                                                {{--<label class="label"> Noted</label>--}}
                                                {{--<label class="textarea">--}}
                                                    {{--<textarea name="note" id="note" class="form-control" rows="8" cols="5"></textarea>--}}
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    {{--<script src="{{ asset('currenccurrency.js</script>--}}
@endsection
