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
                            <a style="background: #333;" class="btn btn-primary" href="{{url('administration/post-jobs/create')}}" role="button">
                                <i class="glyphicon glyphicon-plus-sign "></i> Add new</a>
                        </div>
                    </div>
                </div>
                <br/>
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2> List all Jobs</h2>
                    </header>
                    <!-- widget div-->
                    <div>
                        <!-- end widget edit box -->

                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <table id="datatable_fixed_column" class="table table-striped table-bordered" width="100%">
                                <thead>
                                <tr>
                                    <th class="hasinput" style="width:17%">
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
                                        <input type="text" class="form-control" placeholder="Filter Age" />
                                    </th>
                                    <th class="hasinput icon-addon">
                                        <input id="dateselect_filter" type="text" placeholder="Filter Date" class="form-control datepicker" data-dateformat="yy/mm/dd">
                                        <label for="dateselect_filter" class="glyphicon glyphicon-calendar no-margin padding-top-15" rel="tooltip" title="" data-original-title="Filter Date"></label>
                                    </th>
                                </tr>
                                <tr>
                                    <th data-class="expand">Vacancy Name</th>
                                    <th data-hide="phone">Hiring Manager</th>
                                    <th data-hide="phone">Job title</th>
                                    <th data-hide="phone">Status</th>
                                    <th data-hide="phone,tablet">Posting Date</th>
                                </tr>
                                </thead>
                                <tbody id="products-list" name="products-list">
                                @foreach($jobVacancy as $jobVacancys)
                                    <tr id="">
                                        <td>{{$jobVacancys->name}}</td>
                                        <td>{{$jobVacancys->emp_lastname}}{{$jobVacancys->emp_firstname}}</td>
                                        <td>{{$jobVacancys->name}}</td>
                                        <td><span class="label label-success">Active</span></td>
                                        <td></td>
                                        {{--<td>--}}
                                            {{--<a href="{{url('administration/post-jobs/'.$jobVacancys->id.'/edit')}}" style="text-decoration:none;" class="btn-detail">--}}
                                                {{--<i class="glyphicon glyphicon-edit"></i>--}}
                                            {{--</a>--}}
                                            {{--<a data-id="{{$jobVacancys->id}}" href="#" style="text-decoration:none;" class="delete-item">--}}
                                                {{--<i class="glyphicon glyphicon-trash"  style="color:red;"></i>--}}
                                            {{--</a>--}}
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
@endsection