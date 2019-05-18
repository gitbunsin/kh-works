@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">
            <!-- a blank row to get started -->
            <div class="col-sm-12 col-lg-12">
                <!-- your contents here -->
                <div class="col-sm-12">

                    <div class="">
                        <div class="row">
                            <h2 class="row-seperator-header"><small>Examples below are done <strong>without</strong> any javascript!</small></h2>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                <div class="well well-sm well-light">
                                    <h4 class="txt-color-blue">Pie <span class="semi-bold">Employees</span> <a href="javascript:void(0);" class="pull-right"><i class="fa fa-refresh"></i></a></h4>
                                    <br>
                                    <div class="">
                                       <i class="fa  fa-4x fa-group txt-color-blueLight">  {{$employee}} </i>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                <div class="well well-sm well-light padding-10">
                                    <h4 class="txt-color-green">Composite <span class="semi-bold">Department</span> <a href="javascript:void(0);" class="pull-right txt-color-green"><i class="fa fa-refresh"></i></a></h4>
                                    <br>
                                    <div class="">
                                        <i class="fa  fa-4x fa-home txt-color-blueLight"></i>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                <div class="well well-sm well-light">
                                    <h4 class="txt-color-blueLight">Bar <span class="semi-bold">Pending Leave</span> <a href="javascript:void(0);" class="pull-right txt-color-blueLight"><i class="fa fa-refresh"></i></a></h4>
                                    <br>
                                    <div class="">
                                        <i class="fa  fa-4x fa-asterisk txt-color-blueLight"></i>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                <div class="well well-sm well-light">
                                    <h4 class="txt-color-blueLight">Bar <span class="semi-bold">TimeSheet</span> <a href="javascript:void(0);" class="pull-right txt-color-blueLight"><i class="fa fa-refresh"></i></a></h4>
                                    <br>
                                    <div class="">
                                        <i class="fa  fa-4x fa-times-circle txt-color-blueLight"></i>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="well padding-10">
                                    <h4 class="txt-color-teal">Line chart variation <a href="javascript:void(0);" class="pull-right txt-color-white"><i class="fa fa-refresh"></i></a></h4>
                                    <br>
                                    <div class="sparkline" data-sparkline-type="line" data-fill-color="#e6f6f5" data-sparkline-line-color="#0aa699" data-sparkline-spotradius="5" data-sparkline-width="100%" data-sparkline-height="180px"><canvas width="541" height="180" style="display: inline-block; width: 541px; height: 180px; vertical-align: top;"></canvas></div>
                                    <h4 class="air air-top-right padding-10 font-xl txt-color-teal">+ 39.<small class="ultra-light txt-color-teal">57 <i class="fa fa-caret-up fa-lg"></i></small></h4>
                                    <h5 class="air air-bottom-left padding-10 font-md text-danger">-12.<small class="ultra-light text-danger">45 <i class="fa fa-caret-down fa-lg"></i></small></h5>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
                </div>

            </div>
        </div>
        <!-- end row -->

    </section>
    {{--<section id="widget-grid" class="">--}}

        {{--<!-- row -->--}}
        {{--<div class="row">--}}
            {{--<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">--}}

                {{--<!-- Widget ID (each widget will need unique ID)-->--}}
                {{--<div class="jarviswidget" id="wid-id-2" data-widget-colorbutton="false" data-widget-fullscreenbutton="false" data-widget-editbutton="false" data-widget-sortable="false">--}}
                    {{--<header>--}}
                        {{--<h2>Bar Chart </h2>--}}

                    {{--</header>--}}

                    {{--<!-- widget div-->--}}
                    {{--<div>--}}

                        {{--<!-- widget edit box -->--}}
                        {{--<div class="jarviswidget-editbox">--}}
                            {{--<!-- This area used as dropdown edit box -->--}}
                            {{--<input class="form-control" type="text">--}}
                        {{--</div>--}}
                        {{--<!-- end widget edit box -->--}}

                        {{--<!-- widget content -->--}}
                        {{--<div class="widget-body">--}}

                            {{--<!-- this is what the user will see -->--}}
                            {{--<canvas id="barChart" height="120"></canvas>--}}

                        {{--</div>--}}
                        {{--<!-- end widget content -->--}}

                    {{--</div>--}}
                    {{--<!-- end widget div -->--}}

                {{--</div>--}}
                {{--<!-- end widget -->--}}
                {{--<!-- end widget -->--}}
            {{--</article>--}}
            {{--<!-- WIDGET END -->--}}
        {{--</div>--}}

        {{--<!-- end row -->--}}

        {{--<!-- row -->--}}

        {{--<div class="row">--}}

            {{--<!-- a blank row to get started -->--}}
            {{--<div class="col-sm-12">--}}
                {{--<!-- your contents here -->--}}
            {{--</div>--}}

        {{--</div>--}}

        {{--<!-- end row -->--}}

    {{--</section>--}}
    <!-- end widget grid -->

    @endsection
@section('script')
   <script type="text/javascript"></script>
    @endsection