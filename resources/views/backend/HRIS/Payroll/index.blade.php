@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <section id="widget-grid" class="">
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2> Encode Addition</h2>
                    </header>
                    <div>
                        <div class="jarviswidget-editbox">
                        </div>
                        <div class="widget-body no-padding">
                            <form id="frmPayroll" method="POST" enctype="multipart/form-data" action="{{url('administration/view-payroll')}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <div class="row">
                                    <section class="col col-5">
                                        <label class="label">Employee</label>
                                        <div class="form-group">
                                            <select name="employee_payroll"
                                                    id="employee_payroll"
                                                    style="width:100%" class="select2 select2-hidden-accessible"
                                                    tabindex="-1" aria-hidden="true">
                                                    <option value="">-- select employee --</option>
                                                    @php $tracker = \App\Model\Employee::all(); @endphp
                                                    @foreach($tracker as $trackers)
                                                        <option value="{{$trackers->emp_number}}">{{$trackers->emp_lastname}}{{$trackers->emp_firstname}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </section>
                                        <section class="col col-5">
                                            <label class="label"> Time </label>

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-control" type="text" name="datefilter" value="" />
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </section>
                                        <section class="col col-2">
                                            <label class="label"> PaySleep </label>
                                            <div class="form-group">
                                                <button class="form-control btn btn-success" id="generate-payslip"><i class="fa fa-money"></i> Generate Payslip</button>
                                            </div>

                                        </section>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
    {{--@if($SearchEmployee)--}}
        {{--<section id="widget-grid" class="">--}}
            {{--<div class="row">--}}
                {{--<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">--}}
                    {{--<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">--}}
                        {{--<header>--}}
                        {{--</header>--}}
                        {{--<div>--}}
                            {{--<div class="jarviswidget-editbox">--}}
                            {{--</div>--}}
                            {{--<div class="widget-body no-padding">--}}
                                {{--<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">--}}
                                    {{--<thead>--}}
                                    {{--<tr>--}}
                                        {{--<th> Employee No</th>--}}
                                        {{--<th> Employee Name </th>--}}
                                        {{--<th> Allowances</th>--}}
                                        {{--<th> O.T Pay</th>--}}
                                        {{--<th> Night Differential</th>--}}
                                        {{--<th> Other Additions</th>--}}
                                        {{--<th> Remark</th>--}}
                                        {{--<th> Action</th>--}}
                                    {{--</tr>--}}
                                    {{--</thead>--}}
                                    {{--<tbody>--}}
                                    {{--<tr>--}}
                                        {{--<td>{{$SearchEmployee->employee_id}}</td>--}}
                                        {{--<td>{{$SearchEmployee->emp_firstname}} {{$SearchEmployee->emp_lastname}}</td>--}}
                                        {{--<td>100</td>--}}
                                        {{--<td>12</td>--}}
                                        {{--<td>002</td>--}}
                                        {{--<td>002</td>--}}
                                        {{--<td>002</td>--}}
                                        {{--<td><a id="paySleep_ID" href="{{url('administration/view-payroll/'.$SearchEmployee->emp_number)}}"> Generate PaySleep</a></td>--}}
                                    {{--</tr>--}}
                                    {{--</tbody>--}}
                                {{--</table>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</article>--}}
            {{--</div>--}}
        {{--</section>--}}
    {{--@endif--}}
        {{--@if($paySleep)--}}
    @if($SearchEmployee)
    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget well jarviswidget-color-darken" id="wid-id-0" data-widget-sortable="false" data-widget-deletebutton="false" data-widget-editbutton="false" data-widget-colorbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-barcode"></i> </span>
                        <h2>Item #44761 </h2>

                    </header>
                    <div>
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                        </div>
                        <div class="widget-body no-padding">
                            <div class="padding-10">
                                <br>
                                <div class="pull-left">
                                    <img src="{{asset('img/logo-blacknwhite.png')}}" width="150" height="32" alt="invoice icon">

                                    <address>
                                        <br>
                                        <strong>{{\Illuminate\Support\Facades\Auth::guard('admins')->user()->name}}</strong>
                                        <br>
                                        231 Ajax Rd,
                                        <br>
                                        Detroit MI - 48212, USA
                                        <br>
                                        <abbr title="Phone">P:</abbr> (123) 456-7890
                                    </address>
                                </div>
                                <div class="pull-right">
                                    <h1 class="font-400">PaySleep</h1>
                                </div>
                                <div class="clearfix"></div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-sm-9">
                                        <h4 class="semi-bold">Rogers, Inc.</h4>
                                        <address>
                                            <strong>{{$SearchEmployee->emp_firstname}} {{$SearchEmployee->emp_lastname}}</strong>
                                            <br>
                                            342 Mirlington Road,
                                            <br>
                                            Calfornia, CA 431464
                                            <br>
                                            <abbr title="Phone">P:</abbr> (467) 143-4317
                                        </address>
                                    </div>
                                    <div class="col-sm-3">
                                        <div>
                                            <div>
                                                <strong>INVOICE NO :</strong>
                                                <span class="pull-right"> #AA-454-4113-00 </span>
                                            </div>

                                        </div>
                                        <div>
                                            <div class="font-md">
                                                <strong>INVOICE DATE :</strong>
                                                <span class="pull-right"> <i class="fa fa-calendar"></i> 15/02/13 </span>
                                            </div>

                                        </div>
                                        <br>
                                        <div class="well well-sm  bg-color-darken txt-color-white no-border">
                                            <div class="fa-lg">
                                                Total Due :
                                                <span class="pull-right"> 4,972 USD** </span>
                                            </div>

                                        </div>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center">QTY</th>
                                        <th>ITEM</th>
                                        <th>DESCRIPTION</th>
                                        <th>PRICE</th>
                                        <th>SUBTOTAL</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-center"><strong>1</strong></td>
                                        <td><a href="javascript:void(0);">Print and Web Logo Design</a></td>
                                        <td>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam xplicabo.</td>
                                        <td>$1,300.00</td>

                                        <td>$1,300.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><strong>1</strong></td>
                                        <td><a href="javascript:void(0);">SEO Management</a></td>
                                        <td>Sit voluptatem accusantium doloremque laudantium inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</td>
                                        <td>$1,400.00</td>
                                        <td>$1,400.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><strong>1</strong></td>
                                        <td><a href="javascript:void(0);">Backend Support and Upgrade</a></td>
                                        <td>Inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</td>
                                        <td>$1,700.00</td>
                                        <td>$1,700.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">Total</td>
                                        <td><strong>$4,400.00</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">HST/GST</td>
                                        <td><strong>13%</strong></td>
                                    </tr>
                                    </tbody>
                                </table>

                                <div class="invoice-footer">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <div class="payment-methods">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="invoice-sum-total pull-right">
                                                <h3><strong>Total: <span class="text-success">$4,972 USD</span></strong></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
    @endif
@endsection
@section('script')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script type="text/javascript">
        var $loginForm = $("#frmPayroll").validate({
            // Rules for form validation
            rules : {
                employee_payroll : {
                    required : true
                },
            },
            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });
        $(function() {

            $('input[name="datefilter"]').daterangepicker({
                showRangeInputsOnCustomRangeOnly: false,
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });
            $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            });

            $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });

        });
    </script>
@endsection
