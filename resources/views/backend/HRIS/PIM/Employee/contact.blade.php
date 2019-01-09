@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    @php $employee = \App\Employee::where('emp_id',Auth::guard('employee')->user()->employee_id)->first(); @endphp
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
                            <!-- end widget edit box -->

                            <!-- widget content -->
                            <div class="widget-body">
                                <form id="validate_employee" method="POST"  action="{{url('administration/employee')}}" class="smart-form padding-bottom-10" enctype="multipart/form-data">
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
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{ asset('/js/hr/employee.js') }}">
@endsection