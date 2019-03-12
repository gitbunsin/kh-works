@extends('backend.HRIS.layouts.cms-layouts')
@section('content')

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
                        <h2> Work Experience  </h2>
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
                                <div class="row">
                                    <div class="col-lg-12 margin-tb">
                                        <div class="pull-right">
                                            <a style="background: #333;" class="btn btn-primary" href="{{url('administration/employee-work-experience/create')}}" role="button">
                                                <i class="glyphicon glyphicon-plus-sign "></i> Add new</a>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                {{--<div class="row">--}}
                                    {{--<div class="col-lg-12 margin-tb">--}}
                                        {{--<div class="pull-right">--}}
                                            {{--<button id="show" type="button" class="btn btn-info">--}}
                                                {{--<i class="glyphicon glyphicon-plus-sign "></i> Add--}}
                                            {{--</button>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                {{--</div>--}}
                                {{--<br/>--}}
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
                                    @foreach($EmployeeWorkExperience as $EmployeeWorkExperiences)
                                        <tr id="work_experience_id{{$EmployeeWorkExperiences->id}}">
                                            <td>
                                                <a data-id="" href="{{url('/administration/employee-work-experience/'.$EmployeeWorkExperiences->id.'/edit')}}" style="text-decoration:none;" class="">
                                                    {{$EmployeeWorkExperiences->eexp_employer}}
                                                </a>
                                            </td>
                                            <td>{{$EmployeeWorkExperiences->eexp_jobtite}}</td>
                                            <td>{{$EmployeeWorkExperiences->eexp_from_date}}</td>
                                            <td>{{$EmployeeWorkExperiences->eexp_to_date}}</td>
                                            <td>{{$EmployeeWorkExperiences->eexp_comments}}</td>
                                            <td>
                                                <a data-id="{{$EmployeeWorkExperiences->id}}" href="#" style="text-decoration:none;" class="delete-item">
                                                    <i class="glyphicon glyphicon-trash"  style="color:red;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <input id="url" type="hidden" value="{{ \Request::url() }}">
    </section>

    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">

                    <header>
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2> Educations 1</h2>

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
                                {{--<div class="row">--}}
                                    {{--<div class="col-lg-12 margin-tb">--}}
                                        {{--<div class="pull-right">--}}
                                            {{--<button id="btn_education" type="button" class="btn btn-info">--}}
                                                {{--<i class="glyphicon glyphicon-plus-sign "></i> Add--}}
                                            {{--</button>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<br/>--}}

                                <div class="row">
                                    <div class="col-lg-12 margin-tb">
                                        <div class="pull-right">
                                            <a style="background: #333;" class="btn btn-primary" href="{{url('administration/employee-education/create')}}" role="button">
                                                <i class="glyphicon glyphicon-plus-sign "></i> Add new</a>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div id="demo_Education">

                                </div>
                                <table id="dt_basic" class="display_education table table-striped table-bordered table-hover" width="100%">
                                    <thead>
                                    <tr>
                                        <th> Level </th>
                                        <th> Year </th>
                                        <th> GPA/Score</th>
                                        <th> Action </th>
                                    </tr>
                                    </thead>
                                    <tbody id="list-education" name="list-education">
                                     @foreach($EmployeeEducation as $EmployeeEducations)
                                        <tr id="education_id{{$EmployeeEducations->id}}">
                                            <td>
                                                <a href="{{url('/administration/employee-education/'.$EmployeeEducations->id.'/edit')}}" style="text-decoration:none;" class="">
                                                    {{$EmployeeEducations->name}}
                                                </a>
                                            </td>
                                            <td>{{$EmployeeEducations->year}}</td>
                                            <td>{{$EmployeeEducations->score}}</td>
                                            <td>
                                                <a data-id="" href="#" style="text-decoration:none;" class="delete-item">
                                                    <i class="glyphicon glyphicon-trash"  style="color:red;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                     @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">

                    <header>
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2> Skills </h2>
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
                                {{--<div class="row">--}}
                                    {{--<div class="col-lg-12 margin-tb">--}}
                                        {{--<div class="pull-right">--}}
                                            {{--<button id="show_skill"  type="button" class="btn btn-info">--}}
                                                {{--<i class="glyphicon glyphicon-plus-sign "></i> Add--}}
                                            {{--</button>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                {{--</div>--}}
                                {{--<br/>--}}

                                <div class="row">
                                    <div class="col-lg-12 margin-tb">
                                        <div class="pull-right">
                                            <a style="background: #333;" class="btn btn-primary" href="{{url('administration/employee-work-skills/create')}}" role="button">
                                                <i class="glyphicon glyphicon-plus-sign "></i> Add new</a>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div id="demo_skill">

                                </div>
                                <table id="dt_basic" class="display table table-striped table-bordered table-hover" width="100%">
                                    <thead>
                                    <tr>
                                        <th> Skill </th>
                                        <th> years_of_exp </th>
                                        <th> Description</th>
                                        <th> Action </th>
                                    </tr>
                                    </thead>
                                        <tbody id="products-list-skill" name="products-list-skill">
                                        @foreach($EmployeeSkill as $EmployeeSkills)
                                            <tr id="employee_skills_id{{$EmployeeSkills->id}}">
                                                <td><a  href="{{url('/administration/employee-work-skills/'.$EmployeeSkills->id.'/edit')}}" class="btn-detail">
                                                       {{$EmployeeSkills->name}}
                                                    </a>
                                                </td>
                                                <td>{{$EmployeeSkills->years_of_exp}}</td>
                                                <td>{{$EmployeeSkills->comments}}</td>
                                                <td>
                                                    <a data-id="" href="#" style="text-decoration:none;" class="delete-item">
                                                        <i class="glyphicon glyphicon-trash"  style="color:red;"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>

    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">

                    <header>
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2> Languages </h2>

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
                                {{--<div class="row">--}}
                                    {{--<div class="col-lg-12 margin-tb">--}}
                                        {{--<div class="pull-right">--}}
                                            {{--<button id="btn_language" type="button" class="btn btn-info">--}}
                                                {{--<i class="glyphicon glyphicon-plus-sign "></i> Add--}}
                                            {{--</button>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<br/>--}}
                                <div class="row">
                                    <div class="col-lg-12 margin-tb">
                                        <div class="pull-right">
                                            <a style="background: #333;" class="btn btn-primary" href="{{url('administration/employee-language/create')}}" role="button">
                                                <i class="glyphicon glyphicon-plus-sign "></i> Add new</a>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div id="demo_Language">

                                </div>
                                <table id="dt_basic" class="display_language table table-striped table-bordered table-hover" width="100%">
                                    <thead>
                                    <tr>
                                        <th> Languages </th>
                                        <th> Fluency </th>
                                        <th> Competency</th>
                                        <th> Comments </th>
                                        <th> Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="list-language" name="list-language">
                                    @foreach($EmployeeLanguage as $EmployeeLanguages)
                                        <tr id="language_id{{$EmployeeLanguages->id}}">
                                            <td>
                                                <a href="{{url('administration/employee-language/'.$EmployeeLanguages->id.'/edit')}}" class="btn-detail">
                                                    {{$EmployeeLanguages->name}}
                                                </a>
                                            </td>
                                            <td>{{$EmployeeLanguages->fluency}}</td>
                                            <td>{{$EmployeeLanguages->competency}}</td>
                                            <td>{{$EmployeeLanguages->comments}}</td>
                                            <td>
                                                <a data-id="" href="#" style="text-decoration:none;" class="delete-item">
                                                    <i class="glyphicon glyphicon-trash"  style="color:red;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">

                    <header>
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2> License </h2>

                    </header>
                    <!-- widget div-->
                    <div>

                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                        </div>
                        <header>
                        </header>
                        <br/>
                        <!-- widget div-->
                        <div>

                            <!-- widget edit box -->
                            <div class="jarviswidget-editbox">
                                <!-- This area used as dropdown edit box -->
                            </div>
                            <div class="widget-body">
                                {{--<div class="row">--}}
                                    {{--<div class="col-lg-12 margin-tb">--}}
                                        {{--<div class="pull-right">--}}
                                            {{--<button id="btn_license"  type="button" class="btn btn-info">--}}
                                                {{--<i class="glyphicon glyphicon-plus-sign "></i> Add--}}
                                            {{--</button>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                {{--</div>--}}
                                {{--<br/>--}}
                                <div class="row">
                                    <div class="col-lg-12 margin-tb">
                                        <div class="pull-right">
                                            <a style="background: #333;" class="btn btn-primary" href="{{url('administration/employee-license/create')}}" role="button">
                                                <i class="glyphicon glyphicon-plus-sign "></i> Add new</a>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <table id="dt_basic" class="display_license table table-striped table-bordered table-hover" width="100%">
                                    <thead>
                                    <tr>
                                        <th> License Type </th>
                                        <th> Issued Date </th>
                                        <th> Expiry Date</th>
                                        <th> Action </th>
                                    </tr>
                                    </thead>
                                    <tbody id="list-license" name="list-license">
                                    {{--@foreach($license as $licenses)--}}
                                        {{--<tr id="license_id{{$licenses->id}}">--}}
                                            {{--<td>--}}
                                                {{--<a href="{{url('/administration/employee-license/'.$licenses->id.'/edit')}}" class="btn-detail">--}}
                                                    {{--{{$licenses->license_number}}--}}
                                                {{--</a>--}}
                                            {{--</td>--}}
                                            {{--<td>{{$licenses->issued_date}}</td>--}}
                                            {{--<td>{{$licenses->expiry_date}}</td>--}}
                                            {{--<td>--}}
                                                {{--<a data-id="" href="#" style="text-decoration:none;" class="delete-item">--}}
                                                    {{--<i class="glyphicon glyphicon-trash"  style="color:red;"></i>--}}
                                                {{--</a>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                    {{--@endforeach--}}
                                    </tbody>
                                </table>
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
    <script>
        $(document).ready(function() {
            $('.datepicker_from').datepicker();
            // $(".datepicker_from").datepicker("setDate", new Date());
            $('#frmExperience').validate({
                rules: {
                    company: {
                        required: true,
                    },
                    job_titles : {
                        required: true,
                    },
                    from_date : {
                        required : true,
                    },
                    to_date : {
                        required : true,
                    }
                },
                submitHandle: function (e) {
                    
                }
            })
        });
    </script>
@endsection
