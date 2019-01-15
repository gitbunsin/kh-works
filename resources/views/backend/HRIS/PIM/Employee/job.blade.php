@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a style="background: #333;" class="btn btn-primary" href="{{url('administration/employee/create')}}" role="button">
                                <i class="glyphicon glyphicon-plus-sign "></i> Add new</a>
                        </div>
                    </div>
                </div>
                <br/>
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
                        <form id="validate_employee" method="POST"  action="{{url('administration/employee')}}" class="smart-form" enctype="multipart/form-data">
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
                                    @php $nation = \App\nation::all(); @endphp
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
                                    @php $nation = \App\nation::all(); @endphp
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
                                    @php $nation = \App\nation::all(); @endphp
                                    <label class="label"> Sub Unit</label>
                                    <label class="select">
                                        <select name="location" id="location">
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
                                @php $nation = \App\nation::all(); @endphp
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
                            <footer>
                                <input id="btn_edit_job" type="button" value="" class="btn btn-primary"/>
                            </footer>
                            <hr/>
                            <br/>
                            <h4><strong>Employee Contract</strong></h4>
                            <br/>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="label"> Start Date </label>
                                    <label class="input">
                                        <i class="icon-append fa fa-calendar"></i>
                                        <input value="" type="text" id="license_expiry_date" name="license_expiry_date" class="datepicker">
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="label"> End Date </label>
                                    <label class="input">
                                        <i class="icon-append fa fa-calendar"></i>
                                        <input value="" type="text" id="license_expiry_date" name="license_expiry_date" class="datepicker">
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
                </div>
            </article>
        </div>
    </section>
    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{ asset('/js/hr/employee.js') }}"></script>
@endsection