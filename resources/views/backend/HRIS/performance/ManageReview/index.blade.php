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
                            <a style="background: #333;" class="btn btn-primary" href="{{url('administration/employee-performance-review/create')}}" role="button">
                                <i class="glyphicon glyphicon-plus-sign "></i> Add new</a>
                        </div>
                    </div>
                </div>
                <br/>
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2> Performance Reviews</h2>
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
                                    <th> Employee</th>
                                    <th> Due Date </th>
                                    <th> Review Period</th>
                                    <th> Job Title</th>
                                     <th> Status</th>
                                    <th> Action</th>
                                </tr>
                                </thead>
                                <tbody id="products-list" name="products-list">
                                {{--@foreach($p as $ps)--}}
                                    {{--<tr id="termination-reason{{$ps->id}}">--}}
                                        {{--<td>{{$ps->emp_firstname}}{{$ps->emp_lastname}}</td>--}}
                                        {{--<td>{{$ps->due_date}}</td>--}}
                                        {{--<td>{{$ps->work_period_start}}</td>--}}
                                        {{--<td></td>--}}
                                        {{--<td></td>--}}

                                        {{--<td>--}}
                                            {{--<a  href="{{url('/administration/employee-performance-review/'.$ps->id.'/edit')}}" style="text-decoration:none;" class="btn-detail open_modal">--}}
                                                {{--<i class="glyphicon glyphicon-edit"></i>--}}
                                            {{--</a>--}}
                                            {{--<a data-id="{{$ps->id}}" href="#" style="text-decoration:none;" class="delete-item">--}}
                                                {{--<i class="glyphicon glyphicon-trash"  style="color:red;"></i>--}}
                                            {{--</a>--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}
                                {{--@endforeach--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    {{--<script src="{{ asset('currenccurrency.js</script>--}}
@endsection
