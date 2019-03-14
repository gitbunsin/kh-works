@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
        <style>
        .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control{
            background: #eee !important;
        }
        .modal-backdrop.in{

            opacity: 0 !important;
        }
    </style>

    <section id="widget-grid" class="">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            <img src="img/logo.png" width="150" alt="SmartAdmin">
                        </h4>
                    </div>
                    <div class="modal-body no-padding">

                        <form id="login-form" class="smart-form">

                            <fieldset>
                                <section>
                                    <div class="row">
                                        <label class="label col col-2">Username</label>
                                        <div class="col col-10">
                                            <label class="input"> <i class="icon-append fa fa-user"></i>
                                                <input type="email" name="email">
                                            </label>
                                        </div>
                                    </div>
                                </section>

                                <section>
                                    <div class="row">
                                        <label class="label col col-2">Password</label>
                                        <div class="col col-10">
                                            <label class="input"> <i class="icon-append fa fa-lock"></i>
                                                <input type="password" name="password">
                                            </label>
                                            <div class="note">
                                                <a href="javascript:void(0)">Forgot password?</a>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <section>
                                    <div class="row">
                                        <div class="col col-2"></div>
                                        <div class="col col-10">
                                            <label class="checkbox">
                                                <input type="checkbox" name="remember" checked="">
                                                <i></i>Keep me logged in</label>
                                        </div>
                                    </div>
                                </section>
                            </fieldset>

                            <footer>
                                <button type="submit" class="btn btn-primary">
                                    Sign in
                                </button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    Cancel
                                </button>

                            </footer>
                        </form>


                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
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
                        @php
                            if(\Illuminate\Support\Facades\Auth::guard('employee')->user())
                            {
                               $employeeID = \Illuminate\Support\Facades\Auth::guard('employee')->user()->emp_number;

                            }else
                            {
                                $ListCompanyEmployee = \App\Model\Employee::where('emp_number',\Illuminate\Support\Facades\Auth::guard('admins')->user()->id)->first();
                                $employeeID = $ListCompanyEmployee->emp_number;
                                //dd($employeeID);
                            }
                        @endphp
                        <form id="frmEmployeeJob" method="POST"  action="{{url('administration/employee/'.$employeeID)}}" class="smart-form form-horizontal" enctype="multipart/form-data">
                            <input name="_method" type="hidden" value="PATCH">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <section class="col col-4">
                                    {{--@php $nation = \App\nation::all(); @endphp--}}
                                    <label class="label"> Job Title</label>
                                    <label class="select">
                                        <select class="form-control" name="JobTitleCode" id="JobTitleCode">
                                            <option value="0">Select</option>
                                            @php $JobTitle = \App\Model\JobTitle::all(); @endphp
                                            @foreach($JobTitle as $JobTitles)
                                            <option value="{{$JobTitles->id}}" {{$JobTitles->id == $EmployeeDetailsJob->job_title_code? "selected='selected'":""}}>{{$JobTitles->name}}</option>
                                            @endforeach
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label">Job Specification</label>
                                    <label class="input">
                                        <input value="" type="text" name="JobSpecification" id="JobSpecification">
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label"> Employee Status</label>
                                    <label class="select">
                                        <select class="form-control" name="EmploymentStatus" id="EmploymentStatus">
                                            <option value="0">Select</option>
                                            @php $EmploymentStatus = \App\Model\EmployementStatus::all();  @endphp
                                                @foreach($EmploymentStatus as $EmploymentStatuss)
                                                <option value="{{$EmploymentStatuss->id}}"{{$EmploymentStatuss->id == $EmployeeDetailsJob->emp_status? "selected='selected'":""}}>{{$EmploymentStatuss->name}}</option>
                                                @endforeach
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
                                            <option value="0">Select
                                            @php $JobCategory = \App\Model\JobCategory::all(); @endphp
                                            @foreach($JobCategory as $JobCategories)
                                                <option value="{{$JobCategories->id}}"{{$JobCategories->id == $EmployeeDetailsJob->eeo_cat_code? "selected='selected'":""}}>{{$JobCategories->name}}</option>
                                            @endforeach
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label"> Join Date </label>
                                    <label class="input">
                                        <i class="icon-append fa fa-calendar"></i>
                                        <input value="{{$EmployeeDetailsJob->joined_date}}" type="text" id="JoinDate" name="JoinDate" class="JoinDate form-control">
                                    </label>
                                </section>
                                <section class="col col-4">
                                    @php $SubUnit = \App\Model\SubUnit::all(); @endphp
                                    <label class="label"> Sub Unit</label>
                                    <label class="select">
                                        <select class="form-control" name="SubUnit" id="SubUnit">
                                            <option value="0">Select</option>
                                            @foreach($SubUnit as $SubUnits)
                                            <option value="{{$SubUnits->id}}" {{$EmployeeDetailsJob->work_station == $SubUnits->id ? 'selected="selected"' : '' }}>{{$SubUnits->title}}</option>
                                            @endforeach
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                            </div>
                            <section>
                                @php $location = \App\Model\Location::all(); @endphp
                                <label class="label"> Location</label>
                                <label class="select">
                                    <select class="form-control" name="location" id="location">
                                        <option value="0">Select</option>
                                        @foreach($location as $locations)
                                        <option value="{{$locations->id}}" {{ $EmployeeDetailsJob->nation_code == $locations->id ? 'selected="selected"' : '' }}>{{$locations->name}}</option>
                                        @endforeach
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
                                <input class="btn btn-primary" type="button" value="" name="BtnEmployeeJob" id="BtnEmployeeJob" />
                                <button data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-danger">
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

        // START AND FINISH DATE

        $('#JoinDate').datepicker({
            dateFormat: 'yy-mm-dd',
            prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>',
            onSelect: function (selectedDate) {
                $('#EndDate').datepicker('option', 'minDate', selectedDate);
            }
        });


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

        DisabledEmployeeJob();
        function DisabledEmployeeJob(){

            $('#JobTitleCode').prop('disabled',true);
            $('#JobCategory').prop('disabled',true);
            $('#SubUnit').prop('disabled',true);
            $('#JoinDate').prop('disabled',true);
            $('#Location').prop('disabled',true);
            $('#EmploymentStatus').prop('disabled',true);
            $('#StartDate').prop('disabled',true);
            $('#EndDate').prop('disabled',true);
            $('#ContractDetails').prop('disabled',true);
        }
        function EnableEmployeeJob(){
            $('#JobTitleCode').prop('disabled',false);
            $('#JobCategory').prop('disabled',false);
            $('#SubUnit').prop('disabled',false);
            $('#JoinDate').prop('disabled',false);
            $('#Location').prop('disabled',false);
            $('#EmploymentStatus').prop('disabled',false);
            $('#StartDate').prop('disabled',false);
            $('#EndDate').prop('disabled',false);
            $('#ContractDetails').prop('disabled',false);


        }

        $('#BtnEmployeeJob').val("Edit");
        $('#BtnEmployeeJob').on('click',function () {

            $isEdit = $('#BtnEmployeeJob').val();
            if($isEdit =="Edit"){
                EnableEmployeeJob();
                var Save = $('#BtnEmployeeJob').val('Save');
            }else{
                $isSave = $('#BtnEmployeeJob').val();
                // alert($isSave);
                if($isSave == "Save") {
                    // alert('ok');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $('#frmEmployeeJob').submit();
                    e.preventDefault();
                }
            }
        });

    </script>
@endsection