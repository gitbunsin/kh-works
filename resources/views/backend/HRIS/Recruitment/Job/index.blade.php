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
                                 Add new <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <br/>
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2> List all Vacancy</h2>
                    </header>
                    <!-- widget div-->
                    <div>
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
                                @foreach($jobVacancy as $jobVacancies)
                                    <tr>
                                        <td>
                                            <a href="{{url('/administration/post-jobs/'.$jobVacancies->id.'/edit')}}">{{$jobVacancies->name}}</a>

                                        </td>

                                        <td>{{$jobVacancies->employee->emp_lastname}}{{$jobVacancies->employee->emp_firstname}}</td>
                                        <td>{{$jobVacancies->jobtitle->name}}</td>
                                        <td><span class="label label-success">Active</span></td>
                                        <td>{{$jobVacancies->closingDate}}</td>
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