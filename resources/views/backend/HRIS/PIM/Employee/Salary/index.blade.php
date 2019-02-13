@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2> Employee Salary</h2>
                    </header>
                    <!-- widget div-->
                    <div>
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                        </div>
                        <!-- end widget edit box -->
                        <!-- widget content -->
                        {{--<div class="widget-body no-padding">--}}
                        {{--</div>--}}
                        <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>
                            <tr>
                                <th> Salary Component</th>
                                <th> Pay Frequency</th>
                                <th> Currency</th>
                                <th> Amount</th>
                                <th> Comments</th>
                                <th> Show Direct Deposit Details</th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody id="products-list" name="products-list">
                            <tr id="employee_id">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a data-id="" href="" style="text-decoration:none;" class="btn-detail">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    <a data-id="" href="#" style="text-decoration:none;" class="delete-item">
                                        <i class="glyphicon glyphicon-trash"  style="color:red;"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </article>
        </div>
    </section>
    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{ asset('/js/hr/employee.js') }}"></script>
@endsection