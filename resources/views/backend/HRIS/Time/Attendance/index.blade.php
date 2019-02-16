@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2> View Attendance Record</h2>
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
                            <form id="frmProject" method="POST" enctype="multipart/form-data" action="{{url('administration/defined-project')}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <div class="row">
                                    <section class="col col-6">
                                        <label class="label">Employee Name</label>
                                        <div class="form-group">
                                            <select name="employee_tracker"
                                                    id="employee_tracker"
                                                    style="width:100%" class="select2 select2-hidden-accessible"
                                                    tabindex="-1" aria-hidden="true">
                                                <optgroup label="Performance Employee Trackers">
                                                    <option value="0">-- select trackers --</option>
                                                    @php $tracker = \App\Employee::all(); @endphp
                                                    @foreach($tracker as $trackers)
                                                        <option value="{{$trackers->emp_id}}">{{$trackers->emp_lastname}}{{$trackers->emp_firstname}}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                            <div class="note">
                                                <strong>Usage:</strong> Employee performance tracker
                                            </div>
                                        </div>
                                    </section>
                                        <section class="col col-6">
                                            <label class="label"> Date </label>
                                            <label class="input">
                                                <i class="icon-append fa fa-calendar"></i>
                                                <input type="text" id="end_date" name="end_date" class="datepicker">
                                            </label>
                                        </section>
                                    </div>
                                </fieldset>
                                <footer>
                                    <button type="submit" class="btn btn-primary">View</button>
                                </footer>
                            </form>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                {{--<div class="row">--}}
                    {{--<div class="col-lg-12 margin-tb">--}}

                        {{--<div class="pull-right">--}}
                            {{--<a style="background: #333;" class="btn btn-primary" href="{{url('administration/defined-project/create')}}" role="button">--}}
                                {{--<i class="glyphicon glyphicon-plus-sign "></i> Add new</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<br/>--}}
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        {{--<span class="widget-icon"> <i class="fa fa-table"></i> </span>--}}
                        {{--<h2> List Project</h2>--}}
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
                                    <th> Employee Name</th>
                                    <th> Punch In </th>
                                    <th> Punch In Note</th>
                                    <th> Punch Out</th>
                                    <th> Punch Out Note</th>
                                    <th> Duration (Hour)</th>
                                    <th> Total</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
@endsection