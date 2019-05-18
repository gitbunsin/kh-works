@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <section id="widget-grid" class="">
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2> Leave List </h2>
                    </header>
                    <div>
                        <div class="jarviswidget-editbox">
                        </div>
                        <div class="widget-body no-padding">
                            <form id="frmReport" method="POST" enctype="multipart/form-data" action="{{url('administration/define-leave-list')}}" class="smart-form">
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
                                                    <input checked  onClick="check_uncheck_checkbox(this.checked);" type="checkbox" id="CheckAllStatus">
                                                    <i></i>All
                                                </label>
                                                @foreach($LeaveStatus as $LeaveStatuses)
                                                    <label class="checkbox">
                                                        <input checked  type="checkbox" name="CheckStatus" id="CheckStatus">
                                                        <i></i>{{$LeaveStatuses->name}}
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </section>
                                    <section>
                                        <label class="label">Employee Name</label>
                                        <div class="form-group">
                                            <select name="employee_leave"
                                                    id="employee_leave"
                                                    style="width:100%" class="select2 select2-hidden-accessible"
                                                    tabindex="-1" aria-hidden="true">
                                                    <option value="0">-- select trackers --</option>
                                                    @php $tracker = \App\Model\Employee::all(); @endphp
                                                    @foreach($tracker as $trackers)
                                                        <option value="{{$trackers->emp_number}}">{{$trackers->emp_lastname}}{{$trackers->emp_firstname}}</option>
                                                    @endforeach
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
                                    <button type="button" class="btn btn-danger" onclick="window.history.back();">Back</button>
                                </footer>
                            </form>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
    <section id="widget-grid" class="">
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2> List  Leave </h2>
                    </header>
                    <div>
                        <div class="jarviswidget-editbox">

                        </div>
                        <div class="widget-body no-padding">
                            <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th  style="width:18%">  Date</th>
                                    <th  style="width:15%">Employee Name</th>
                                    <th> Leave Type</th>
                                    <th  style="width:10%">Balance (days)</th>
                                    <th  style="width:5%">Day</th>
                                    <th> Status </th>
                                    <th> Comments </th>
                                    <th> Actions </th>
                                </tr>
                                </thead>
                                <tbody id="products-list" name="products-list">
                               @if($ListAllLeave)
                                    <tr>
                                        <td>{{$ListAllLeave->date}}</td>
                                        <td>{{$ListAllLeave->employee->emp_firstname}} {{$ListAllLeave->employee->emp_lastname}}</td>
                                        <td>{{$ListAllLeave->leavetype->name}}</td>
                                        <td>{{$ListAllLeave->length_hours}}</td>
                                        <td>{{$ListAllLeave->length_days}}</td>
                                        <td>
                                           <span class="label label-danger">{{$ListAllLeave->leaveStatus->name}}</span>
                                        </td>
                                        <td>
                                            <a href="#"
                                               id="comments"
                                               data-type="textarea"
                                               data-pk="{{$ListAllLeave->id}}"
                                               data-id="{{$ListAllLeave->id}}"
                                               data-placeholder="Your note here..."
                                               data-original-title="Enter notes"
                                               class="editable update editable-pre-wrapped editable-click">{{$ListAllLeave->comment}}</a>
                                        </td>
                                        {{--<td>--}}
                                        <td>
                                            <a href="#"
                                               id="sex"
                                               data-type="select"
                                               data-pk="1"
                                               data-value=""
                                               data-original-title="Select sex"
                                               class="editable approve editable-click editable-unsaved"
                                               style="color: rgb(128, 128, 128); background-color: rgba(0, 0, 0, 0);">
                                                not selected
                                            </a>
                                        </td>
                                    </tr>
                                @endif
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
    <script type="text/javascript">
        $(document).ready(function () {
            $('.alert-success').fadeOut(5000);
            $('[data-toggle=confirmation]').confirmation({
                rootSelector: '[data-toggle=confirmation]',
                onConfirm: function (event, element) {
                    element.closest('form').submit();

                }
            });
        });


        $(document).ready(function () {
            $('.alert-success').fadeOut(5000);
            $('[data-toggle=confirmation1]').confirmation({
                rootSelector: '[data-toggle=confirmation]',
                onConfirm: function (event, element) {
                    element.closest('form').submit();

                }
            });
        });


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
        $(document).ready(function(){
            // $('.edit').editable('/meh.php')
            var leave_id = $('.update').attr('data-id');
            $.ajaxSetup({
                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
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
            },
            pk: leave_id,
            url: '/administration/leave-approve/'+leave_id,
            type: 'text',
            name: 'name',
            title: 'Enter note',
            ajaxOptions: {
                type: 'post'
            },
            success: function (data) {
               // return o.value == value;
                console.log(data);
            },
            error: function () {

            }
        });
            $('.update').editable({
                pk: leave_id,
                url: '/administration/leave-comment/'+leave_id,
                type: 'text',
                name: 'name',
                title: 'Enter note',
                ajaxOptions: {
                    type: 'post'
                },
                success: function (data) {

                    console.log(data);
                },
                error: function () {

                }
            });


            //approve
            // $('.approve').editable({
            //     pk: leave_id,
            //     url: '/administration/leave-comment/'+leave_id,
            //     name: 'name',
            //     title: 'Enter note',
            //     ajaxOptions: {
            //         type: 'post'
            //     },
            //     success: function (data) {
            //
            //         console.log(data);
            //     },
            //     error: function () {
            //
            //     }
            // });
        });
    </script>
@endsection
