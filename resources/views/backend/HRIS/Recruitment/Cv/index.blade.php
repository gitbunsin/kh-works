@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                {{--<div class="pull-right">--}}
                    {{--<a href="{{url('administration/cv/create')}}"><h4 class="alert-heading"><i style="font-size:30px;" class="fa fa-plus-square"></i></h4></a>--}}
                {{--</div>--}}
                {{--<br/><br/>--}}
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2> Query CV </h2>
                    </header>
                    <!-- widget div-->
                    <div>
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">

                        </div>
                        <div class="widget-body no-padding">

                            <table id="datatable_fixed_column" class="table table-striped table-bordered" width="100%">
                                <thead>
                                <tr>
                                    <th class="hasinput" style="width:3%">
                                        <input type="text" class="form-control" placeholder="CV ID" />
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
                                        {{--<input type="text" class="form-control" placeholder="Filter Age" />--}}
                                    </th>
                                </tr>
                                <tr>
                                    <th data-class="expand"> CVs ID</th>
                                    <th data-class="expand"> Seekers Name</th>
                                    <th data-class="expand"> Candidate CV</th>
                                    <th data-class="expand" style="text-align: center;"> Download </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($CandidateAttachment as $CandidateAttachments)
                                    <tr>
                                        <td>{{$CandidateAttachments->id}}</td>
                                        <td>{{$CandidateAttachments->first_name}} {{$CandidateAttachments->last_name}}</td>
                                        <td>{{$CandidateAttachments->file_name}}</td>
                                        {{--<td></td>--}}
                                        {{--<td><img class="img-circle" width="90px;" height="70px;" src="{{asset('uploaded/UserPhoto/'.$user_cvs->user_photo)}}"></td>--}}
                                        {{--<td><a href="{{url('administration/download/'.$user_cvs->user_cv_id)}}">{{$user_cvs->cv_name}} </a></td>--}}
                                        <td style="text-align: center;">
                                            <a data-id="{{$CandidateAttachments->id}}" href="{{url('administration/download/'.$CandidateAttachments->id)}}" style="text-decoration:none;" class="btn-detail open_modal">
                                                <i class="fa fa-2x fa-download"></i>
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
@endsection