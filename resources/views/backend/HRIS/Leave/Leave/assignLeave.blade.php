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
                                            <label class="label"> Leave Type</label>
                                            <label class="select">
                                                <select name="achievement" id="achievement">
                                                    <option value="">-- select --</option>
                                                    @php $l = \App\LeaveType::all(); @endphp
                                                    @foreach($l as $ls)
                                                        <option value="{{$ls->id}}">{{$ls->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                    <section>
                                        <label class="label"> Leave Balance</label>
                                        <label class="input">
                                            <input type="text" name="name" id="name">
                                        </label>
                                    </section>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> From Date * </label>
                                            <label class="input">
                                                <i class="icon-append fa fa-calendar"></i>
                                                <input type="text" id="date" name="date" class="datepicker">
                                            </label>
                                        </section>

                                        <section class="col col-6">
                                            <label class="label"> To Date * </label>
                                            <label class="input">
                                                <i class="icon-append fa fa-calendar"></i>
                                                <input type="text" id="date" name="date" class="datepicker">
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
    </script>
@endsection