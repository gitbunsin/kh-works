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
                            <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th data-hide="phone"> Name</th>
                                    <th data-class="expand"> Relationship</th>
                                    <th>Home Telephone</th>
                                    <th>Mobile</th>
                                    <th>Work Telephone</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                @php //dd($EmergencyContact) @endphp
                                @foreach($EmergencyContact as $EmergencyContacts)
                                    <tbody id="products-list" name="products-list">
                                    <tr id="emergency_id{{$EmergencyContacts->id}}">
                                        <td>{{$EmergencyContacts->eec_name}}</td>
                                        <td>{{$EmergencyContacts->eec_relationship}}</td>
                                        <td>{{$EmergencyContacts->eec_home_no}}</td>
                                        <td>{{$EmergencyContacts->eec_mobile_no}}</td>
                                        <td>{{$EmergencyContacts->eec_office_no}}</td>
                                        <td>
                                            <a data-id="{{$EmergencyContacts->id}}" href="#" style="text-decoration:none;" class="btn-detail open_modal">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                            <a data-id="{{$EmergencyContacts->id}}" href="#" style="text-decoration:none;" class="delete-item">
                                                <i class="glyphicon glyphicon-trash"  style="color:red;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{ asset('/js/hr/employee.js') }}"></script>
@endsection