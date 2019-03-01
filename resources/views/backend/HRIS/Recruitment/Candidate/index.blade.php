
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

                            <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th> Vacany</th>
                                    <th> Candidate</th>
                                    <th> email </th>
                                    <th> Date-of-Application</th>
                                    <th style="text-align: center;" >Interview</th>
                                </tr>
                                </thead>
                                <tbody id="products-list" name="products-list">
                                 @foreach($candidate as $candidates)
                                    <tr id="candidate_id{{$candidates->candidate_id}}">
                                        <td>{{$candidates->job_titles}}</td>
                                        <td>{{$candidates->name}}</td>
                                        <td>{{$candidates->email}}</td>
                                        <td>{{$candidates->applied_date}}</td>
                                        <td style="text-align: center;">
                                            <a data-id="{{$candidates->candidate_id}}" id="approved" href="#" style="text-decoration:none;" class="btn-detail approved">
                                                <i class="glyphicon glyphicon-check "></i>
                                            </a>
                                            <a data-id="{{$candidates->candidate_id}}" id="declined" href="#" style="text-decoration:none;" class="btn-detail reject">
                                                <i class="glyphicon glyphicon-remove-sign"  style="color:red;"></i>
                                            </a>
                                        </td>
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/JDMcKinstry/JavaScriptDateFormat/master/Date.format.min.js"></script>
    {{--<script src="{{ asset('/js/hr/candidate.js') }}"></script>--}}
    <script>
        //delete product and remove it from TABLE list ***************************
        $(document).ready(function() {
            $(document).on('click', '.approved', function () {
                var confirmation = confirm("are you sure you want to approve ?");
                if (confirmation) {
                    var candidate_id = $(this).attr('data-id');
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