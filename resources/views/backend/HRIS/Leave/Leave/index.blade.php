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
                                                <input type="text" id="startdate" name="startdate" class="startdate">
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> *  To </label>
                                            <label class="input">
                                                <i class="icon-append fa fa-calendar"></i>
                                                <input type="text" id="finishdate" name="finishdate" class="finishdate">
                                            </label>
                                        </section>
                                    </div>
                                    <section>
                                        @php $LeaveStatus = \App\Model\LeaveStatus::all(); @endphp
                                        <div class="row">
                                            <label class="label col col-2">Show Leave with Status</label>
                                            <div class="inline-group col col-10">
                                                <label class="checkbox">
                                                    <input  onClick="check_uncheck_checkbox(this.checked);" type="checkbox" id="CheckAllStatus">
                                                    <i></i>All
                                                </label>
                                                @foreach($LeaveStatus as $LeaveStatuses)
                                                    <label class="checkbox">
                                                        <input  type="checkbox" name="CheckStatus" id="CheckStatus">
                                                        <i></i>{{$LeaveStatuses->name}}
                                                    </label>
                                                @endforeach
                                            </div>
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
                                                    @php $tracker = \App\Model\Employee::all(); @endphp
                                                    @foreach($tracker as $trackers)
                                                        <option value="{{$trackers->emp_number}}">{{$trackers->emp_lastname}}{{$trackers->emp_firstname}}</option>
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
                                                    @php $SubUnit = \App\Model\SubUnit::all(); @endphp
                                                    @foreach($SubUnit as $SubUnits)
                                                        <option value="{{$SubUnits->id}}">{{$SubUnits->title}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Employment Status * </label>
                                            <label class="select">
                                                <select name="project_name" id="project_name">
                                                    <option value="">-- select Employee Status --</option>
                                                    @php $EmploymentStatus = \App\Model\EmploymentStatus::all(); @endphp
                                                    @foreach($EmploymentStatus as $EmploymentStatuses)
                                                        <option value="{{$EmploymentStatuses->id}}">{{$EmploymentStatuses->name}}</option>
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
                                <tbody id="products-list" name="produc
                                ts-list">
                                @foreach($ListAllLeave as $ListAllLeaves)
                                    <tr id="">
                                        <td>{{$ListAllLeaves->name}}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>{{$ListAllLeaves->no_of_day}}</td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="form-x-editable.html#"
                                               id="sex" data-type="select"
                                               data-pk="1" data-value=""
                                               data-original-title="Select sex"
                                               class="editable editable-click editable-unsaved"
                                               style="color: rgb(128, 128, 128); background-color: rgba(0, 0, 0, 0);">
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
@endsection
@section('script')
    <script>
        function check_uncheck_checkbox(isChecked) {
            if(isChecked) {
                $('input[name="CheckStatus"]').each(function() {
                    this.checked = true;
                });
            } else {
                $('input[name="CheckStatus"]').each(function() {
                    this.checked = false;
                });
            }
        }
        // START AND FINISH DATE
        $('#startdate').datepicker({
            dateFormat: 'yy-mm-dd',
            prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>',
            onSelect: function (selectedDate) {
                $('#finishdate').datepicker('option', 'minDate', selectedDate);
            }
        });
        $('#finishdate').datepicker({
            dateFormat: 'yy-mm-dd',
            prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>',
            onSelect: function (selectedDate) {
                $('#startdate').datepicker('option', 'maxDate', selectedDate);
            }
        });
        $('#sex').editable({
            prepend: " Select Action",
            source: [{
                value: 1,
                text: 'Cancel'
            }, {
                value: 2,
                text: 'Approve'
            }],
            display: function (value, sourceData) {
                var colors = {
                    "": "gray",
                    1: "green",
                    2: "blue"
                }, elem = $.grep(sourceData, function (o) {
                    return o.value == value;
                });

                if (elem.length) {
                    $(this).text(elem[0].text).css("color", colors[value]);
                } else {
                    $(this).empty();
                }
            }
        });
    </script>

@endsection
