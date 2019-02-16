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
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2>Leave Entitlement </h2>
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
                            <form id="frmEntitlement" method="POST" enctype="multipart/form-data" action="{{url('administration/define-holiday')}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> Leave Type * </label>
                                            <label class="select">
                                                <select name="leave_type" id="leave_type">
                                                    <option value="">-- select leave type --</option>
                                                    @php $leave_period = \App\LeaveType::all(); @endphp
                                                    @foreach($leave_period as $leave_periods)
                                                        <option value="{{$leave_periods->id}}"> {{$leave_periods->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Leave Period * </label>
                                            <label class="select">
                                                <select name="leave_period" id="leave_period">
                                                    <option value="">-- select leave periods --</option>
                                                    @php $leave_period = \App\LeavePeriod::all(); @endphp
                                                    @foreach($leave_period as $leave_periods)
                                                        <option value="{{$leave_periods->id}}"> {{$leave_periods->leave_period_start_month}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                </fieldset>
                                <footer>
                                    <button type="submit" class="btn btn-primary"> Search</button>
                                </footer>
                            </form>
                        </div>
                        <!-- end widget content -->

                    </div>
                </div>
            </article>
        </div>
    </section>
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-lg-12 margin-tb">

                        <div class="pull-right">
                            <a style="background: #333;" class="btn btn-primary" href="{{url('administration/leave-type/create')}}" role="button">
                                <i class="glyphicon glyphicon-plus-sign "></i> Add</a>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2> List  Entitlement </h2>
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
                                    <th> Leave Type</th>
                                    <th> Entitlement Type</th>
                                    <th> Valid From</th>
                                    <th> Valid To</th>
                                    <th> Days</th>
                                    <th> Actions </th>
                                </tr>
                                </thead>
                                <tbody id="products-list" name="products-list">
                                @foreach($leave_entitlement as $leave_entitlements)
                                    <tr id="job_id{{$leave_entitlements->id}}">
                                        <td>{{$leave_entitlements->name}}</td>
                                        <td>{{$leave_entitlements->from_date}}</td>
                                        <td>{{$leave_entitlements->to_date}}</td>
                                        <td>{{$leave_entitlements->no_of_day}}</td>
                                        <td>{{$leave_entitlements->no_of_day}}</td>
                                        <td>
                                            <a  href="{{url('administration/view-leave-entitlements/'.$leave_entitlements->id.'/edit')}}" style="text-decoration:none;" class="btn-detail open_modal">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                            <a data-id="{{$leave_entitlements->id}}" href="#" style="text-decoration:none;" class="delete-item">
                                                <i class="glyphicon glyphicon-trash"  style="color:red;"></i>
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
@section('script')
    <script type="text/javascript">
        $('#div_show').hide();

        function checkval() {

            if ($('#myCheck').is(':checked')) {
                $('#div_show').show({
                    duration: 800,
                });
            } else {
                $('#div_show').hide({
                    duration: 800,
                });
            }

        }

        $(function () {
            checkval(); // this is launched on load
            $('#myCheck').click(function () {
                checkval();
            });

        });
        var $loginForm = $("#frmEntitlement").validate({
            // Rules for form validation
            rules : {
                employee_entitlement : {
                    required : true
                },
                leave_type : {
                    required: true
                },
                leave_period: {
                    required:true
                },
                entitlements : {
                    required : true
                },
                sub_unit : {
                    required: true
                },
                location : {
                    required: true
                }
            },
            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });
    </script>
@endsection