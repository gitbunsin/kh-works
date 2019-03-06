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
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2> Assgin Leave</h2>
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
                            <form id="frmLeavetype" method="POST" enctype="multipart/form-data" action="{{url('administration/leave-type')}}" class="smart-form">
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
                                                        <option value="">-- select Employee --</option>
                                                        @php $tracker = \App\Model\Employee::all(); @endphp
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
                                            <label class="label"> Leave Type</label>
                                            <label class="select">
                                                <select name="achievement" id="achievement">
                                                    <option value="">-- select --</option>
                                                    @php $l = \App\Model\LeaveType::all(); @endphp
                                                    @foreach($l as $ls)
                                                        <option value="{{$ls->id}}">{{$ls->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                    <div id="div_balance">
                                        <section>
                                            <label class="label"> Leave Balance</label>
                                            <label class="input">
                                                 <h3 style="color:red;"><a href="#">Hello </a> </h3>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> From Date * </label>
                                            <label class="input">
                                                <i class="icon-append fa fa-calendar"></i>
                                                <input type="text" id="StartDate" name="StartDate" class="StartDate">
                                            </label>
                                        </section>

                                        <section class="col col-6">
                                            <label class="label"> To Date * </label>
                                            <label class="input">
                                                <i class="icon-append fa fa-calendar"></i>
                                                <input type="text" id="EndDate" name="EndDate" class="EndDate">
                                            </label>
                                        </section>

                                    </div>
                                    <section>
                                        <label class="label">Comment *</label>
                                        <label class="input">
                                            <textarea id="postal_address" name="postal_address" rows="10" cols="164"></textarea>
                                        </label>
                                        <div class="note">
                                            <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                        </div>
                                    </section>


                                </fieldset>
                                <footer>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-default" onclick="window.history.back();">
                                        Back
                                    </button>
                                </footer>
                            </form>
                        </div>
                        <!-- end widget content -->

                    </div>
                </div>
            </article>
        </div>
    </section>

@endsection
@section('script')
    <script type="text/javascript">

        // START AND FINISH DATE
        $('#StartDate').datepicker({
            dateFormat: 'yy-mm-dd',
            prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>',
            onSelect: function (selectedDate) {
                $('#EndDate').datepicker('option', 'minDate', selectedDate);
            }
        });
        $('#EndDate').datepicker({
            dateFormat: 'yy-mm-dd',
            prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>',
            onSelect: function (selectedDate) {
                $('#StartDate').datepicker('option', 'maxDate', selectedDate);
            }
        });
        let baseURL = "{{URL::to('/')}}/";
        var $loginForm = $("#frmLeavetype").validate({
            // Rules for form validation
            rules : {
                name : {
                    required : true
                },
            },
            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });
        $("#div_balance").hide();
        $("#employee_tracker").on('change', function () {
            let employeeID = this.value;

            //alert(employeeID);
            if (employeeID != 0) {
                //console.log("Employee ID = ", employeeID);
                /**
                 * 1. Make ajax Request
                 * 2. Append data result as employee option
                 *
                 */
                $.ajax({
                    url: baseURL+"administration/request-leave-balance/" + employeeID,
                    method: "GET",
                    type: "json",
                    success: function (respond) {
                        $("#div_balance").show();
                        //bindEmployeeOption(respond.data)
                    },
                    error: function (err) {
                        console.log(err)
                    }

                });
            }

        });
    </script>
@endsection