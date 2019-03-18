@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2> List all Jobs</h2>
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
                                    <th>Interview Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>note</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Interview as $Interviews)
                                    <tr id="candidate_id{{$Interviews->candidate_id}}">
                                        <td>{{$Interviews->name}}</td>
                                        <td>
                                            <a href="#" id="combodate1"
                                               class="update" data-name="interview_date"
                                               data-type="combodate"
                                               data-roundTime=false
                                               data-pk=""
                                               data-title="Select date">
                                                {{--{{$Interviews->interview_date}}--}}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" id="combodate2"
                                               class="update" data-name="interview_time"
                                               data-type="combodate"
                                               data-roundTime=false
                                               data-pk=""
                                               data-title="Select date">
                                              {{--{{date('h:i A', strtotime($Interviews->interview_time))}}--}}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="" class="update"
                                               data-name="note"
                                               data-type="text"
                                               data-pk=""
                                               data-title="Enter note">
                                            </a>
                                        </td>
                                        <td class="text-center sorting_1">
                                            <div class="dropdown">
                                                <a href="#" class="icon_action btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="padding:3px 7px;border-radius:5px; ">
                                                    Action
                                                    <span class="caret"></span>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                    <li>
                                                        <form method="get" action="http://hrmsa.herokuapp.com/employee/profile">
                                                            <input type="hidden" name="id" value="8818">
                                                            <button type="submit" class="btn-link"> <i class="fa fa-mail-forward "></i> Pass </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form method="get" action="http://hrmsa.herokuapp.com/employee/edit">
                                                            <input type="hidden" name="id" value="8818">
                                                            <button type="submit" class="btn-link"> <i class="fa  fa-file "></i> Fail </button>
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
    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://www.appelsiini.net/download/jquery.jeditable.mini.js"></script>
    <script type="text/javascript">
        //delete product and remove it from TABLE list ***************************
        $(document).on('click','.pass',function(){
            var confirmation = confirm("are you agrees this candidate ?");
            if(confirmation) {
                var candidate_id = $(this).attr('data-id');
                alert(candidate_id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    cache: false,
                    url: '/administration/pass-interview/' + candidate_id,
                    dataType: "Json",
                    success: function (data) {
                        // alert(JSON.stringify(data));
                        var concatId = 'candidate_id'+candidate_id;
                        concatId = concatId.replace(/\s/g, '');
                        document.getElementById(concatId).remove();
                        $("tbody>tr>td.dataTables_empty").show();

                    },
                    error: function (data) {
                        alert(JSON.stringify(data));
                    }
                });
            }
        });
        // =================if fail=======================
        $(document).on('click','.fail',function(){
            var confirmation = confirm("are you reject this candidate ?");
            if(confirmation) {
                var candidate_id = $(this).attr('data-id');
                // alert(candidate_id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    cache: false,
                    url: '/administration/fail-interview/' + candidate_id,
                    dataType: "Json",
                    success: function (data) {
                        alert(JSON.stringify(data));
                        var concatId = 'candidate_id'+candidate_id;
                        concatId = concatId.replace(/\s/g, '');
                        document.getElementById(concatId).remove();
                        $("tbody>tr>td.dataTables_empty").show();
                    },
                    error: function (data) {
                        alert(JSON.stringify(data));
                    }
                });
            }
        });
        $(document).ready(function(){
            // $('.edit').editable('/meh.php');
            $.ajaxSetup({
                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $("#combodate1").editable({
                // template: 'MM / DD / YYYY ',
                // format: 'MM/DD/YYYY',
                // viewformat: 'MM/DD/YYYY',
                // mode: 'inline',
                // combodate:{
                //     showbuttons: true,
                //     roundTime: false,
                //     smartDays: true
                // },
                url: '/administration/update-user',
                type: 'text',
                pk: 1,
                interview_date: 'interview_date',
                title: 'Enter note'
            });
            $("#combodate2").editable({
                template: 'hh : mm A',
                format: 'hh:mm A',
                viewformat: 'hh:mm A',
                // mode: 'inline',
                // combodate:{
                //     showbuttons: true,
                //     roundTime: false,
                //     smartDays: true,
                //     minuteStep: 1
                // },
                url: '/administration/update-user',
                type: 'text',
                pk: 1,
                name: 'interview_time',
                title: 'Enter note'
            });
            $('.update').editable({
                url: '/administration/update-user',
                type: 'text',
                pk: 1,
                name: 'name',
                title: 'Enter note'

            });
        });


    </script>
@endsection