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
                        <h2>Edit Pay Grade</h2>
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
                            <form id="validate_pay_grade" method="POST" enctype="multipart/form-data" action="{{route('pay-grade.update', ['id'=>$pay_grade->id])}}" class="smart-form">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <section>
                                        <label class="label">Pay Grade</label>
                                        <label class="input">
                                           <input id="pay_grade_id" type="hidden" value="{{$pay_grade->id}}"/> <input value="{{$pay_grade->name}}" class="col-6" type="text" name="name" id="name">
                                        </label>
                                    </section>
                                </fieldset>
                                <footer>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <button type="button" class="btn btn-default" onclick="window.history.back();">
                                        Back
                                    </button>
                                </footer>

                            </form>
                            <div class="pull-right">
                                <button style="background: #333;" id="btn_add" name="btn_add" class="btn btn-default pull-right">
                                <span style="color:white;">
                                    <i class="glyphicon glyphicon-plus-sign "></i> ASSIGN CURRENCY </span></button>
                            </div>
                        <br/>
                                        <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                            <thead>
                                            <tr>
                                                <th> Currency</th>
                                                <th data-class="expand">Minimum Salary</th>
                                                <th data-class="expand">Maximum Salary</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody id="products-list" name="products-list">
                                            @foreach( $pay_grade_currency  as $pay_grade_currencies )
                                                {{--{{dd($pay_grade_currencies)}}--}}
                                                <tr id="currency_id{{$pay_grade_currencies->currency_id}}">
                                                    <td>{{$pay_grade_currencies->currency_name}}</td>
                                                    <td>{{$pay_grade_currencies->min_salary}}</td>
                                                    <td>{{$pay_grade_currencies->max_salary}}</td>
                                                    <td>
                                                        <a data-id="{{$pay_grade_currencies->currency_id}}" href="#" style="text-decoration:none;" class="btn-detail open_modal">
                                                            <i class="glyphicon glyphicon-edit"></i>
                                                        </a>
                                                        <a data-id="{{$pay_grade_currencies->currency_id}}" href="#" style="text-decoration:none;" class="delete-item">
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
        <input id="url" type="hidden" value="{{ \Request::url() }}">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div style="border: 0px solid rgba(0,0,0,.2);" class="modal-content">
                        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <!-- Widget ID (each widget will need unique ID)-->
                            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                                <header>
                                    <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                    <h2> Currecy</h2>
                                </header>
                                <!-- widget div-->
                                <div>
                                    <!-- widget edit box -->
                                    <div class="jarviswidget-editbox">
                                        <!-- This area used as dropdown edit box -->
                                    </div>
                                    <!-- widget content -->
                                    <div class="widget-body no-padding">
                                        <form id="frmProducts"  class="smart-form">
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                            <fieldset>
                                                <section>
                                                    <label class="label">Currency</label>
                                                    <label class="select state-success">
                                                        @php $currency = \App\Currency::all(); @endphp
                                                        <select name="currency_id" id="currency_id">
                                                            <option value="0">Choose name</option>
                                                            @foreach($currency as $item)
                                                                <option value="{{$item->currency_id}}">{{$item->currency_name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <i></i>
                                                    </label>
                                                </section>
                                                <section>
                                                    <label class="label">Minimum Salary</label>
                                                    <label class="input">
                                                        <input required type="number" maxlength="20" name="min_salary" id="min_salary">
                                                    </label>
                                                </section >
                                                <section>
                                                    <label class="label">Maximum Salary</label>
                                                    <label class="input">
                                                        <input required type="number" maxlength="20" name="	max_salary" id="max_salary">
                                                    </label>
                                                </section >
                                            </fieldset>
                                            <footer>
                                                <input type="button" class="btn btn-primary" id="btn-save" value="add">
                                                <input type="hidden" id="product_id" name="product_id" value="0">
                                                <button type="button" class="btn btn-default" id="btnclose" data-dismiss="modal">Close</button>
                                            </footer>
                                        </form>
                                    </div>
                                    <!-- end widget content -->
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
    </section>


    <!-- Widget ID (each widget will need unique ID)-->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{ asset('/js/hr/currency.js') }}"></script>
    <script type="text/javascript">

        // DO NOT REMOVE : GLOBAL FUNCTIONS!

        $(document).ready(function() {

            pageSetUp();
            $('#startdate').datepicker({
                // format: 'DD - dd MM yyyy'
            });
            var $loginForm = $("#validate_pay_grade").validate({
                // Rules for form validation
                rules : {
                    name : {
                        required : true
                    },
                },
                // Messages for form validation
                messages : {
                    name : {
                        required : 'field is required !'
                    },
                },
                // Do not change code below
                errorPlacement : function(error, element) {
                    error.insertAfter(element.parent());
                }
            });
        });

    </script>
    <script>
        $(document).ready(function() {
            var $min_range = $("#min-range"),
                $max_range = $("#max-range");
            alert($min_range);

            $("#form1").validate({
                debug: true,
                onkeyup: false,
                onfocusout: false,
                onclick: false,
                rules: {
                    minrange: {
                        required: function() {
                            return !($min_range.val() === "" && $max_range.val() === "");
                        },
                        max: function() {
                            if ($max_range.val() !== "") {
                                return $max_range.val();
                            }
                        }
                    },
                    maxrange: {
                        required: function() {
                            return !($min_range.val() === "" && $max_range.val() === "");
                        },
                        min: function() {
                            if ($min_range.val() !== "") {
                                return $min_range.val();
                            }
                        }
                    }
                },
                submitHandler: function(formName, event) {
                    alert("sucess");
                }
            });
        });
@endsection
