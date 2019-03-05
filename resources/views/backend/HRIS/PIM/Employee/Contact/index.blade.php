@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <style>
        .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control{
            background: #eee !important;
        }
    </style>
    {{--@if(\Illuminate\Support\Facades\Auth::guard('admins')->user())--}}

        {{--@php $employee = \App\Model\Employee::where('company_id',Auth::guard('admins')->user()->id)->first(); @endphp--}}
    {{--@else--}}

        {{--@php $employee = \App\Model\Employee::where('company_id',Auth::guard('employee')->user()->id)->first(); @endphp--}}

    {{--@endif--}}
    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">

                    <header>
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2> Contact Details </h2>
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
                            @php
                               $CompanyID = \Illuminate\Support\Facades\Auth::guard('admins')->user()->id;
                            @endphp
                            <div class="widget-body">
                                <form name="EmployeeContactDetails" id="validate_employee" method="POST"  action="{{url('administration/employee-contact-details/'.$CompanyID)}}" class="smart-form padding-bottom-10 form-horizontal" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input name="_method" type="hidden" value="PATCH">
                                    <div class="row">
                                        <input type="hidden" value="" name="company_id"/>
                                        <section class="col col-4">
                                            <label class="label">Address Street 1</label>
                                            <label class="input">
                                                <input class="form-control" value="{{$EmployeeContactDetails->emp_street1}}" type="text" name="emp_street1" id="emp_street1">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Address Street 2</label>
                                            <label class="input">
                                                <input class="form-control"  value="{{$EmployeeContactDetails->emp_street2}}" type="text" name="emp_street2" id="emp_street2">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">City</label>
                                            <label class="input">
                                                <input class="form-control" value="{{$EmployeeContactDetails->city_code}}" type="text" name="city_code" id="city_code" >
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <input type="hidden" value="" name="company_id"/>
                                        <section class="col col-4">
                                            <label class="label">State/Province</label>
                                            <label class="input">
                                                <input class="form-control"  value="{{$EmployeeContactDetails->provin_code}}" type="text" name="provin_code" id="provin_code">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Zip/Postal Code</label>
                                            <label class="input">
                                                <input class="form-control" value="{{$EmployeeContactDetails->emp_zipcode}}" type="text" name="emp_zipcode" id="emp_zipcode">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label"> Country</label>
                                            <label class="select">
                                                <select class="form-control" name="coun_code" id="coun_code">
                                                    <option value="0">Select</option>
                                                    <option value=""></option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">Home Telephone</label>
                                            <label class="input">
                                                <input class="form-control" type="number" value="{{$EmployeeContactDetails->emp_hm_telephone}}"  name="emp_hm_telephone" id="emp_hm_telephone">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Mobile</label>
                                            <label class="input">
                                                <input class="form-control" type="number" value="{{$EmployeeContactDetails->emp_mobile}}"  name="emp_mobile" id="emp_mobile">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label"> Work Telephone</label>
                                            <label class="input">
                                                <input class="form-control" type="number" value="{{$EmployeeContactDetails->emp_work_telephone}}"  name="emp_work_telephone" id="emp_work_telephone">
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <input type="hidden" value="" name="company_id"/>
                                        <section class="col col-4">
                                            <label class="label">Work Email</label>
                                            <label class="input">
                                                <input class="form-control" type="email" name="emp_work_email" value="{{$EmployeeContactDetails->emp_work_email}}" id="emp_work_email">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Other Email</label>
                                            <label class="input">
                                                <input class="form-control" type="email" name="emp_oth_email" value="{{$EmployeeContactDetails->emp_oth_email}}" id="emp_oth_email">
                                            </label>
                                        </section>
                                    </div>
                                    <footer>
                                        <input id="BtnSubmitContactDetails" type="button" value="" class="btn btn-primary"/>
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

    <script>

        function DisabledEmployeeContactDatailsForm()
        {
            $('#emp_street1').prop('disabled', true);
            $('#emp_street2').prop('disabled', true);
            $('#city_code').prop('disabled', true);
            $('#provin_code').prop('disabled', true);
            $('#emp_zipcode').prop('disabled', true);
            $('#coun_code').prop('disabled', true);
            $('#emp_hm_telephone').prop('disabled', true);
            $('#emp_mobile').prop('disabled', true);
            $('#emp_work_telephone').prop('disabled', true);
            $('#emp_work_email').prop('disabled', true);
            $('#emp_oth_email').prop('disabled', true);
        }

        function EnableEmployeeContactDetailForm(){
            $('#emp_street1').prop('disabled', false);
            $('#emp_street2').prop('disabled', false);
            $('#city_code').prop('disabled', false);
            $('#provin_code').prop('disabled', false);
            $('#emp_zipcode').prop('disabled', false);
            $('#coun_code').prop('disabled', false);
            $('#emp_hm_telephone').prop('disabled', false);
            $('#emp_mobile').prop('disabled', false);
            $('#emp_work_telephone').prop('disabled', false);
            $('#emp_work_email').prop('disabled', false);
            $('#emp_oth_email').prop('disabled', false);
        }
        $(document).ready(function () {
            DisabledEmployeeContactDatailsForm();
            var edit = $('#BtnSubmitContactDetails').val('Edit');
            // alert(emp_id);
            $('#BtnSubmitContactDetails').click(function(e){
                $isEdit = $('#BtnSubmitContactDetails').val();
                if($isEdit =="Edit"){
                    EnableEmployeeContactDetailForm();
                    var Save = $('#BtnSubmitContactDetails').val('Save');
                }else{
                    $isSave = $('#BtnSubmitContactDetails').val();
                    var emp_id = $('#emp_id').val();
                    // alert($isSave);
                    if($isSave == "Save") {
                        // alert('ok');
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $('#validate_employee').submit();
                        e.preventDefault();
                    }
                }

            });
        });
    </script>
@endsection
