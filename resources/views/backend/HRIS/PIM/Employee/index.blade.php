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
                        <h2> List all Employee</h2>
                    </header>
                    <!-- widget div-->
                    <div>
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                        </div>
                        <!-- end widget edit box -->

                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <table id="datatable_fixed_column" class="table table-striped table-bordered" width="100%">
                                <thead>
                                <tr>
                                    <th class="hasinput" style="">
                                        {{--<input type="text" class="form-control" placeholder="Filter Name" />--}}
                                    </th>
                                    <th class="hasinput" style="width:18%">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="Filter Position" type="text">
                                        </div>
                                    </th>
                                    <th class="hasinput" style="width:16%">
                                        <input type="text" class="form-control" placeholder="Filter Office" />
                                    </th>
                                    <th class="hasinput" style="width:17%">
                                        <input type="text" class="form-control" placeholder="Filter Age" />
                                    </th>
                                    <th class="hasinput" style="width:17%">
                                        <input type="text" class="form-control" placeholder="Filter Age" />
                                    </th>
                                    <th class="hasinput" style="width:17%">
                                        <input type="text" class="form-control" placeholder="Filter Age" />
                                    </th>
                                    <th class="hasinput" style="width:17%">
                                        <input type="text" class="form-control" placeholder="Filter Age" />
                                    </th>
                                    <th class="hasinput" style="width:17%">
                                        {{--<input type="text" class="form-control" placeholder="Filter Age" />--}}
                                    </th>
                                </tr>
                                <tr>
                                    <th> id </th>
                                    <th> First (& Middle) Name</th>
                                    <th> Last Name</th>
                                    <th> Job Title</th>
                                    <th> Employee Status</th>
                                    <th> Sub Unit</th>
                                    <th> Supervisor</th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                <tbody id="products-list" name="products-list">
                                {{--@foreach($JobTitle as $JobTitles)--}}
                                    @foreach($employee as $employees)
                                    <tr>
                                            <td>{{$employees->emp_number}}</td>
                                            <td>{{$employees->emp_firstname}} {{$employees->emp_lastname}}</td>
                                            <td>{{$employees->emp_middle_name}}</td>
                                            <td>
                                                {{--{{$JobTitles->name}}--}}
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <a data-id="" href="{{url('/administration/employee-personal-details')}}" style="text-decoration:none;" class="btn-detail">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                <a data-id="" href="#" style="text-decoration:none;" class="delete-item">
                                                    <i class="glyphicon glyphicon-trash"  style="color:red;"></i>
                                                </a>
                                            </td>
                                    </tr>
                                    @endforeach
                                {{--@endforeach--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <input id="url" type="hidden" value="{{ \Request::url() }}">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
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
                                                <section class="col col-4">
                                                    <label class="label">First Name</label>
                                                    <label class="input">
                                                        <input type="text" name="emp_firstname" id="emp_firstname">
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="label">Middle Name</label>
                                                    <label class="input">
                                                        <input  type="text" name="emp_middle_name" id="emp_middle_name" maxlength="10">
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="label">Last Name</label>
                                                    <label class="input">
                                                        <input  type="text" name="emp_lastname" id="emp_lastname" maxlength="10">
                                                    </label>
                                                </section>
                                            </div>
                                            <div class="row">
                                                <section class="col col-4">
                                                    <label class="label"> Employee Id</label>
                                                    <label class="input">
                                                        <input type="text" name="employee_id" id="employee_id" maxlength="10">
                                                    </label>
                                                    <div class="note">
                                                        <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                                    </div>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="label">Job Title</label>
                                                    <label class="select">
                                                        @php $job_titles = \App\Model\JobTitle::all(); @endphp
                                                        <select name="job_titles" id="Job_title">
                                                            @foreach($job_titles as $job_title)
                                                                <option value="{{$job_title->id}}">{{$job_title->job_titles}}</option>
                                                            @endforeach
                                                        </select>
                                                        <i></i>
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="label"> Employee Photo</label>
                                                    <div style="width:200px;height: 200px; border: 1px solid whitesmoke ;text-align: center;position: relative" id="image">
                                                        <img width="100%" height="100%" id="preview_image" src="{{asset('images/default.png')}}"/>
                                                        <i id="loading" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display: none"></i>
                                                    </div>
                                                    <p>
                                                        <a href="javascript:changeProfile()" style="text-decoration: none;">
                                                            <i class="glyphicon glyphicon-edit"></i> Change
                                                        </a>&nbsp;&nbsp;
                                                        <a href="javascript:removeFile()" style="color: red;text-decoration: none;">
                                                            <i class="glyphicon glyphicon-trash"></i>
                                                            Remove
                                                        </a>
                                                    </p>
                                                    <input type="file" id="file" style="display: none"/>
                                                    <input type="hidden" id="file_name"/>
                                                </section>
                                            </div>
                                            <section>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="checkbox-login" id="checkbox-login">
                                                    <i></i><strong> Create Login Details</strong>
                                                </label>
                                            </section>
                                            <div id="div_login">
                                                <div  class="row">
                                                    <section  class="col col-6">
                                                        <label class="label"> Username *</label>
                                                        <label class="input">
                                                            <input type="text" name="user_name" id="user_name" maxlength="10">
                                                        </label>
                                                    </section>
                                                    <section  class="col col-6">
                                                        <label class="label"> email *</label>
                                                        <label class="input">
                                                            <input type="email" name="user_email" id="user_email" >
                                                        </label>
                                                    </section>
                                                </div>
                                                <div id="" class="row">
                                                    <section  class="col col-6">
                                                        <label class="label"> Password *</label>
                                                        <label class="input">
                                                            <input type="password" name="user_password" id="user_password" maxlength="10">
                                                        </label>
                                                        <div class="note">
                                                            <strong>Note:</strong> For a strong password, please use a hard to guess combination of text with upper and lower
                                                            case characters, symbols and numbers
                                                        </div>
                                                    </section>
                                                    <section class="col col-6">
                                                        <label class="label"> Confirm Password ** </label>
                                                        <label class="input">
                                                            <input type="password" id="emp_confimpassword" name="emp_confimpassword">
                                                        </label>
                                                    </section>
                                                </div>
                                            </div>
                                            <section>
                                                <label class="label">Active</label>
                                                <div class="inline-group">
                                                    <label class="checkbox">
                                                        <input  type="checkbox"  name="checkbox-inline" checked>
                                                        <i></i>
                                                    </label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="checkbox-inline" checked>
                                                        <i></i>Publish in RSS feed(1) and web page(2)
                                                    </label>
                                                </div>
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

@endsection
@section('script')
@endsection