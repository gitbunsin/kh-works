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
                            <a style="background: #333;" class="btn btn-primary" href="{{url('administration/define-holiday/create')}}" role="button">
                                <i class="glyphicon glyphicon-plus-sign "></i> Add new</a>
                        </div>
                    </div>
                </div>
                <br/>
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2> List All Holiday</h2>
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
                                    <th> Name</th>
                                    <th> Date</th>
                                    <th> Full Day/Half Day</th>
                                    <th> Repeats Annually</th>
                                    <th> Action</th>
                                </tr>
                                </thead>
                                @foreach($Holiday as $Holidays)
                                    <tbody id="products-list" name="products-list">
                                    <td>{{$Holidays->name}}</td>
                                    <td>{{$Holidays->date}}</td>
                                    <td></td>
                                    <td></td>
                                            <td>
                                                <a  href="{{url('administration/define-holiday/'.$Holidays->id.'/edit')}}" style="text-decoration:none;" class="btn-detail open_modal">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                <a data-id="" href="#" style="text-decoration:none;" class="delete-item">
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
