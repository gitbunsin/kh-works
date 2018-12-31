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
                                    <th>Interview Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>note</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($interview as $interviews)
                                    <tr>
                                        <td>{{$interviews->name}}</td>
                                        <td>{{date('Y-m-d')}}</td>
                                        <td><a href="#" class="apply_xeditable" data-type="select" data-name="type" data-value="old value" data-pk="1" data-url="" data-title="Status"></a></td>
                                        <td></td>
                                        <td style="text-align: center;">
                                            <a  href="{{url('administration/download/')}}" style="text-decoration:none;" class="btn-detail open_modal">
                                                <i class="glyphicon glyphicon-align-center "></i>
                                            </a>
                                            <a  href="{{url('administration/download/')}}" style="text-decoration:none;" class="btn-detail open_modal">
                                                <i class="glyphicon glyphicon-calendar "></i>
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
    <script type="text/javascript">
        $(function(){
            $('.apply_xeditable').editable();
        })
    </script>
@endsection