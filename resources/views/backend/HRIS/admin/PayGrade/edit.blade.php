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
                                            <input value="{{$pay_grade->name}}" class="col-6" type="text" name="name" id="name">
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
                                                        @php $currency = \App\Model\Backend\Currency::all(); @endphp
                                                        <select name="currency_id" id="currency_id" class="required">
                                                            <option value="">Choose name</option>
                                                            @foreach($currency as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <i></i>
                                                    </label>
                                                </section>
                                                <section>
                                                    <label class="label">Minimum Salary</label>
                                                    <label class="input">
                                                        <input required type="number" maxlength="20" name="min_salary" id="minSalary">
                                                    </label>
                                                </section >
                                                <section>
                                                    <label class="label">Maximum Salary</label>
                                                    <label class="input">
                                                        <input required type="number" maxlength="20" name="max_salary" id="maxSalary">
                                                    </label>
                                                </section >
                                            </fieldset>
                                            <footer>
                                                <input type="submit" class="btn btn-primary" id="btn-save" value="add">
                                                <input type="hidden" id="product_id" name="product_id" value="0">
                                                <input type="hidden" id="pay_grade_id" name="pay_grade_id" value="{{$pay_grade->id}}">
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

@endsection
@section('script')

    <script src="{{ asset('/js/hr/currency.js') }}"></script>
    <script>
        $(document).ready(function() {

            //Base URL
            var baseURL = "{{URL::to('/')}}/"

            //custom rule method
            $.validator.addMethod("isBiggerThanMinSalary", function(value, element, arg) {
                var maxSalary = $("#maxSalary").val();
               return maxSalary > value;
            }, "Minimum Salary must be smaller than Maximun Salary");

            //Create currency to Paygrade
            $("#frmProducts").validate({
                rules: {
                    min_salary: {
                        required: true,
                        isBiggerThanMinSalary: ""
                    },
                    max_salary: {
                        required: true
                    }
                },
                messages: {
                    currency_id: {
                        required: "Please select the currency option"
                    },
                    min_salary: {
                        required: "Minimum Salary is required"
                    },
                    max_salary: {
                        required: "Maximum Salary is required"
                    }
                },
                submitHandler: function(form) {
                    var formData = {
                        pay_grade_id : $('#pay_grade_id').val(),
                        currency_id : $('#currency_id').val(),
                        min_salary : $('#minSalary').val(),
                        max_salary : $('#maxSalary').val()
                    };

                    //ajax sumit request
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "POST",
                        url: baseURL + "administration/add-currency-pay",
                        data: formData,
                        dataType: "json",
                        success: function(respond) {
                            console.log("Success", respond);
                            // bindDataToTable(respond);
                        },
                        error: function(error) {
                            console.log("Error ", error);
                        }
                    });
                }
            });

            function bindDataToTable(data) {
                $("tbody>tr>td.dataTables_empty").hide();
                var table =
                    '<tr id="currency_id'+data.id+'">' +
                    '<td class="sorting_1">' + data.currency_name + '</td>'+
                    '<td class="sorting_1">' + data.min_salary+ '</td>'+
                    '<td class="sorting_1">' + data.max_salary + '</td>';
                table += '<td><a data-id=" '+ data.id +' " href="#" style="text-decoration:none;" class="btn-detail open_modal"> <i class="glyphicon glyphicon-edit"></i></a><a data-id=" '+ data.id +' " href="#" style="text-decoration:none;" class="btn-detail delete-item"> <i class="glyphicon glyphicon-trash" style="color:red;"></i></a></td></tr>';
                
                $('#products-list').append(table);
                $('#frmProducts').trigger("reset");
                $('#myModal').modal('hide')
            }
        });
    </script>
@endsection
