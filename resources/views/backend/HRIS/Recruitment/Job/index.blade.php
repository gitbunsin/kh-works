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
                                    <th>Company Name</th>
                                    <th>Hiring Manager</th>
                                    <th>Job title</th>
                                    <th>Closing Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="products-list" name="products-list">
                                @foreach($job as $jobs)
                                    <tr id="job_id{{$jobs->job_id}}">
                                        <td>{{Auth::guard('admins')->user()->name}}</td>
                                        <td>{{$jobs->emp_lastname}} {{$jobs->emp_firstname}}</td>
                                        <td>{{$jobs->job_title}}</td>
                                        <td>{{date('d-m-Y', strtotime($jobs->closing_date))}}</td>
                                        <td>
                                            <a href="{{url('administration/post-jobs/'.$jobs->job_id.'/edit')}}" style="text-decoration:none;" class="btn-detail">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                            <a data-id="{{$jobs->job_id}}" href="#" style="text-decoration:none;" class="delete-item">
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
    </section>
    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/JDMcKinstry/JavaScriptDateFormat/master/Date.format.min.js"></script>
@endsection