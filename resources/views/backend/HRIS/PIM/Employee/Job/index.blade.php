@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
        <style>
        .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control{
            background: #eee !important;
        }
    </style>
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2> Job Details</h2>
                    </header>
                    <!-- widget div-->
                    <div>
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                        </div>
                        <!-- end widget edit box -->
                        <!-- widget content -->
                        {{--<div class="widget-body no-padding">--}}
                        {{--</div>--}}
                        <form id="validate_employee" method="POST"  action="{{url('administration/employee')}}" class="smart-form form-horizontal" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" id="isContactDetails" name="isContactDetails" value="1"/>
                            <div class="row">
                                <section class="col col-4">
                                    {{--@php $nation = \App\nation::all(); @endphp--}}
                                    <label class="label"> Job Title</label>
                                    <label class="select">
                                        <select class="form-control" name="JobTitleCode" id="JobTitleCode">
                                            <option value="0">Select</option>
                                            {{--@foreach($nation as $nations)--}}
                                            {{--<option value="{{$nations->id}}" {{ $employee->nation_code == $nations->id ? 'selected="selected"' : '' }}>{{$nations->name}}</option>--}}
                                            {{--@endforeach--}}
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label">Job Specification</label>
                                    <label class="input">
                                        <input value="" type="text" name="job_specification" id="job_specification">
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label"> Employee Status</label>
                                    <label class="select">
                                        <select class="form-control" name="EmploymentStatus" id="EmploymentStatus">
                                            <option value="0">Select</option>
                                            {{--@foreach($nation as $nations)--}}
                                            {{--<option value="{{$nations->id}}" {{ $employee->nation_code == $nations->id ? 'selected="selected"' : '' }}>{{$nations->name}}</option>--}}
                                            {{--@endforeach--}}
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-4">
                                    {{--@php $nation = \App\nation::all(); @endphp--}}
                                    <label class="label"> Job Category</label>
                                    <label class="select">
                                        <select class="form-control" name="JobCategory" id="JobCategory">
                                            <option value="0">Select</option>
                                            {{--@foreach($nation as $nations)--}}
                                            {{--<option value="{{$nations->id}}" {{ $employee->nation_code == $nations->id ? 'selected="selected"' : '' }}>{{$nations->name}}</option>--}}
                                            {{--@endforeach--}}
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label">Join Date</label>
                                    <label class="input">
                                        <input class="form-control" value="" type="text" name="JoinDate" id="JoinDate">
                                    </label>
                                </section>
                                <section class="col col-4">
                                    {{--@php $nation = \App\nation::all(); @endphp--}}
                                    <label class="label"> Sub Unit</label>
                                    <label class="select">
                                        <select class="form-control" name="SubUnit" id="SubUnit">
                                            {{--<option value="0">Select</option>--}}
                                            {{--@foreach($nation as $nations)--}}
                                            {{--<option value="{{$nations->id}}" {{ $employee->nation_code == $nations->id ? 'selected="selected"' : '' }}>{{$nations->name}}</option>--}}
                                            {{--@endforeach--}}
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                            </div>
                            <section>
                                {{--@php $nation = \App\nation::all(); @endphp--}}
                                <label class="label"> Location</label>
                                <label class="select">
                                    <select class="form-control" name="Location" id="Location">
                                        <option value="0">Select</option>
                                        {{--@foreach($nation as $nations)--}}
                                        {{--<option value="{{$nations->id}}" {{ $employee->nation_code == $nations->id ? 'selected="selected"' : '' }}>{{$nations->name}}</option>--}}
                                        {{--@endforeach--}}
                                    </select>
                                    <i></i>
                                </label>
                            </section>
<section>
    <legend>Employee Contract</legend>
</section>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="label"> Start Date </label>
                                    <label class="input">
                                        <i class="icon-append fa fa-calendar"></i>
                                        <input  value="" type="text" id="StartDate" name="StartDate" class="datepicker form-control">
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="label"> End Date </label>
                                    <label class="input">
                                        <i class="icon-append fa fa-calendar"></i>
                                        <input value="" type="text" id="EndDate" name="EndDate" class="datepicker form-control">
                                    </label>
                                </section>
                            </div>
                            <section>
                                <label class="label">Contract Details</label>
                                <label class="input">
                                    <input value="" type="file" name="ContractDetails" id="ContractDetails" class="form-control">
                                </label>
                            </section>
                            <footer>
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <button type="button" class="btn btn-danger" onclick="window.history.back();">
                                    Terminate Employee
                                </button>
                            </footer>
                        </form>
                    </div>
                </div>
            </article>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{ asset('/js/hr/employee.js') }}"></script>
    <script>
        $('#JobTitleCode').prop('disabled',true);
        $('#JobCategory').prop('disabled',true);
        $('#SubUnit').prop('disabled',true);
        $('#JoinDate').prop('disabled',true);
        $('#Location').prop('disabled',true);
        $('#EmploymentStatus').prop('disabled',true);
        $('#StartDate').prop('disabled',true);
        $('#EndDate').prop('disabled',true);
        $('#ContractDetails').prop('disabled',true);

    </script>
@endsection