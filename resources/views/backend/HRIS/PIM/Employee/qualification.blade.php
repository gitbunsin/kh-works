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
                        <h2> Work Experience </h2>

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
                                            <button id="show" type="button" class="btn btn-info">
                                                <i class="glyphicon glyphicon-plus-sign "></i> Add
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <br/>
                                <div id="demo-experience">
                                    <form id="frmExperience"  class="smart-form">
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <fieldset>
                                            <div class="row">
                                                <section class="col col-6">
                                                    <label class="label"> Company *</label>
                                                    <label class="input">

                                                        <input type="text" name="company" id="company">

                                                    </label>
                                                </section>

                                                <section class="col col-6">
                                                    <label class="label">Job Title *</label>
                                                    <label class="input">
                                                        <input type="text" name="job_title" id="job_title">
                                                    </label>
                                                </section>
                                            </div>
                                            <div class="row">
                                                <section class="col col-6">
                                                    <label class="label"> From </label>
                                                    <label class="input">
                                                        <i class="icon-append fa fa-calendar"></i>
                                                        <input value="" type="text" id="from_date" name="from_date" class="datepicker_from">
                                                    </label>
                                                </section>
                                                <section class="col col-6">
                                                    <label class="label"> To </label>
                                                    <label class="input">
                                                        <i class="icon-append fa fa-calendar"></i>
                                                        <input value="" type="text" id="to_date" name="to_date" class="datepicker">
                                                    </label>
                                                </section>
                                            </div>
                                            <section>
                                                <label class="label">comment</label>
                                                <label class="input">
                                                    <input type="text" class="comment" id="comment">
                                                </label>
                                            </section>
                                        </fieldset>
                                        <footer>
                                            <input type="submit" class="btn btn-primary" id="btn-save_experience" value="add">
                                            <input type="hidden" id="product_id" name="product_id" value="0">
                                            <button data-toggle="collapse" data-target="#demo-experience" type="button" class="btn btn-default" id="btnclose" data-dismiss="modal">Close</button>
                                        </footer>
                                    </form>
                                </div>
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
                                    @foreach($employee_experience as $employee_experiences)
                                        <tr id="work_experience_id{{$employee_experiences->id}}">
                                            <td>
                                                <a data-id="{{$employee_experiences->id}}" href="#" style="text-decoration:none;" class="open_modal_experience">
                                                    {{$employee_experiences->eexp_employer}}
                                                </a>
                                            </td>
                                            <td>{{$employee_experiences->eexp_jobtit}}</td>
                                            <td>{{$employee_experiences->eexp_from_date}}</td>
                                            <td>{{$employee_experiences->eexp_to_date}}</td>
                                            <td>{{$employee_experiences->eexp_comments}}</td>
                                            <td>
                                                <a data-id="{{$employee_experiences->id}}" href="#" style="text-decoration:none;" class="delete-item">
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
                        <h2> Educations </h2>

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
                                <table id="dt_basic" class="display_education table table-striped table-bordered table-hover" width="100%">
                                    <thead>
                                    <tr>
                                        <th> Level </th>
                                        <th> Year </th>
                                        <th> GPA/Score</th>
                                        <th> Action </th>
                                    </tr>
                                    </thead>
                                    {{--<tbody id="products-list-skill" name="products-list">--}}
                                    {{--@foreach($employee_skill as $employee_skills)--}}
                                        {{--<tr id="employee_skills_id">--}}
                                            {{--<td> <a data-id="{{$employee_skills->employee_skill_id}}" href="#" class="btn-detail open_modal_skills">--}}
                                                    {{--{{$employee_skills->name}}--}}
                                                {{--</a>--}}
                                            {{--</td>--}}
                                            {{--<td>{{$employee_skills->years_of_exp}}</td>--}}
                                            {{--<td>{{$employee_skills->comments}}</td>--}}
                                            {{--<td>--}}
                                                {{--<a data-id="" href="#" style="text-decoration:none;" class="delete-item">--}}
                                                    {{--<i class="glyphicon glyphicon-trash"  style="color:red;"></i>--}}
                                                {{--</a>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                    {{--@endforeach--}}
                                    {{--</tbody>--}}
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
                                <div class="row">
                                    <div class="col-lg-12 margin-tb">
                                        <div class="pull-right">
                                            <button id="show_skill"  type="button" class="btn btn-info">
                                                <i class="glyphicon glyphicon-plus-sign "></i> Add
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <br/>
                                <div id="demo_skill">
                                    <form id="frmProducts_skill"  class="smart-form">
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <fieldset>
                                            <section>
                                                @php $skill = \App\Skill::all(); @endphp
                                                <label class="label"> Skills</label>
                                                <label class="select">
                                                    <select name="skills" id="skills">
                                                        <option value="0"> -- Select skills -- </option>
                                                        @foreach($skill as $skills)
                                                            <option value="{{$skills->id}}">{{$skills->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i></i>
                                                </label>
                                            </section>
                                            <div class="row">
                                                <section class="col col-6">
                                                    <label class="label"> Years of Experience *</label>
                                                    <label class="input">
                                                        <input type="number" name="year_of_experience" id="year_of_experience">
                                                    </label>
                                                </section>
                                                <section class="col col-6">
                                                    <label class="label"> comments *</label>
                                                    <label class="input">
                                                        <input type="text" name="comments" id="comments">
                                                    </label>
                                                </section>
                                            </div>
                                        </fieldset>
                                        <footer>
                                            <input type="button" class="btn btn-primary" id="btn_add_skills" value="add">
                                            <input type="hidden" id="product_id" name="product_id" value="0">
                                            <button  type="button" class="btn btn-default" id="btnclose_skill" data-dismiss="modal">Close</button>
                                        </footer>
                                    </form>
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
                                        <tbody id="products-list-skill" name="products-list">
                                        @foreach($employee_skill as $employee_skills)
                                            <tr id="employee_skills_id">
                                                <td> <a data-id="{{$employee_skills->employee_skill_id}}" href="#" class="btn-detail open_modal_skills">
                                                       {{$employee_skills->name}}
                                                    </a>
                                                </td>
                                                <td>{{$employee_skills->years_of_exp}}</td>
                                                <td>{{$employee_skills->comments}}</td>
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
        <div class="modal fade" id="myModal_skills" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                {{--<div class="modal-content">--}}
                <div class="modal-body">
                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <!-- Widget ID (each widget will need unique ID)-->
                        <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                            <header>
                                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                <h2> Skills * </h2>
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
                                            <section>
                                                @php $skill = \App\Skill::all(); @endphp
                                                <label class="label"> Skills</label>
                                                <label class="select">
                                                    <select name="skills" id="skills">
                                                        <option value="0"> -- Select skills -- </option>
                                                        @foreach($skill as $skills)
                                                            <option value="{{$skills->id}}">{{$skills->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i></i>
                                                </label>
                                            </section>
                                            <div class="row">
                                                <section class="col col-6">
                                                    <label class="label"> Years of Experience *</label>
                                                    <label class="input">
                                                        <input type="number" name="year_of_experience" id="year_of_experience">
                                                    </label>
                                                </section>
                                                <section class="col col-6">
                                                    <label class="label"> comments *</label>
                                                    <label class="input">
                                                        <input type="text" name="comments" id="comments">
                                                    </label>
                                                </section>
                                            </div>
                                        </fieldset>
                                        <footer>
                                            <input type="button" class="btn btn-primary" id="btn_add_skills" value="add">
                                            <input type="hidden" id="product_id" name="product_id" value="0">
                                            <button type="button" class="btn btn-default" id="btnclose" data-dismiss="modal">Close</button>
                                        </footer>
                                    </form>
                                </div>
                            {{--==================--}}
                            <!-- end widget content -->
                            </div>
                        </div>
                    </article>
                </div>
            </div>
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
                                <table id="dt_basic" class="display_language table table-striped table-bordered table-hover" width="100%">
                                    <thead>
                                    <tr>
                                        <th> Languages </th>
                                        <th> Fluency </th>
                                        <th> Competency</th>
                                        <th> Comments </th>
                                    </tr>
                                    </thead>
                                    {{--<tbody id="products-list-skill" name="products-list">--}}
                                    {{--@foreach($employee_skill as $employee_skills)--}}
                                    {{--<tr id="employee_skills_id">--}}
                                    {{--<td> <a data-id="{{$employee_skills->employee_skill_id}}" href="#" class="btn-detail open_modal_skills">--}}
                                    {{--{{$employee_skills->name}}--}}
                                    {{--</a>--}}
                                    {{--</td>--}}
                                    {{--<td>{{$employee_skills->years_of_exp}}</td>--}}
                                    {{--<td>{{$employee_skills->comments}}</td>--}}
                                    {{--<td>--}}
                                    {{--<a data-id="" href="#" style="text-decoration:none;" class="delete-item">--}}
                                    {{--<i class="glyphicon glyphicon-trash"  style="color:red;"></i>--}}
                                    {{--</a>--}}
                                    {{--</td>--}}
                                    {{--</tr>--}}
                                    {{--@endforeach--}}
                                    {{--</tbody>--}}
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
                                <table id="dt_basic" class="display_license table table-striped table-bordered table-hover" width="100%">
                                    <thead>
                                    <tr>
                                        <th> License Type </th>
                                        <th> Issued Date </th>
                                        <th> Expiry Date</th>
                                        <th> Action </th>
                                    </tr>
                                    </thead>
                                    {{--<tbody id="products-list-skill" name="products-list">--}}
                                    {{--@foreach($employee_skill as $employee_skills)--}}
                                    {{--<tr id="employee_skills_id">--}}
                                    {{--<td> <a data-id="{{$employee_skills->employee_skill_id}}" href="#" class="btn-detail open_modal_skills">--}}
                                    {{--{{$employee_skills->name}}--}}
                                    {{--</a>--}}
                                    {{--</td>--}}
                                    {{--<td>{{$employee_skills->years_of_exp}}</td>--}}
                                    {{--<td>{{$employee_skills->comments}}</td>--}}
                                    {{--<td>--}}
                                    {{--<a data-id="" href="#" style="text-decoration:none;" class="delete-item">--}}
                                    {{--<i class="glyphicon glyphicon-trash"  style="color:red;"></i>--}}
                                    {{--</a>--}}
                                    {{--</td>--}}
                                    {{--</tr>--}}
                                    {{--@endforeach--}}
                                    {{--</tbody>--}}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
    {{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>--}}
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
                    job_title : {
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
