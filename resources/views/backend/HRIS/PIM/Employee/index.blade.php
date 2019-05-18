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
                                            <td>
                                                <a href="{{url('/administration/employee-personal-details/'.$employees->emp_number)}}">
                                                 {{$employees->emp_firstname}}{{$employees->emp_middle_name}} {{$employees->emp_lastname}}
                                               </a>
                                            </td>
                                        @if($employees->JobTitle)
                                            <td>
                                                {{$employees->JobTitle->name}}
                                            </td>
                                        @else
                                            <td>

                                            </td>
                                            @endif

                                        @if($employees->EmploymentStatus)
                                            <td>
                                                {{$employees->EmploymentStatus->name}}
                                            </td>
                                        @else
                                            <td>

                                            </td>
                                            @endif

                                        @if($employees->WorkStation)
                                            <td>
                                                {{$employees->WorkStation->title}}
                                            </td>
                                          @else
                                            <td>

                                            </td>
                                            @endif

                                            <td></td>
                                            <td>
                                                <a data-id="" href="{{url('/administration/employee-personal-details')}}" style="text-decoration:none;" class="btn-detail">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                <form action="{{ url('/administration/employee', ['id' => $employees->emp_number]) }}" style="display:inline" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <a href="#" target="_blank" data-toggle="confirmation"  data-title="Are You Sure Delete?" class="">
                                                        <i class="glyphicon glyphicon-trash"  style="color:red;"></i>
                                                    </a>
                                                </form>
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
    </section>
    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->

@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.alert-success').fadeOut(5000);
            $('[data-toggle=confirmation]').confirmation({
                rootSelector: '[data-toggle=confirmation]',
                onConfirm: function (event, element) {
                    element.closest('form').submit();

                }
            });
        });
    </script>
@endsection