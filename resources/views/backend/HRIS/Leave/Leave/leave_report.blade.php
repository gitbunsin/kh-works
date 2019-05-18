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
                        <h2> Leave Entitlements and Usage Report </h2>
                    </header>
                    <div>
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                        </div>
                        <div class="widget-body no-padding">
                            <form id="frmReport" method="POST" enctype="multipart/form-data" action="#" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <section>
                                        <label class="label"> Generate For * </label>
                                        <label class="select">
                                            <select name="type" id="type">
                                                <option value="0">-- select --</option>
                                                <option value="Leave Type">Leave Type</option>
                                                <option value="Employee">Employee</option>
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                    <div class="Div_LeavType">
                                        <div class="row">
                                            <section class="col col-4">
                                                <label class="label"> Leave Type * </label>
                                                <label class="select">
                                                    <select name="report_generate" id="report_generate">
                                                        <option value="">-- select --</option>
                                                        @php $LeaveType = \App\Model\LeaveType::all(); @endphp
                                                             @foreach($LeaveType as $LeaveTypes)
                                                                   <option value="{{$LeaveTypes->id}}">{{$LeaveTypes->name}}</option>
                                                            @endforeach
                                                    </select>
                                                    <i></i>
                                                </label>
                                            </section>
                                            <section class="col col-4">
                                                <label class="label">* From </label>
                                                <label class="input">
                                                    <i class="icon-append fa fa-calendar"></i>
                                                    <input type="text" id="date" name="date" class="datepicker">
                                                </label>
                                            </section>
                                            <section class="col col-4">
                                                <label class="label"> Job Title  </label>
                                                <label class="select">
                                                    <select name="report_generate" id="report_generate">
                                                        <option value="">-- select --</option>
                                                        @php $JobTitle = \App\Model\JobTitle::all(); @endphp
                                                        @foreach($JobTitle as $JobTitles)
                                                          <option value="{{$JobTitles->id}}">{{$JobTitles->name}}</option>
                                                            @endforeach
                                                    </select>
                                                    <i></i>
                                                </label>
                                            </section>
                                        </div>

                                        <div class="row">
                                            <section class="col col-4">
                                                <label class="label"> Location </label>
                                                <label class="select">
                                                    <select name="report_generate" id="report_generate">
                                                        <option value="">-- select --</option>
                                                        @php $location = \App\Model\Location::all(); @endphp
                                                        @foreach($location as $locations)
                                                        <option value="{{$locations->id}}">{{$locations->name}}</option>
                                                            @endforeach
                                                    </select>
                                                    <i></i>
                                                </label>
                                            </section>
                                            <section class="col col-4">
                                                <label class="label"> SubUnit </label>
                                                <label class="select">
                                                    <select name="subID" id="subID">
                                                        <option value="">-- select --</option>
                                                        @php $SubUnit= \App\Model\SubUnit::all(); @endphp
                                                        @foreach($SubUnit as $SubUnits)
                                                            <option value="{{$SubUnits->id}}">{{$SubUnits->title}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i></i>
                                                </label>
                                            </section>
                                            <section class="col col-4">
                                                <label class="label"></label>
                                                <div class="inline-group">
                                                    <label class="checkbox">
                                                        <input type="checkbox" id="myCheck">Add new item type
                                                        <i></i> Add to Multiple Employee
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <footer>
                                            <button type="submit" class="btn btn-primary"> View</button>
                                            <button type="button" class="btn btn-default" onclick="window.history.back();">Back</button>
                                        </footer>
                                    </div>
                                    <div class="Div_Employee">
                                        <div class="row">
                                            <section class="col col-6">
                                                <label class="label">Employee Name</label>
                                                <div class="form-group">
                                                    <select name="employee_tracker"
                                                            id="employee_tracker"
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
                                            <section class="col col-6">
                                                <label class="label">* From </label>
                                                <label class="input">
                                                    <i class="icon-append fa fa-calendar"></i>
                                                    <input type="text" id="date" name="date" class="datepicker">
                                                </label>
                                            </section>
                                        </div>
                                        <footer>
                                            <button type="submit" class="btn btn-primary"> View</button>
                                        </footer>
                                    </div>
                                </fieldset>

                            </form>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript">
        $('.Div_LeavType').hide();
        $('.Div_Employee').hide();
        $('#type').change(function(){
            if($('#type').val() == 'Leave Type') {
                $('.Div_LeavType').show({duration:800,});
            } else {
                $('.Div_Employee').hide({duration: 800,});
            }
            if($('#type').val() == 'Employee') {
                $('.Div_Employee').show({duration:800,});
                $('.Div_LeavType').hide();
            } else {
                $('.Div_Employee').hide({duration: 800,});
            }
            if($('#type').val() == '0') {
                $('.Div_Employee').hide();
                $('.Div_LeavType').hide();
            }
        });
        var $loginForm = $("#frmReport").validate({
            // Rules for form validation
            rules : {
                report_generate : {
                    required : true
                },
            },
            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });

        $('#date').datepicker({
            dateFormat: 'yy-mm-dd',
            prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>',
            onSelect: function (selectedDate) {
                $('#finishdate').datepicker('option', 'minDate', selectedDate);
            }
        });
    </script>
@endsection