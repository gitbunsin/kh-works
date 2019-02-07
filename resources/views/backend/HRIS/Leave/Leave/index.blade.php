@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
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
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2> Leave List </h2>
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
                            <form id="frmReport" method="POST" enctype="multipart/form-data" action="{{url('administration/defined-project')}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label">* From </label>
                                            <label class="input">
                                                <i class="icon-append fa fa-calendar"></i>
                                                <input type="text" id="date" name="date" class="datepicker">
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> *  To </label>
                                            <label class="input">
                                                <i class="icon-append fa fa-calendar"></i>
                                                <input type="text" id="date" name="date" class="datepicker">
                                            </label>
                                        </section>
                                    </div> <section>
                                        <label class="label">Show Leave with Status</label>
                                        <div class="inline-group">
                                            <label class="checkbox">
                                                <input type="checkbox" id="myCheck">
                                                <i></i> All
                                            </label>
                                            <label class="checkbox">
                                                <input type="checkbox" id="myCheck">
                                                <i></i> Rejected
                                            </label>
                                            <label class="checkbox">
                                                <input type="checkbox" id="myCheck">
                                                <i></i> Cancelled
                                            </label>
                                            <label class="checkbox">
                                                <input type="checkbox" id="myCheck">
                                                <i></i>Pending Approval
                                            </label>
                                            <label class="checkbox">
                                                <input type="checkbox" id="myCheck">
                                                <i></i>Scheduled
                                            </label>
                                            <label class="checkbox">
                                                <input type="checkbox" id="myCheck">
                                                <i></i> Taken
                                            </label>
                                        </div>
                                    </section>

                                    <section>
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
                                    <div  class="row">
                                   <section class="col col-6">
                                            <label class="label"> SubUnit * </label>
                                            <label class="select">
                                                <select name="project_name" id="project_name">
                                                    <option value="">-- select Sub Unit --</option>
                                                    @php $location = \App\Location::all(); @endphp
                                                    @foreach($location as $locations)
                                                        <option value="{{$locations->id}}">{{$locations->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Employeement Status * </label>
                                            <label class="select">
                                                <select name="project_name" id="project_name">
                                                    <option value="">-- select Employee Status --</option>
                                                    @php $location = \App\Location::all(); @endphp
                                                    @foreach($location as $locations)
                                                        <option value="{{$locations->id}}">{{$locations->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                    <section>
                                        <label class="label"></label>
                                        <div class="inline-group">
                                            <label class="checkbox">
                                                <input type="checkbox" id="myCheck">
                                                <i></i> Include Past Employees
                                            </label>
                                        </div>
                                    </section>
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
                            {{--<a style="background: #333;" class="btn btn-primary" href="{{url('administration/leave-type/create')}}" role="button">--}}
                                {{--<i class="glyphicon glyphicon-plus-sign "></i> Add new</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<br/>--}}
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2> List  Leave </h2>
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
                                    <th> Date</th>
                                    <th> Employee Name</th>
                                    <th> Leave Type</th>
                                    <th> Leave Balance (days)</th>
                                    <th> Number of Day</th>
                                    <th> Status </th>
                                    <th> Comments </th>
                                    <th> Actions </th>
                                </tr>
                                </thead>
                                {{--<tbody id="products-list" name="products-list">--}}
                                {{--@foreach($l as $ls)--}}
                                    {{--<tr id="job_id{{$ls->id}}">--}}
                                        {{--<td>{{$ls->name}}</td>--}}
                                        {{--<td>{{$ls->description}}</td>--}}
                                        {{--<td>--}}
                                            {{--<a  href="{{url('administration/leave-type/'.$ls->id.'/edit')}}" style="text-decoration:none;" class="btn-detail open_modal">--}}
                                                {{--<i class="glyphicon glyphicon-edit"></i>--}}
                                            {{--</a>--}}
                                            {{--<a data-id="{{$ls->id}}" href="#" style="text-decoration:none;" class="delete-item">--}}
                                                {{--<i class="glyphicon glyphicon-trash"  style="color:red;"></i>--}}
                                            {{--</a>--}}
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
@endsection
