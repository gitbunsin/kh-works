@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    @php $employee = \App\Employee::where('company_id',Auth::guard('admins')->user()->id)->first(); @endphp
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
                            <div class="widget-body">
                                <form id="validate_employee" method="POST"  action="{{url('administration/employee')}}" class="smart-form" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input name="_method" type="hidden" value="PATCH">
                                    <input type="hidden" id="emp_id" value="{{Auth::guard('admins')->user()->id}}" name="emp_id"/>
                                    <input type="hidden" id="isPersonalDeatils" name="isPersonalDeatils" value="1"/>
                                    <div class="row">
                                        <input type="hidden" value="" name="company_id"/>
                                        <section class="col col-4">
                                            <label class="label">First Name</label>
                                            <label class="input">
                                                <input  value="{{$employee->emp_firstname}}" type="text" name="emp_firstname" id="emp_firstname">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Middle Name</label>
                                            <label class="input">
                                                <input value="{{$employee->emp_middle_name}}"  type="text" name="emp_middle_name" id="emp_middle_name">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Last Name</label>
                                            <label class="input">
                                                <input value="{{$employee->emp_lastname}} " type="text" name="emp_lastname" id="emp_lastname" >
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <input type="hidden" value="" name="company_id"/>
                                        <section class="col col-4">
                                            <label class="label">Employee Id</label>
                                            <label class="input">
                                                <input disabled value="{{$employee->employee_id}}" type="text" name="employee_id" id="employee_id">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Other Id</label>
                                            <label class="input">
                                                <input value="{{$employee->emp_other_id}}" type="text" name="other_id" id="other_id">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label"> License Expiry Date </label>
                                            <label class="input">
                                                <i class="icon-append fa fa-calendar"></i>
                                                <input value="{{date('d-m-Y',strtotime($employee->emp_dri_lice_exp_date))}}" type="text" id="license_expiry_date" name="license_expiry_date" class="datepicker">
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">Driver's License</label>
                                            <label class="input">
                                                <input value="{{$employee->driver_license}}" type="text" name="driver_license" id="driver_license" >
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Driver's License Number</label>
                                            <label class="input">
                                                <input value="{{$employee->emp_dri_lice_num}}" type="number" name="driver_license_number" id="driver_license_number" >
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label"> Date of Birth </label>
                                            <label class="input">
                                                <i class="icon-append fa fa-calendar"></i>
                                                <input value="{{date('d-m-Y', strtotime($employee->emp_birthday))}}" type="text" id="date_of_birth" name="date_of_birth" class="datepicker custom_date">
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <input type="hidden" value="" name="company_id"/>
                                        <input type="hidden" value="" name="company_id"/>
                                        <section class="col col-4">
                                            <label class="label">Gender</label>
                                            <div class="inline-group">
                                                <label class="radio">
                                                    @if($employee->emp_gender == "1")
                                                        <input checked value="1" type="radio" name="gender" id="gender_male">
                                                        <i></i>Male
                                                    @else
                                                        <input  value="1" type="radio" name="gender" id="gender_male">
                                                        <i></i>Male
                                                    @endif
                                                </label>
                                                <label class="radio">
                                                    @if($employee->emp_gender == "0")
                                                        <input type="radio" value="0" checked id="gender_female" name="gender">
                                                        <i></i>Female
                                                    @else
                                                        <input type="radio" value="0" id="gender_female" name="gender">
                                                        <i></i>Female
                                                    @endif
                                                </label>
                                            </div>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label"> Marital Status</label>
                                            <label class="select">
                                                @php
                                                    $array = array(
                                                        "1" => "single",
                                                        "2" => "Married",
                                                        "3"=>"other"
                                                    );
                                                @endphp
                                                <select name="marital_status" id="martial_Status">
                                                    <option value="0">-- select --</option>
                                                    @foreach($array as $i =>$value)
                                                        {{$value}}
                                                        <option value="{{$i}}" {{$employee->nation_code == $i ? 'selected="selected"' : ''}}>{{$value}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>

                                        <section class="col col-4">
                                            @php $nation = \App\nation::all(); @endphp
                                            <label class="label"> Nationality</label>
                                            <label class="select">
                                                <select name="nationality" id="nationality">
                                                    <option value="0">Select</option>
                                                    @foreach($nation as $nations)
                                                        <option value="{{$nations->id}}" {{ $employee->nation_code == $nations->id ? 'selected="selected"' : '' }}>{{$nations->name}}</option>
                                                    @endforeach

                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">Nick name</label>
                                            <label class="input">
                                                <input value="{{$employee->nickname}}" type="text" name="driver_license" id="nickname" >
                                            </label>
                                        </section>

                                        <section class="col col-4">
                                            <label class="label">Military Service</label>
                                            <label class="input">
                                                <input value="{{$employee->emp_military_service}}" type="text" name="driver_license" id="military_service" >
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Smoker</label>
                                            <label class="checkbox">
                                                <input name="user_check1" type="checkbox" value="0" id="checkbox-smoker">
                                                <i></i>
                                                {{--<strong> Create Login Details</strong>--}}
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
