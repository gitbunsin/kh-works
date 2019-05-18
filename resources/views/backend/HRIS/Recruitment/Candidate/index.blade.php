
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
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
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
                                        <td>
                                            @foreach($JobCandidates->vacancies as $vacancy)
                                                {{$vacancy->name}}
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{url('/administration/candidate/'.$JobCandidates->id.'/edit')}}">
                                                {{$JobCandidates->first_name}}{{$JobCandidates->middle_name}} {{$JobCandidates->last_name}}
                                            </a>
                                        </td>
                                        <td>
                                            @php $employee = \App\Model\Employee::where('emp_number',$JobCandidate[0]->vacancies[0]->hiring_manager_id)->first(); @endphp
                                            {{$employee->emp_lastname}}{{$employee->emp_firstname}}
                                        </td>
                                        <td>
                                            @foreach($JobCandidates->vacancies as $vacancy)
                                                <span class="label label-success">{{$vacancy->pivot->status}}</span>
                                            @endforeach
                                        </td>
                                        <td>{{$JobCandidates->date_of_application}}</td>


                                        @foreach($JobCandidates->vacancies as $vacancy)
                                            @if($vacancy->pivot->status =="APPLICATION INITIATED")
                                                <td class="sorting_1">
                                                    <a  href="{{url('administration/candidate-shortlist/'.$JobCandidates->id)}}" style="text-decoration:none;" class="">
                                                        SHORT LIST
                                                    </a>/
                                                    <a  href="{{url('administration/CandidateRejectList/'.$JobCandidates->id)}}" style="color:red;text-decoration:none;" class="">
                                                        REJECT
                                                    </a>
                                                </td>
                                            @elseif($vacancy->pivot->status =="SHORT LIST")
                                                <td class="sorting_1">
                                                    <a  href="{{url('administration/candidate-Schedule-Interview/'.$JobCandidates->id)}}" style="text-decoration:none;" class="">
                                                        SCHEDULE
                                                    </a>/
                                                    <a  href="{{url('administration/CandidateRejectList/'.$JobCandidates->id)}}" style="color:red;text-decoration:none;" class="">
                                                        REJECT
                                                    </a>
                                                </td>
                                            @else
                                                <td>

                                                </td>
                                            @endif
                                        @endforeach
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