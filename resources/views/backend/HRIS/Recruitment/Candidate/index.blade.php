
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
                            <a style="background: #333;" class="btn btn-primary" href="{{url('administration/candidate/create')}}" role="button">
                                <i class="glyphicon glyphicon-plus-sign "></i> Add new</a>
                        </div>
                    </div>
                </div>
                <br/>
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <!-- widget options:
                    usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                    data-widget-colorbutton="false"
                    data-widget-editbutton="false"
                    data-widget-togglebutton="false"
                    data-widget-deletebutton="false"
                    data-widget-fullscreenbutton="false"
                    data-widget-custombutton="false"
                    data-widget-collapsed="true"
                    data-widget-sortable="false"

                    -->
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2>List all Candidate</h2>
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
                                    <th class="hasinput" style="width:18%">
                                        <input type="text" class="form-control" placeholder="Filter Name" />
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
                                        <input type="text" class="form-control" placeholder="Filter Number" />
                                    </th>
                                    <th class="hasinput" style="width:17%">
                                        <input type="text" class="form-control" placeholder="Filter Age" />
                                    </th>  <th class="hasinput" style="width:17%">
                                        <input type="text" class="form-control" placeholder="Filter Age" />
                                    </th>
                                </tr>
                                <tr>
                                    <th> Vacancy</th>
                                    <th> Candidate</th>
                                    <th> Hiring Manger </th>
                                    <th> Status</th>
                                    <th> Date-of-Application</th>
                                    <th style="text-align: center;" >Action</th>
                                </tr>
                                </thead>
                                <tbody id="products-list" name="products-list">
                                 @foreach($JobCandidate as $JobCandidates)
                                    <tr>
                                        <td>{{$JobCandidates->name}}</td>
                                        <td>
                                            <a href="{{url('/administration/candidate/'.$JobCandidates->Candidate_id.'/edit')}}">
                                                {{$JobCandidates->first_name}}{{$JobCandidates->middle_name}} {{$JobCandidates->last_name}}
                                            </a>
                                        </td>
                                        <td>{{$JobCandidates->email}}</td>
                                        <td> <span class="label label-success">{{$JobCandidates->CandidateStatus}}</span></td>
                                        <td>{{$JobCandidates->date_of_application}}</td>
                                        <td class="text-center sorting_1">
                                            {{--<div class="dropdown">--}}
                                                {{--<button style="padding:3px 7px;border-radius:5px;" class="btn btn-danger dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">Action--}}
                                                    {{--<span class="caret"></span></button>--}}
                                                {{--<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">--}}
                                                    {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">HTML</a></li>--}}
                                                    {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">CSS</a></li>--}}
                                                    {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">JavaScript</a></li>--}}
                                                    {{--<li role="presentation" class="divider"></li>--}}
                                                    {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">About Us</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                            <div class="dropdown">
                                                <a href="#" class="icon_action btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="padding:3px 7px;border-radius:5px;">
                                                    Action
                                                    <span class="caret"></span>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                    <li>
                                                        <form method="get" action="http://hrmsa.herokuapp.com/employee/profile">
                                                            <input type="hidden" name="id" value="8818">
                                                            <button type="submit" class="btn-link"> <i class="fa fa-user"></i> Profile </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form method="get" action="http://hrmsa.herokuapp.com/employee/edit">
                                                            <input type="hidden" name="id" value="8818">
                                                            <button type="submit" class="btn-link"> <i class="fa fa-edit"></i> Edit </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form method="post" action="http://hrmsa.herokuapp.com/employee/destroy" class="delete-form" data-name="Employee">
                                                            <input type="hidden" name="_token" value="6WkaKcu4nuyc2GHJ5HbWOEWT2zAvNCvr3lCNNRdK">
                                                            <input type="hidden" name="id" value="111">
                                                            <input type="hidden" name="_method" value="delete">
                                                            <button type="submit" class="btn-link"> <i class="fa fa-trash"></i> Delete </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        {{--<td>--}}
                                            {{--<a data-id="" id="approved" href="#" style="text-decoration:none;" class="btn-detail approved">--}}
                                                {{--<i class="glyphicon glyphicon-check "></i>--}}
                                            {{--</a>--}}
                                            {{--<a data-id="" id="declined" href="#" style="text-decoration:none;" class="btn-detail reject">--}}
                                                {{--<i class="glyphicon glyphicon-remove-sign"  style="color:red;"></i>--}}
                                            {{--</a>--}}
                                            {{--<ul>--}}
                                                {{--<li>--}}
                                                    {{--<form  action="{{url('administration/candidate-approved/'.$JobCandidates->id)}}" method="POST" >--}}
                                                            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                                                            {{--<input type="hidden" value="{{$JobCandidates->id}}" name="candidate_id"/>--}}
                                                            {{--<a href="#" onclick="$(this).closest('form').submit()" class="btn btn-labeled btn-success"> <i class="glyphicon glyphicon-ok"></i></a>--}}
                                                            {{--<a href="javascript:void(0);" class="btn btn-labeled btn-danger"> <i class="glyphicon glyphicon-remove"></i></a>--}}
                                                    {{--</form>--}}
                                                {{--</li>--}}
                                            {{--<div class="dropdown show">--}}
                                                {{--<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                                    {{--Dropdown link--}}
                                                {{--</a>--}}

                                                {{--<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">--}}
                                                    {{--<a class="dropdown-item" href="#">Action</a>--}}
                                                    {{--<a class="dropdown-item" href="#">Another action</a>--}}
                                                    {{--<a class="dropdown-item" href="#">Something else here</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</td>--}}
                                            {{--</ul>--}}
                                        {{--</td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>

@endsection
@section('script')
    <script src="https://cdn.rawgit.com/JDMcKinstry/JavaScriptDateFormat/master/Date.format.min.js"></script>
    {{--<script src="{{ asset('/js/hr/candidate.js') }}"></script>--}}
    <script>
        //delete product and remove it from TABLE list ***************************
        $(document).ready(function() {
            $(document).on('click', '.approved', function () {
                var confirmation = confirm("are you sure you want to approve ?");
                if (confirmation) {
                    var candidate_id = $(this).attr('data-id');
                   // alert(candidate_id);
                    $.ajax({
                        type: "POST",
                        cache: false,
                        url: '/administration/candidate-approved/' + candidate_id,
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        data: {candidate_id:candidate_id,"_token": "{{ csrf_token() }}"},
                        dataType: "Json",
                        success: function (data) {
                            var concatId = 'candidate_id'+ candidate_id;
                            concatId = concatId.replace(/\s/g, '');
                            document.getElementById(concatId).remove();
                            $("tbody>tr>td.dataTables_empty").show();
                        },
                        error: function (data) {
                            console.log(data);
                        }
                    });
                }
            });
        });

        $(document).ready(function() {
            $(document).on('click', '.reject', function () {
                var confirmation = confirm("are you sure you want to reject?");
                if (confirmation) {
                    var candidate_id = $(this).attr('data-id');
                    alert(candidate_id);
                    $.ajax({
                        type: "POST",
                        cache: false,
                        url: '/administration/candidate-reject/' + candidate_id,
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        data: {candidate_id:candidate_id,"_token": "{{ csrf_token() }}"},
                        dataType: "Json",
                        success: function (data) {
                            var concatId = 'candidate_id'+ candidate_id;
                            concatId = concatId.replace(/\s/g, '');
                            document.getElementById(concatId).remove();
                            $("tbody>tr>td.dataTables_empty").show();
                        },
                        error: function (data) {
                            console.log(data);
                        }
                    });
                }
            });
        });
    </script>


@endsection