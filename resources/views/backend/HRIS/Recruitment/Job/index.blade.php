@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="pull-right">
                    <a href="{{url('administration/post-jobs/create')}}"><h4 class="alert-heading"><i style="font-size:30px;" class="fa fa-plus-square"></i></h4></a>
                </div>
                <br/><br/>
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
                                <tbody>
                                @foreach($job as $jobs)
                                    <tr>
                                        <td>{{$jobs->CompanyName}}</td>
                                        <td>{{$jobs->ContactName}}</td>
                                        <td>{{$jobs->job_title}}</td>
                                        <td>{{date('d-m-Y'),$jobs->postingDate}}</td>
                                        <td>{{date('d-m-Y'),$jobs->ClosingDate}}</td>
                                        <td>
                                            <a href="#" style="text-decoration:none;" class="btn-detail">
                                                <i class="glyphicon glyphicon-edit " title="History" ></i>
                                            </a> &nbsp;&nbsp;
                                            <a href="#" style="text-decoration:none;">
                                                <i class="glyphicon glyphicon-trash" title="Delete Sender Id" style="color:red;"></i>
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
@endsection