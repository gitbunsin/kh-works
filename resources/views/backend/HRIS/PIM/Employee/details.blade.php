@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div style="background: white;" class="product-content product-wrap clearfix product-deatil">
                    <div class="row">
                        <div class="col-md-2 col-sm-12 col-xs-12 ">
                            <div class="product-image">
                                <hr/>
                                @php $employee = \App\Employee::where('emp_id',Auth::guard('employee')->user()->employee_id)->first(); @endphp
                                    <img width="150px" height="150px" style="margin-left: 10px;" src="{{asset('/uploads/EmpPhoto/'.$employee->photo)}}">
                            </div>
                        </div>
                        <div class="col-md-10 col-sm-12 col-xs-12">
                            <hr>
                            <div class="description description-tabs">
                                <ul id="myTab2" class="nav nav-tabs">
                                    <li class="active"><a href="#more-information2" data-toggle="tab" class="no-margin" aria-expanded="true"> Personal Details </a></li>
                                    <li class=""><a href="#specifications2" data-toggle="tab" aria-expanded="false"> Contact Details </a></li>
                                    <li class=""><a href="#Emergency_contact" data-toggle="tab" aria-expanded="false">Emergency</a></li>
                                    {{--<li class=""><a href="#reviews2" data-toggle="tab" aria-expanded="false"> Dependents</a></li>--}}
                                    {{--<li class=""><a href="#reviews2" data-toggle="tab" aria-expanded="false"> Immigration</a></li>--}}
                                    <li class=""><a href="#job" data-toggle="tab" aria-expanded="false"> Job</a></li>
                                    <li class=""><a href="#Salary" data-toggle="tab" aria-expanded="false"> Salary</a></li>
                                    <li class=""><a href="#Report" data-toggle="tab" aria-expanded="false"> Report-to</a></li>
                                    <li class=""><a href="#Qualifications" data-toggle="tab" aria-expanded="false"> Qualifications</a></li>
                                    <li class=""><a href="#Memberships" data-toggle="tab" aria-expanded="false"> Memberships</a></li>
                                </ul>
                                <div id="myTabContent2" class="tab-content">
                                    <div class="tab-pane fade active in" id="more-information2">
                                        <br>

                                        {{--<strong>Description Title</strong>--}}
                                        <form id="validate_employee" method="POST"  action="{{url('administration/employee')}}" class="smart-form well padding-bottom-10" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input name="_method" type="hidden" value="PATCH">
                                            <input type="hidden" id="emp_id" value="{{Auth::guard('employee')->user()->id}}" name="emp_id"/>
                                            <input type="hidden" id="isPersonalDeatils" name="isPersonalDeatils" value="1"/>
                                                <div class="row">
                                                <input type="hidden" value="" name="company_id"/>
                                                <section class="col col-4">
                                                    <label class="label">First Name</label>
                                                    <label class="input">
                                                        <input value="{{$employee->emp_firstname}}" type="text" name="emp_firstname" id="emp_firstname">
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
                                                <input type="hidden" value="" name="company_id"/>
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
                                    <div class="tab-pane fade" id="specifications2">
                                        <br>
                                        <form id="validate_employee" method="POST"  action="{{url('administration/employee')}}" class="smart-form well padding-bottom-10" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" id="isContactDetails" name="isContactDetails" value="1"/>
                                            <div class="row">
                                                <input type="hidden" value="" name="company_id"/>
                                                <section class="col col-4">
                                                    <label class="label">Address Street 1</label>
                                                    <label class="input">
                                                        <input value="{{$employee->emp_street1}}" type="text" name="emp_street1" id="emp_street1">
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="label">Address Street 2</label>
                                                    <label class="input">
                                                        <input  value="{{$employee->emp_street2}}" type="text" name="emp_street2" id="emp_street2">
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="label">City</label>
                                                    <label class="input">
                                                        <input  value="{{$employee->city_code}}" type="text" name="city_code" id="city_code" >
                                                    </label>
                                                </section>
                                            </div>
                                            <div class="row">
                                                <input type="hidden" value="" name="company_id"/>
                                                <section class="col col-4">
                                                    <label class="label">State/Province</label>
                                                    <label class="input">
                                                        <input  value="{{$employee->provin_code}}" type="text" name="provin_code" id="provin_code">
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="label">Zip/Postal Code</label>
                                                    <label class="input">
                                                        <input value="{{$employee->emp_zipcode}}" type="text" name="emp_zipcode" id="emp_zipcode">
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="label"> Country</label>
                                                    <label class="select">
                                                        <select name="coun_code" id="coun_code">
                                                            <option value="0">Select</option>
                                                            <option value=""></option>
                                                        </select>
                                                        <i></i>
                                                    </label>
                                                </section>
                                            </div>
                                            {{--<hr/>--}}
                                            {{--<br/>--}}
                                            <div class="row">
                                                <input type="hidden" value="" name="company_id"/>
                                                <section class="col col-4">
                                                    <label class="label">Home Telephone</label>
                                                    <label class="input">
                                                        <input type="number" value="{{$employee->emp_hm_telephone}}"  name="emp_hm_telephone" id="emp_hm_telephone">
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="label">Mobile</label>
                                                    <label class="input">
                                                        <input type="number" value="{{$employee->emp_mobile}}"  name="emp_mobile" id="emp_mobile">
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="label"> Work Telephone</label>
                                                    <label class="input">
                                                        <input type="number" value="{{$employee->emp_work_telephone}}"  name="emp_work_telephone" id="emp_work_telephone">
                                                    </label>
                                                </section>
                                            </div>
                                            {{--<hr/>--}}
                                            {{--<br/>--}}
                                            <div class="row">
                                                <input type="hidden" value="" name="company_id"/>
                                                <section class="col col-6">
                                                    <label class="label">Work Email</label>
                                                    <label class="input">
                                                        <input type="email" name="emp_work_email" value="{{$employee->emp_work_email}}" id="emp_work_email">
                                                    </label>
                                                </section>
                                                <section class="col col-6">
                                                    <label class="label">Other Email</label>
                                                    <label class="input">
                                                        <input type="email" name="emp_oth_email" value="{{$employee->emp_oth_email}}" id="emp_oth_email">
                                                    </label>
                                                </section>
                                            </div>
                                            <footer>
                                                <input id="btn_edit1" type="button" value="" class="btn btn-primary"/>
                                            </footer>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="Emergency_contact">
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-12 margin-tb">
                                                <div class="pull-right">
                                                    <a style="background: #333;" id="btn_add" class="btn btn-primary" href="#" role="button">
                                                        <i class="glyphicon glyphicon-plus-sign "></i> Add new</a>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                        <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                            <thead>
                                            <tr>
                                                <th data-hide="phone"> Name</th>
                                                <th data-class="expand"> Relationship</th>
                                                <th data-hide="phone"> Date of Birth</th>
                                                {{--<th data-hide="phone"> Employee Status</th>--}}
                                                {{--<th data-hide="posting-date"> Location</th>--}}
                                                {{--<th data-hide="closing-date"> Supervisor</th>--}}
                                                <th> Action </th>
                                            </tr>
                                            </thead>
                                            <tbody id="products-list" name="products-list">
                                                <tr id="employee_id">
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <a data-id="" href="" style="text-decoration:none;" class="btn-detail">
                                                            <i class="glyphicon glyphicon-edit"></i>
                                                        </a>
                                                        <a data-id="" href="#" style="text-decoration:none;" class="delete-item">
                                                            <i class="glyphicon glyphicon-trash"  style="color:red;"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                    {{----------------------------Job---------------------------}}
                                    <div class="tab-pane fade" id="job">
                                        <br/>
                                        <form id="validate_employee" method="POST"  action="{{url('administration/employee')}}" class="smart-form well padding-bottom-10" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" id="isContactDetails" name="isContactDetails" value="1"/>
                                            <div class="row">
                                                <section class="col col-4">
                                                    <label class="label">Job Title</label>
                                                    <label class="input">
                                                        <input value="" type="text" name="job_title_code" id="job_title_code">
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="label">Job Specification</label>
                                                    <label class="input">
                                                        <input value="" type="text" name="job_specification" id="job_specification">
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    {{--@php $nation = \App\nation::all(); @endphp--}}
                                                    <label class="label"> Employee Status</label>
                                                    <label class="select">
                                                        <select name="location" id="location">
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
                                                        <select name="location" id="location">
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
                                                        <input value="" type="text" name="join_date" id="join_date">
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    {{--@php $nation = \App\nation::all(); @endphp--}}
                                                    <label class="label"> Sub Unit</label>
                                                    <label class="select">
                                                        <select name="location" id="location">
                                                            <option value="0">Select</option>
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
                                                        <select name="location" id="location">
                                                            <option value="0">Select</option>
                                                            {{--@foreach($nation as $nations)--}}
                                                                {{--<option value="{{$nations->id}}" {{ $employee->nation_code == $nations->id ? 'selected="selected"' : '' }}>{{$nations->name}}</option>--}}
                                                            {{--@endforeach--}}
                                                        </select>
                                                        <i></i>
                                                    </label>
                                                </section>
                                            {{--<footer>--}}
                                                {{--<input id="btn_edit_job" type="button" value="" class="btn btn-primary"/>--}}
                                            {{--</footer>--}}
                                            <hr/>
                                            <br/>
                                            <h4><strong>Employee Contract</strong></h4>
                                            <br/>
                                            <div class="row">
                                                <section class="col col-6">
                                                    <label class="label"> Start Date </label>
                                                    <label class="input">
                                                        <i class="icon-append fa fa-calendar"></i>
                                                        <input value="{{date('d-m-Y',strtotime($employee->emp_dri_lice_exp_date))}}" type="text" id="license_expiry_date" name="license_expiry_date" class="datepicker">
                                                    </label>
                                                </section>
                                                 <section class="col col-6">
                                                    <label class="label"> End Date </label>
                                                    <label class="input">
                                                        <i class="icon-append fa fa-calendar"></i>
                                                        <input value="{{date('d-m-Y',strtotime($employee->emp_dri_lice_exp_date))}}" type="text" id="license_expiry_date" name="license_expiry_date" class="datepicker">
                                                    </label>
                                                </section>
                                            </div>
                                            <section>
                                                <label class="label">Contract Details</label>
                                                <label class="input">
                                                    <input value="" type="text" name="contract_details" id="contract_details">
                                                </label>
                                            </section>
                                        </form>
                                    </div>
                                    {{--=====================================--}}
                                    <br/>
                                    <div class="tab-pane fade" id="Salary">
                                        <br/>
                                        <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                            <thead>
                                            <tr>
                                                <th> Salary Component</th>
                                                <th> Pay Frequency</th>
                                                <th> Currency</th>
                                                <th> Amount</th>
                                                <th> Comments</th>
                                                <th> Show Direct Deposit Details</th>
                                                <th> Action </th>
                                            </tr>
                                            </thead>
                                            <tbody id="products-list" name="products-list">
                                            <tr id="employee_id">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <a data-id="" href="" style="text-decoration:none;" class="btn-detail">
                                                        <i class="glyphicon glyphicon-edit"></i>
                                                    </a>
                                                    <a data-id="" href="#" style="text-decoration:none;" class="delete-item">
                                                        <i class="glyphicon glyphicon-trash"  style="color:red;"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    {{--====================================================================--}}
                                    <div class="tab-pane fade" id="Report">
                                        <br/>
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><strong>Assigned Supervisors</strong></div>
                                            <div class="panel-body">
                                            <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                                <thead>
                                                <tr>
                                                    <th> Name</th>
                                                    <th> Reporting Method</th>
                                                    <th> Action </th>
                                                </tr>
                                                </thead>
                                                <tbody id="products-list" name="products-list">
                                                <tr id="employee_id">
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <a data-id="" href="" style="text-decoration:none;" class="btn-detail">
                                                            <i class="glyphicon glyphicon-edit"></i>
                                                        </a>
                                                        <a data-id="" href="#" style="text-decoration:none;" class="delete-item">
                                                            <i class="glyphicon glyphicon-trash"  style="color:red;"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        </div>

                                        <br/>
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><strong>Assigned Subordinates</strong></div>
                                            <div class="panel-body">
                                                <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th> Name</th>
                                                        <th> Reporting Method</th>
                                                        <th> Action </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="products-list" name="products-list">
                                                    <tr id="employee_id">
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <a data-id="" href="" style="text-decoration:none;" class="btn-detail">
                                                                <i class="glyphicon glyphicon-edit"></i>
                                                            </a>
                                                            <a data-id="" href="#" style="text-decoration:none;" class="delete-item">
                                                                <i class="glyphicon glyphicon-trash"  style="color:red;"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    {{--=====================================================================--}}
                                    <div class="tab-pane fade" id="Qualifications">
                                        <br/>
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><strong>Work Experience</strong></div>
                                            <div class="panel-body">
                                                <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th> Company </th>
                                                        <th> Job Title</th>
                                                        <th> From </th>
                                                        <th> To </th>
                                                        <th> Comment </th>
                                                        <th> Action </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="products-list" name="products-list">
                                                    <tr id="employee_id">
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <a data-id="" href="" style="text-decoration:none;" class="btn-detail">
                                                                <i class="glyphicon glyphicon-edit"></i>
                                                            </a>
                                                            <a data-id="" href="#" style="text-decoration:none;" class="delete-item">
                                                                <i class="glyphicon glyphicon-trash"  style="color:red;"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        {{--===--}}
                                        <br/>
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><strong> Education </strong></div>
                                            <div class="panel-body">
                                                <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th> Level </th>
                                                        <th> Year</th>
                                                        <th> GPA/Score </th>
                                                        <th> Action </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="products-list" name="products-list">
                                                    <tr id="employee_id">
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <a data-id="" href="" style="text-decoration:none;" class="btn-detail">
                                                                <i class="glyphicon glyphicon-edit"></i>
                                                            </a>
                                                            <a data-id="" href="#" style="text-decoration:none;" class="delete-item">
                                                                <i class="glyphicon glyphicon-trash"  style="color:red;"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"><strong> Skills </strong></div>
                                            <div class="panel-body">
                                                <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th> Level </th>
                                                        <th> Year</th>
                                                        <th> GPA/Score </th>
                                                        <th> Action </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="products-list" name="products-list">
                                                    <tr id="employee_id">
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <a data-id="" href="" style="text-decoration:none;" class="btn-detail">
                                                                <i class="glyphicon glyphicon-edit"></i>
                                                            </a>
                                                            <a data-id="" href="#" style="text-decoration:none;" class="delete-item">
                                                                <i class="glyphicon glyphicon-trash"  style="color:red;"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><strong> Languages </strong></div>
                                            <div class="panel-body">
                                                <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th> Level </th>
                                                        <th> Year</th>
                                                        <th> GPA/Score </th>
                                                        <th> Action </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="products-list" name="products-list">
                                                    <tr id="employee_id">
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <a data-id="" href="" style="text-decoration:none;" class="btn-detail">
                                                                <i class="glyphicon glyphicon-edit"></i>
                                                            </a>
                                                            <a data-id="" href="#" style="text-decoration:none;" class="delete-item">
                                                                <i class="glyphicon glyphicon-trash"  style="color:red;"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><strong> License </strong></div>
                                            <div class="panel-body">
                                                <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th> Level </th>
                                                        <th> Year</th>
                                                        <th> GPA/Score </th>
                                                        <th> Action </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="products-list" name="products-list">
                                                    <tr id="employee_id">
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <a data-id="" href="" style="text-decoration:none;" class="btn-detail">
                                                                <i class="glyphicon glyphicon-edit"></i>
                                                            </a>
                                                            <a data-id="" href="#" style="text-decoration:none;" class="delete-item">
                                                                <i class="glyphicon glyphicon-trash"  style="color:red;"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        {{--==========================================================--}}

                                </div>
                                    <div class="tab-pane fade" id="Memberships">
                                        <br/>
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><strong> Assigned Memberships </strong></div>
                                            <div class="panel-body">
                                                <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th> Membership </th>
                                                        <th> Subscription Paid By</th>
                                                        <th> Subscription Amount </th>
                                                        <th> Currency </th>
                                                        <th> Subscription Commence Date </th>
                                                        <th> Subscription Renewal Date </th>
                                                        <th> Action </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="products-list" name="products-list">
                                                    <tr id="employee_id">
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <a data-id="" href="" style="text-decoration:none;" class="btn-detail">
                                                                <i class="glyphicon glyphicon-edit"></i>
                                                            </a>
                                                            <a data-id="" href="#" style="text-decoration:none;" class="delete-item">
                                                                <i class="glyphicon glyphicon-trash"  style="color:red;"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                {{--===========================================--}}
                        </div>
                            <br/>

                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="btn-group">
                                        <button class="btn btn-white btn-default"><i class="fa fa-star"></i> Add to wishlist </button>
                                        <button class="btn btn-white btn-default"><i class="fa fa-envelope"></i> Contact Seller</button>
                                    </div>
                                </div>
                            </div>
                            <br/>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input id="url" type="hidden" value="{{ \Request::url() }}">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                {{--<div class="modal-content">--}}
                <div class="modal-body">
                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <!-- Widget ID (each widget will need unique ID)-->
                        <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                            <header>
                                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                <h2> Employee </h2>
                            </header>
                            <!-- widget div-->
                            <div>
                                <!-- widget edit box -->
                                <div class="jarviswidget-editbox">
                                    <!-- This area used as dropdown edit box -->
                                </div>
                                <!-- widget content -->
                                <div class="widget-body no-padding">
                                    <form id="frmProducts"  class="smart-form">
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <fieldset>
                                            <div class="row">
                                                <section class="col col-6">
                                                    <label class="label">Name *</label>
                                                    <label class="input">
                                                        <input type="text" name="name" id="name">
                                                    </label>
                                                </section>
                                                <section class="col col-6">
                                                    <label class="label">Relationship *</label>
                                                    <label class="input">
                                                        <input type="text" name="relationship" id="relationship">
                                                    </label>
                                                </section>
                                            </div>
                                            <div class="row">
                                                <section class="col col-6">
                                                    <label class="label"> Home Telephone *</label>
                                                    <label class="input">
                                                        <input type="number" name="home_telephone" id="home_telephone">
                                                    </label>
                                                </section>
                                                <section class="col col-6">
                                                    <label class="label">Mobile</label>
                                                    <label class="input">
                                                        <input type="number" value="mobile" id="mobile">
                                                    </label>
                                                </section>
                                            </div>
                                            <section>
                                                <label class="label">Work Telephone</label>
                                                <label class="input">
                                                    <input type="number" name="work_telephone" id="work_telephone">
                                                </label>
                                            </section>

                                        </fieldset>
                                        <footer>
                                            <input type="button" class="btn btn-primary" id="btn-save" value="add">
                                            <input type="hidden" id="product_id" name="product_id" value="0">
                                            <button type="button" class="btn btn-default" id="btnclose" data-dismiss="modal">Close</button>
                                        </footer>
                                    </form>
                                </div>
                                <!-- end widget content -->
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{ asset('/js/hr/employee.js') }}"></script>
@endsection