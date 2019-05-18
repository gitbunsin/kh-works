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
                            <a style="background: #333;" class="btn btn-primary" href="{{url('administration/employee-emergency-contact/create')}}" role="button">
                                <i class="glyphicon glyphicon-plus-sign "></i> Add new</a>
                        </div>
                    </div>
                </div>
                <br/>
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2> List all Emergency Contact</h2>
                    </header>
                    <div>
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox"></div>
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
                                @foreach($ListEmployeeEmergencyContact as $ListEmployeeEmergencyContacts)
                                    <tbody id="products-list" name="products-list">
                                    <tr id="emergency_id{{$ListEmployeeEmergencyContacts->id}}">
                                        <td>{{$ListEmployeeEmergencyContacts->eec_name}}</td>
                                        <td>{{$ListEmployeeEmergencyContacts->eec_relationship}}</td>
                                        <td>{{$ListEmployeeEmergencyContacts->eec_home_no}}</td>
                                        <td>{{$ListEmployeeEmergencyContacts->eec_mobile_no}}</td>
                                        <td>{{$ListEmployeeEmergencyContacts->eec_office_no}}</td>
                                        <td>
                                            <a data-id="{{$ListEmployeeEmergencyContacts->id}}" href="{{url('administration/employee-emergency-contact/'.$ListEmployeeEmergencyContacts->id.'/edit')}}" style="text-decoration:none;" class="btn-detail open_modal">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                            <a data-id="{{$ListEmployeeEmergencyContacts->id}}" href="#" style="text-decoration:none;" class="delete-item">
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
@endsection