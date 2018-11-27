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
                            <button style="background: #333;" id="btn_add" name="btn_add" class="btn btn-default pull-right"><span style="color:white;">Add Job Category</span></button>
                        </div>
                    </div>
                </div>
                <br/>
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2> List All Job Category</h2>
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
                                    <th data-hide="phone"><i class="hidden-xs"></i>Job Category</th>
                                    <th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="products-list" name="products-list">
                                @foreach($JobCategory as $JobCategorys)
                                    <tr id="category_id{{$JobCategorys->id}}">
                                        <td>{{$JobCategorys->name}}</td>
                                        <td>{{$JobCategorys->description}}</td>
                                        <td>
                                            <a data-id="{{$JobCategorys->id}}" href="#" style="text-decoration:none;" class="btn-detail open_modal">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                            <a data-id="{{$JobCategorys->id}}" href="#" style="text-decoration:none;" class="delete-item">
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
        <input id="url" type="hidden" value="{{ \Request::url() }}">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                {{--<div class="modal-content">--}}
                <div class="modal-body">
                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <!-- Widget ID (each widget will need unique ID)-->
                        <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                            <header>
                                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                <h2> Job Category</h2>
                            </header>
                            <!-- widget div-->
                            <div>
                                <!-- widget edit box -->
                                <div class="jarviswidget-editbox">
                                    <!-- This area used as dropdown edit box -->
                                </div>
                                <!-- widget content -->
                                <div class="widget-body no-padding">
                                    <form id="frmProducts"  class="smart-form">
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <fieldset>
                                            <section>
                                                <label class="label">Job Category</label>
                                                <label class="input">
                                                    <input type="text" class="form-control has-error" id="name" name="name" placeholder="Job Title" value="">
                                                </label>
                                            </section>
                                            <section>
                                                <label class="label"> description</label>
                                                <label class="textarea">
                                                    <textarea name="description" id="description" rows="5" cols="5"></textarea>
                                                </label>
                                                <div class="note">
                                                    <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                                </div>
                                            </section>
                                        </fieldset>
                                        <footer>
                                            <input type="button" class="btn btn-primary" id="btn-save" value="add">
                                            <input type="hidden" id="product_id" name="product_id" value="0">
                                            <button type="button" class="btn btn-default" id="btnclose" data-dismiss="modal">Close</button>
                                        </footer>
                                    </form>
                                </div>
                                <!-- end widget content -->
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{ asset('/js/hr/jobcategory.js') }}"></script>
@endsection
