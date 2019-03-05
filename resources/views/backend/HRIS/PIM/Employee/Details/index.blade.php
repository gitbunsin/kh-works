@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
<style>
    .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control{
        background: #eee !important;
    }
</style>

    {{--@php use App\Model\Employee;$employee = Employee::where('company_id',Auth::guard('admins')->user()->id)->first(); @endphp--}}
    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2> Personal Details </h2>
                    </header>
                    <!-- widget div-->
                    <div>
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                        </div>
                        <header>
                            {{--<h4> Personal Details </h4>--}}
                        </header>
                        <br/>
                        <!-- widget div-->
                        <div>
                            <!-- widget edit box -->
                            <div class="jarviswidget-editbox">
                                <!-- This area used as dropdown edit box -->
                            </div>
                            <!-- end widget edit box -->
                            <!-- widget content -->
                            @php
                                    $employeeID = \Illuminate\Support\Facades\Auth::guard('admins')->user()->id;
                            @endphp
                            <div class="widget-body">
                                <form  name="EmployeeInfo" id="validate_employee" method="POST"  action="{{url('administration/employee/'.$employeeID)}}" class="smart-form form-horizontal" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input name="_method" type="hidden" value="PATCH">
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">First Name</label>
                                            <label class="input">
                                                <input value="{{$EmployeeDetailsInfo->emp_firstname}}" class="form-control" placeholder="Default Text Field" name="emp_firstname" id="emp_firstname" type="text">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Middle Name</label>
                                            <label class="input">
                                                <input  class="form-control" value="{{$EmployeeDetailsInfo->emp_middle_name}}"  type="text" name="emp_middle_name" id="emp_middle_name">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Last Name</label>
                                            <label class="input">
                                                <input class="form-control" value="{{$EmployeeDetailsInfo->emp_lastname}}" type="text" name="emp_lastname" id="emp_lastname" >
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">Employee Id</label>
                                            <label class="input">
                                                <input class="form-control"  value="{{$EmployeeDetailsInfo->employee_id}}" type="text" name="employee_id" id="employee_id">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Other Id</label>
                                            <label class="input">
                                                <input class="form-control" value="{{$EmployeeDetailsInfo->emp_other_id}}" type="text" name="other_id" id="other_id">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label"> License Expiry Date </label>
                                            <label class="input">
                                                <i class="icon-append fa fa-calendar"></i>
                                                <input class="form-control"  value="{{$EmployeeDetailsInfo->emp_dri_lice_exp_date}}" type="text" id="license_expiry_date" name="license_expiry_date" class="datepicker">
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">Driver's License</label>
                                            <label class="input">
                                                <input class="form-control" value="{{$EmployeeDetailsInfo->emp_dri_lice_num}}" type="text" name="driver_license" id="driver_license" >
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Driver's License Number</label>
                                            <label class="input">
                                                <input class="form-control" value="{{$EmployeeDetailsInfo->emp_dri_lice_num }}" type="number" name="driver_license_number" id="driver_license_number" >
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label"> Date of Birth </label>
                                            <label class="input">
                                                <i class="icon-append fa fa-calendar"></i>
                                                <input class="form-control" value="{{$EmployeeDetailsInfo->emp_birthday}}" type="text" id="date_of_birth" name="date_of_birth" class="">

                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-4">
                                            <div class="row">
                                                <label class="label col col-2">Gender</label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input  class="form-control col col-10" type="radio" value="1" id="GenderMale" name="gender">
                                                        <i></i>Male
                                                </label>
                                                    <label class="radio">
                                                            <input class="form-control"  type="radio" value="0" id="GenderFemale" name="gender">
                                                            <i></i>Female
                                                    </label>
                                                </div>
                                            </div>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label"> Marital Status</label>
                                            <label class="select">
                                                <select class="form-control" name="marital_status" id="martial_Status">
                                                    <option value="0">-- select --</option>
                                                        <option class="form-control" value=""></option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>

                                        <section class="col col-4">
                                            <label class="label"> Nationality</label>
                                            <label class="select">
                                                <select class="form-control"  name="nationality" id="nationality">
                                                    <option value="0">Select</option>
                                                        <option class="form-control" value="{{$EmployeeDetailsInfo->nation_code}}"></option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">Nick name</label>
                                            <label class="input">
                                                <input class="form-control" value="{{$EmployeeDetailsInfo->emp_nick_name}}" type="text" name="nickname" id="nickname" >
                                            </label>
                                        </section>

                                        <section class="col col-4">
                                            <label class="label">Military Service</label>
                                            <label class="input">
                                                <input class="form-control" value="{{$EmployeeDetailsInfo->emp_military_service}}" type="text" name="military_service" id="military_service" >
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Smoker</label>
                                            <label class="checkbox">
                                                <input class="form-control" name="user_check1" type="checkbox" value="0" id="checkbox-smoker">
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                    <footer>
                                        <input id="btn_edit" type="button" value="" class="btn btn-primary"/>
                                    </footer>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{ asset('/js/hr/employee.js') }}"></script>
@endsection
