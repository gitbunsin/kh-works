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
                            <button style="background: #333;" id="btn_add" name="btn_add" class="btn btn-default pull-right"><span style="color:white;">Add Interview</span></button>
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
                                    <th data-hide="phone">Interview Name</th>
                                    <th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i>Date</th>
                                    <th data-hide="phone"><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i>Time</th>
                                    <th data-hide="posting-date">note</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                {{--<tbody>--}}
                                {{--@foreach($job as $jobs)--}}
                                {{--<tr>--}}
                                {{--<td>{{$jobs->job_title}}</td>--}}
                                {{--<td>{{$jobs->job_description}}</td>--}}
                                {{--<td>{{$jobs->note}}</td>--}}
                                {{--<td>{{$jobs->is_deleted}}</td>--}}
                                {{--<td style="display: flex;"  class="flex">--}}
                                {{--<a href="{{ url('administration/job/' . $jobs->id . '/edit') }}"><button class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-pencil"></span></button></a>--}}
                                {{--<form action="{{url('administration/job/' . $jobs->id)}}" method="post">--}}
                                {{--{{csrf_field()}}--}}
                                {{--<input name="_method" type="hidden" value="DELETE">--}}
                                {{--<a href="{{ url('administration/job/' . $jobs->id) }}"><button class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"></span></button></a>--}}
                                {{--</form>--}}
                                {{--</td>--}}
                                {{--</tr>--}}
                                {{--@endforeach--}}
                                {{--</tbody>--}}
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