@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
                                </fieldset>
                                <footer>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                    <button type="submit" class="btn btn-default">Reset</button>
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
                                @foreach($all_leave as $leaveEntitlements)
                                    <tr id="">
                                        <td>{{$leaveEntitlements->from_date}} {{"-"}} {{$leaveEntitlements->to_date}}</td>
                                        <td>{{$leaveEntitlements->emp_lastname}}{{$leaveEntitlements->emp_firstname}}</td>
                                        <td>{{$leaveEntitlements->name}}</td>
                                        <td>{{$leaveEntitlements->no_of_day - $leaveEntitlements->day_used}}</td>
                                        <td>{{$leaveEntitlements->day_used}}</td>
                                        <td></td>
                                        <td>
                                            <a href="" class="update"
                                               data-name="note"
                                               data-type="text"
                                               data-pk=""
                                               data-title="Enter note">
                                            </a>
                                        </td>
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
        $('.update').editable({
            url: '/administration/update-user',
            type: 'text',
            pk: 1,
            name: 'name',
            title: 'Enter note'

        });
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
        function check_uncheck_checkbox(isChecked) {
            // this.checked = true;
            // $('input[name="CheckStatus"]').attr('checked','checked')
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

    </script>
@endsection
