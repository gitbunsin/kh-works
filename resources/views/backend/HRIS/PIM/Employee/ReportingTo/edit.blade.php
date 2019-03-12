
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
                        <h2> Edit Assinged Supervisors </h2>
                    </header>
                    <!-- widget div-->
                    <div>
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                        </div>
                        <div class="widget-body no-padding">
                            <form id="frmReportto" method="POST"  action="{{url('administration/view-ReportTo-details/'.$r->reporting_id)}}" class="smart-form" enctype="multipart/form-data">
                                <input name="_method" type="hidden" value="PATCH">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <section>
                                        <div class="row">
                                            <label class="label col col-2"> Name</label>
                                            <div class="from-group col col-10">
                                                <select  name="supervisor_id"
                                                         id="supervisor_id"
                                                         style="width:100%" class="select2 select2-hidden-accessible"
                                                         tabindex="-1" aria-hidden="true">
                                                    <optgroup  label="Performance Employee Trackers">
                                                        <option value="">-- select employee --</option>
                                                        @php $employee = \App\Model\Employee::all(); @endphp
                                                        @foreach($employee as $employees)
                                                            <option value="{{$employees->emp_id}}" {{$employees->emp_id == $r->employee_id ? 'selected="selected"' : '' }}>{{$employees->emp_lastname}} {{$employees->emp_firstname}}</option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </section>
                                    <section>
                                        <div class="row">
                                            <label class="label col col-2"> Reporting Methods</label>
                                            <div class="from-group col col-10">
                                                <label class="select">
                                                    <select name="reporting_id" id="reporting_id">
                                                        <option value="">-- Reporting --</option>
                                                        @php $reporting = \App\Model\ReportingMethods::all(); @endphp
                                                        @foreach($reporting as $reportings)
                                                            {{--<option value="{{$reportings->id}}">{{$reportings->name}}</option>--}}
                                                            <option value="{{$reportings->id}}"  {{ $reportings->id == $r->reporting_id ? 'selected="selected"' : '' }}>{{$reportings->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i></i>
                                                </label>
                                            </div>
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
    <script>
        $(document).ready(function() {
            var $loginForm = $("#frmReportto").validate({
                // Rules for form validation
                rules : {
                    supervisor_id : {
                        required : true
                    },
                    reporting_id : {
                        required: true
                    }
                },
                // Do not change code below
                errorPlacement : function(error, element) {
                    error.insertAfter(element.parent());
                }
            });
        });
    </script>
@endsection
