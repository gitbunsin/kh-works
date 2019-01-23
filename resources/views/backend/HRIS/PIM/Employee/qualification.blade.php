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
                                <div class="row">
                                    <div class="col-lg-12 margin-tb">
                                        <div class="pull-right">
                                            <button id="btn_education" type="button" class="btn btn-info">
                                                <i class="glyphicon glyphicon-plus-sign "></i> Add
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div id="demo_Education">
                                    <form id="frmEducation"  class="smart-form">
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <fieldset>
                                            <div class="row">
                                                <section class="col col-4">
                                                    <label class="label">Level</label>
                                                    <label class="select">
                                                        <select name="level_id" id="level_id">
                                                            <option value="">-- Level --</option>
                                                            @php $e = \App\Education::all(); @endphp
                                                            @foreach($e as $es)
                                                                  <option value="{{$es->id}}">{{$es->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <i></i>
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="label">Institute *</label>
                                                    <label class="input">
                                                        <input type="text" name="institute_id" id="institute_id">
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="label">Major/Specialization *</label>
                                                    <label class="input">
                                                        <input type="text" name="major" id="major">
                                                    </label>
                                                </section>
                                            </div>
                                            <div>
                                                <div class="row">
                                                    <section class="col col-4">
                                                        <label class="label"> Year </label>
                                                        <label class="input">
                                                            <input value="" type="text" id="year" name="year" class="year">
                                                        </label>
                                                    </section>
                                                    <section class="col col-4">
                                                        <label class="label"> GPA/Score </label>
                                                        <label class="input">
                                                            <input  value="" type="text" id="gpa_id" name="year" class="gpa_id">
                                                        </label>
                                                    </section>
                                                    <section class="col col-4">
                                                        <label class="label"> Start Date </label>
                                                        <label class="input">
                                                            <i class="icon-append fa fa-calendar"></i>
                                                            <input value="" type="text" id="start_date" name="start_date" class="datepicker">
                                                        </label>
                                                    </section>
                                                </div>
                                                <section>
                                                    <label class="label"> End Date </label>
                                                    <label class="input">
                                                        <i class="icon-append fa fa-calendar"></i>
                                                        <input value="" type="text" id="end_date" name="end_date" class="datepicker">
                                                    </label>
                                                </section>

                                            </div>
                                        </fieldset>
                                        <footer>
                                            <input type="submit" class="btn btn-primary" id="btn_save_education" value="">
                                            <input type="hidden" id="education_id" name="product_id" value="0">
                                            <button data-toggle="collapse" data-target="#demo-experience" type="button" class="btn btn-default" id="btnclose_education" data-dismiss="modal">Close</button>
                                        </footer>
                                    </form>
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
                                     @foreach($employee_education as $es)
                                        <tr id="education_id{{$es->id}}">
                                           <td> <a data-id="{{$es->id}}" href="#" class="btn-detail education_edit">
                                                       {{$es->name}}
                                                    </a>
                                                </td>
                                            <td>{{$es->year}}</td>
                                            <td>{{$es->score}}</td>
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
                                            <input type="hidden" id="skill_id" name="skill_id" value="0">
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
                                        <tbody id="products-list-skill" name="products-list-skill">
                                        @foreach($employee_skill as $employee_skills)
                                            <tr id="employee_skills_id{{$employee_skills->id}}">
                                                <td><a data-id="{{$employee_skills->employee_skill_id}}" href="#" class="btn-detail edit_skill">
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
                                <div class="row">
                                    <div class="col-lg-12 margin-tb">
                                        <div class="pull-right">
                                            <button id="btn_language" type="button" class="btn btn-info">
                                                <i class="glyphicon glyphicon-plus-sign "></i> Add
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div id="demo_Language">
                                    <form id="frmLanguage"  class="smart-form">
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <fieldset>
                                            <div class="row">
                                                <section class="col col-6">
                                                    <label class="label">Language</label>
                                                    <label class="select">
                                                        <select name="lang_id" id="lang_id">
                                                            <option value="">-- select --</option>
                                                            @php $l = \App\language::all(); @endphp
                                                            @foreach($l as $ls)
                                                                <option value="{{$ls->id}}">{{$ls->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <i></i>
                                                    </label>
                                                </section>
                                                <section class="col col-6">
                                                    <label class="label">Fluency</label>
                                                    <label class="select">
                                                        <select name="fluency_id" id="fluency_id">
                                                            <option value="">-- select --</option>
                                                            @php $p = array('Poor','Basic','Good','Mother Tough'); @endphp
                                                            @foreach($p as $ps)
                                                                <option value="{{$ps}}">{{$ps}}</option>
                                                            @endforeach
                                                        </select>
                                                        <i></i>
                                                    </label>
                                                </section>
                                            </div>
                                            <div class="row">
                                                <section class="col col-6">
                                                    <label class="label"> Competency *</label>
                                                    <label class="select">
                                                        <select name="competency_id" id="competency_id">
                                                            <option value="">-- select --</option>
                                                            @php $f = array('writing','speaking','reading'); @endphp
                                                            @foreach($f as $fs)
                                                                <option value="{{$fs}}">{{$fs}}</option>
                                                            @endforeach
                                                        </select>
                                                        <i></i>
                                                    </label>
                                                </section>
                                                <section class="col col-6">
                                                    <label class="label">comments *</label>
                                                    <label class="input">
                                                        <input name="comments_id" id="comments_id" type="text"/>
                                                    </label>
                                                </section>
                                            </div>
                                            <footer>
                                                <input type="button" class="btn btn-primary" id="btn_add_language" value="add">
                                                <input type="hidden" id="product_id" name="product_id" value="0">
                                                <button type="button" class="btn btn-default" id="btnclose_language" data-dismiss="modal">Close</button>
                                            </footer>
                                        </fieldset>
                                    </form>
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
                                    @foreach($language as $languages)
                                        <tr id="language_id{{$languages->id}}">
                                            <td> <a data-id="{{$languages->id}}" href="#" class="btn-detail open_modal_skills">
                                                    {{$languages->name}}
                                                </a>
                                            </td>
                                            <td>{{$languages->fluency}}</td>
                                            <td>{{$languages->competency}}</td>
                                            <td>{{$languages->comments}}</td>
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
                                <div class="row">
                                    <div class="col-lg-12 margin-tb">
                                        <div class="pull-right">
                                            <button id="btn_license"  type="button" class="btn btn-info">
                                                <i class="glyphicon glyphicon-plus-sign "></i> Add
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <br/>
                                <div id="demo_license">
                                    <form id="frmProducts_license"  class="smart-form">
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <fieldset>
                                            <div class="row">
                                            <section class="col col-6">
                                                @php $l = \App\LicenseType::all(); @endphp
                                                <label class="label"> License Type</label>
                                                <label class="select">
                                                    <select name="license_type_id" id="license_type_id">
                                                        <option value=""> -- Select license -- </option>
                                                        @foreach($l as $ls)
                                                            <option value="{{$ls->id}}">{{$ls->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i></i>
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label class="label"> License Number *</label>
                                                <label class="input">
                                                    <input  type="number" name="license_number" id="license_number">
                                                </label>
                                            </section>
                                        </div>
                                            <div class="row">
                                                <section class="col col-6">
                                                    <label class="label"> Issued Date *</label>
                                                    <label class="input">
                                                        <i class="icon-append fa fa-calendar"></i>
                                                        <input class="datepicker" type="text" name="issued_date" id="issued_date">
                                                    </label>
                                                </section>
                                                <section class="col col-6">
                                                    <label class="label"> Expiry Date *</label>
                                                    <label class="input">
                                                        <i class="icon-append fa fa-calendar"></i>
                                                        <input class="datepicker" type="text" name="expiry_date" id="expiry_date">
                                                    </label>
                                                </section>
                                            </div>
                                        </fieldset>
                                        <footer>
                                            <input type="button" class="btn btn-primary" id="btn_save_license" value="add">
                                            <input type="hidden" id="product_id" name="product_id" value="0">
                                            <button  type="button" class="btn btn-default" id="btnclose_license" data-dismiss="modal">Close</button>
                                        </footer>
                                    </form>
                                </div>
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
                                    @foreach($license as $licenses)
                                        <tr id="license_id{{$licenses->id}}">
                                            <td>
                                                <a data-id="{{$licenses->id}}" href="#" class="btn-detail open_modal_skills">
                                                    {{$licenses->license_number}}
                                                </a>
                                            </td>
                                            <td>{{$licenses->issued_date}}</td>
                                            <td>{{$licenses->expiry_date}}</td>
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
