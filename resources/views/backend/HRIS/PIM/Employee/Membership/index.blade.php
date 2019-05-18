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
                            <a style="background: #333;" class="btn btn-primary" href="{{url('administration/view-membership/create')}}" role="button">
                                <i class="glyphicon glyphicon-plus-sign "></i> Add new</a>
                        </div>
                    </div>
                </div>
                <br/>
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2> MemberShip</h2>
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
                                    <th data-hide="phone"> Membership</th>
                                    <th data-class="expand"> Subscription Paid By </th>
                                    <th> Subscription Amount</th>
                                    <th> Currency</th>
                                    <th> Subscription Commence Date</th>
                                    <th> Subscription Renewal Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                @php //dd($EmergencyContact) @endphp
                                @foreach($m as $members)
                                    <tbody id="products-list" name="products-list">
                                    <tr id="emergency_id{{$members->id}}">
                                        <td>{{$members->member->name}}</td>
                                        @if($members->ememb_subscript_ownership =="1")
                                             <td>Company</td>
                                        @else
                                              <td>Individual</td>
                                        @endif
                                        <td>{{$members->ememb_subscript_amount}}</td>
                                        <td>{{$members->currency->name}}</td>
                                        <td>{{$members->ememb_commence_date}}</td>
                                        <td>{{$members->ememb_renewal_date}}</td>
                                        <td>
                                            <a  href="{{url('administration/view-membership/'.$members->id.'/edit')}}" style="text-decoration:none;" class="btn-detail open_modal">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                            <a href="#" style="text-decoration:none;" class="delete-item">
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