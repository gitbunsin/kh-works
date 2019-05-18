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
                                    <th class="hasinput" style="width:18%">
                                        <input type="text" class="form-control" placeholder="Filter Interview Name" />
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
                                    </th>
                                </tr>
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
                                    <tr>
                                        <td>
                                            <a href="#">
                                                {{$Interviews->candidate->first_name}}{{$Interviews->candidate->last_name}}
                                            </a>
                                        </td>
                                        @if($Interviews->CandidateVacancy->status =="HIRED")
                                        <td>
                                            {{$Interviews->interview_date}}
                                        </td>
                                        @else
                                            <td>
                                                <a href="#" id="combodate1"
                                                   class="update" data-name="interview_date"
                                                   data-type="combodate"
                                                   data-roundTime=false
                                                   data-pk="{{$Interviews->id}}"
                                                   data-id="{{$Interviews->id}}"
                                                   data-title="Select date">{{$Interviews->interview_date}}</a>
                                            </td>
                                        @endif
                                        @if($Interviews->CandidateVacancy->status =="HIRED")
                                        <td>
                                            {{date('h:i A', strtotime($Interviews->interview_time))}}
                                        </td>
                                        @else
                                            <td>
                                                <a href="#" id="combodate2"
                                                   class="update" data-name="interview_time"
                                                   data-type="combodate"
                                                   data-roundTime=false
                                                   data-pk=""
                                                   data-title="Select date">{{date('h:i A', strtotime($Interviews->interview_time))}}</a>
                                            </td>
                                        @endif
                                        @if($Interviews->CandidateVacancy->status =="HIRED")
                                        <td>
                                           {{$Interviews->note}}
                                        </td>
                                        @else
                                            <td>
                                                <a href="#"
                                                   id="comments"
                                                   data-type="textarea"
                                                   data-pk="1"
                                                   data-placeholder="Your note here..."
                                                   data-original-title="Enter notes"
                                                   class="editable update editable-pre-wrapped editable-click">{{$Interviews->note}}</a>
                                            </td>
                                        @endif
                                        @if($Interviews->CandidateVacancy->status =="INTERVIEW PASS")
                                        <td class="">
                                            <a  href="{{url('administration/Candidate-Offer-Job/'.$Interviews->id)}}" style="text-decoration:none;" class="">
                                                JOB OFFER
                                            </a>/
                                            <a  href="{{url('administration/candidate-reject/'.$Interviews->id)}}" style="color:red;text-decoration:none;" class="">
                                                REJECT
                                            </a>
                                        </td>
                                            @elseif($Interviews->CandidateVacancy->status =="SCHEDULE INTERVIEW")
                                            <td>
                                                <a  href="{{url('administration/Candidate-Interview-Pass/'.$Interviews->id)}}" style="text-decoration:none;" class="">
                                                    PASS
                                                </a>/
                                                <a  href="{{url('administration/Candidate-Interview-Fail/'.$Interviews->id)}}" style="color:red;text-decoration:none;" class="">
                                                    FAIL
                                                </a>/
                                                <a  href="{{url('administration/candidate-reject/'.$Interviews->id)}}" style="color:red;text-decoration:none;" class="">
                                                    REJECT
                                                </a>
                                            </td>
                                            @elseif($Interviews->CandidateVacancy->status == "OFFER  JOB")
                                            <td>
                                                <a  href="{{url('administration/Candidate-decline-Job/'.$Interviews->id)}}" style="text-decoration:none;" class="">
                                                   DECLINE OFFER
                                                </a>/
                                                <a  href="{{url('administration/Candidate-hire-Job/'.$Interviews->id)}}" style="color:brown;text-decoration:none;" class="">
                                                    HIRE
                                                </a>/
                                                <a  href="{{url('administration/candidate-reject/'.$Interviews->id)}}" style="color:red;text-decoration:none;" class="">
                                                    REJECT
                                                </a>
                                            </td>
                                            @elseif($Interviews->CandidateVacancy->status == "OFFER  DECLINED")
                                            <td>
                                                <a  href="{{url('administration/candidate-reject/'.$Interviews->id)}}" style="color:red;text-decoration:none;" class="">
                                                    REJECT
                                                </a>
                                            </td>
                                            @elseif($Interviews->CandidateVacancy->status=="Hired")
                                            <td>

                                            </td>
                                            @elseif($Interviews->CandidateVacancy->status =="REJECT")
                                            <td>

                                            </td>
                                            @elseif($Interviews->CandidateVacancy->status == "INTERVIEW FAIL")
                                            <td>
                                                <a  href="{{url('administration/candidate-reject/'.$Interviews->id)}}" style="color:red;text-decoration:none;" class="">
                                                    REJECT
                                                </a>
                                            </td>
                                            @endif
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
    <script type="text/javascript">
        // =================if fail=======================

        $.fn.combodate.defaults.minYear = 2010;
        $.fn.combodate.defaults.maxYear = 2531;
        $(document).ready(function(){
            // $('.edit').editable('/meh.php');
            $.ajaxSetup({
                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            var interview_id = $('#combodate1').attr('data-id');
            // alert($interview_id);
            $('#combodate1').editable({
                pk : interview_id,
                url: '/administration/update-interview-date/'+ interview_id ,
                type: 'Json',
                interview_date: 'interview_date',
                title: 'Enter note',
                ajaxOptions:{
                    type:'post'
                } ,
                 success: function(data) {
                  console.log(data);
                },
                error:function () {

                }
            });
            $("#combodate2").editable({
                template: 'hh : mm A',
                format: 'hh:mm A',
                viewformat: 'hh:mm A',
                pk: interview_id,
                url: '/administration/update-interview-time/'+interview_id,
                type: 'Json',
                name: 'interview_time',
                title: 'Enter note',
                ajaxOptions:{
                    type:'post'
                } ,
                success: function(data) {

                    console.log(data);
                },
                error:function () {

                }

            });
            $('.update').editable({
                pk: interview_id,
                url: '/administration/update-interview-note/'+interview_id,
                type: 'text',
                name: 'name',
                title: 'Enter note',
                ajaxOptions:{
                    type:'post'
                } ,
                success: function(data) {

                    console.log(data);
                },
                error:function () {

                }

            });
        });
    </script>
@endsection