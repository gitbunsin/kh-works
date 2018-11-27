@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                {{--<div class="pull-right">--}}
                    {{--<a href="{{url('administration/cv/create')}}"><h4 class="alert-heading"><i style="font-size:30px;" class="fa fa-plus-square"></i></h4></a>--}}
                {{--</div>--}}
                {{--<br/><br/>--}}
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2> Query CV </h2>
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
                                    <th data-hide="phone">CVs ID</th>
                                    <th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i>Seekers Name</th>
                                    <th data-hide="phone"><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i>Photo</th>
                                    <th data-hide="phone">Experiences</th>
                                    <th>Download</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Cv as $cvs)
                                    <tr>
                                        <td>{{$cvs->id}}</td>
                                        <td>{{$cvs->first_name}}{{$cvs->last_name}}</td>
                                        <td><img width="100px;" height="70px;" src="/uploaded/{{ $cvs->file_name }}"></td>
                                        <td>{{$cvs->file_type}}</td>
                                        <td style="text-align: center;">
                                            <a data-id="{{$cvs->id}}" href="#" style="text-decoration:none;" class="btn-detail open_modal">
                                                <i class="glyphicon glyphicon-download"></i>
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