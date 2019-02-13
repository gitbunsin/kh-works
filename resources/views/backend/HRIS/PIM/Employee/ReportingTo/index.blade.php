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
                            <a style="background: #333;" id="btn_add_sup" class="btn btn-primary" href="{{url('/administration/view-ReportTo-details/create')}}" role="button">
                                <i class="glyphicon glyphicon-plus-sign "></i> Add </a>
                        </div>
                    </div>
                </div>
                <br/>
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2> Assinged Supervisors</h2>
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
                                    <th data-class="expand"> Name</th>
                                    <th data-hide="phone">Reporting Method</th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                @foreach($reporting as $reportings)
                                    <tbody id="products-list" name="products-list">
                                    {{--@php dd($reportings) @endphp--}}
                                    <tr id="reporting_id{{$reportings->reporting_id}}">
                                        <td>{{$reportings->emp_lastname}} {{$reportings->emp_firstname}} </td>
                                        <td>{{$reportings->name}}</td>
                                        <td>
                                            {{--<a id="{{$reportings->emp_id}}" data-id1="{{$reportings->reporting_id}}"  href="#"  data-id="{{$reportings->method_id}}" class="delete-item open_modal">--}}
                                                {{--<i class="glyphicon glyphicon-edit"></i>--}}
                                            {{--</a>--}}
                                            <a href="{{url('administration/view-ReportTo-details/'.$reportings->reporting_id.'/edit')}}" style="text-decoration:none;" class="btn-detail open_modal">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                            <a data-id="{{$reportings->id}}" href="#" style="text-decoration:none;" class="delete-item">
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
        <input id="url" type="hidden" value="{{ \Request::url() }}">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content"><div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-title"> Supervisor</h4>
                    </div>
                    <div class="modal-body no-padding">
                        <form action="" id="frmSupervisor" class="smart-form" novalidate="novalidate">
                            <fieldset>
                                <section>
                                    <div class="row">
                                        <label class="label col col-2"> Name</label>
                                        <div class="from-group col col-10">
                                            <label class="select">
                                                <select name="supervisor_id" id="supervisor_id">
                                                    <option value="">-- select employee --</option>
                                                   @php $tracker = \App\Employee::all(); @endphp
                                                @foreach($tracker as $trackers)
                                                    <option value="{{$trackers->emp_id}}">{{$trackers->emp_lastname}}{{$trackers->emp_firstname}}</option>
                                                @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </div>
                                    </div>
                                </section>
                                <section>
                                    <div class="row">
                                        <label class="label col col-2"> Reporting Methods</label>
                                        <div class="from-group col col-10">
                                        <label class="select">
                                            <select name="reporting_id" id="reporting_id">
                                                <option value="">-- Reporting --</option>
                                                @php $reporting = \App\ReportingMethods::all(); @endphp
                                                @foreach($reporting as $reportings)
                                                     <option value="{{$reportings->id}}">{{$reportings->name}}</option>
                                                @endforeach
                                            </select>
                                            <i></i>
                                        </label>
                                        </div>
                                    </div>
                                </section>
                            </fieldset>
                            <footer>
                                <input type="submit" class="btn btn-primary" id="btn-save" value="add">
                                <input type="hidden" id="product_id" name="product_id" value="0">
                                {{--<input type="hidden" id="pay_grade_id" name="pay_grade_id" value="{{$pay_grade->id}}">--}}
                                <button type="button" class="btn btn-default" id="btnclose" data-dismiss="modal">Close</button>
                            </footer>

                        </form>
                    </div>
                </div>
            </div>
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
                            <a style="background: #333;" class="btn btn-primary" href="{{url('administration/view-ReportTo-details/create')}}" role="button">
                                <i class="glyphicon glyphicon-plus-sign "></i> Add</a>
                        </div>
                    </div>
                </div>
                <br/>
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2> Assigned Subordinates</h2>
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
                                    <th data-class="expand"> Name</th>
                                    <th data-hide="phone">Reporting Method</th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{ asset('/js/hr/report.js') }}"></script>
  <script>

      var baseURL = $('#url').val();
      $('#btn_add_sup').click(function () {
          //alert('ok');
          $('#btn-save').val("add");
          $('#frmProducts').trigger("reset");
          $('#myModal').modal('show');
          $(".modal-backdrop.in").hide();
      });

      $(document).on('click','.open_modal',function(){
          var employee_id = $(this).attr("id");
          var method_id = $(this).data('id');
          var reporting_id = $(this).data('id1');
        //alert(employee_id + method_id +reporting_id);
          $.ajax({
              type: "GET",
              url: '/administration/employee/report' + '/'+ reporting_id + '/' + method_id + '/'+ employee_id ,
              success: function (data) {
                   console.log("Success", data);
                  var item = $('#reporting_id');
                  item.empty();
                  $.each(data.all_method, function(key, value) {
                      //console.log(value);
                      var isSelected = false;
                      //console.log(value.reporting_id);
                      if(value.id == method_id) {
                          isSelected = true;
                      }
                      item.append("<option value='"+ value.id +"' selected = '"+isSelected+"'>" + value.name + "</option>");
                  });


                  var items = $('#supervisor_id');
                  items.empty();
                  $.each(data.all_report, function(key, value) {
                      //console.log(value);
                      var isSelected = false;
                      //console.log(value.reporting_id);
                      if(value.emp_id == employee_id) {
                          isSelected = true;
                      }
                      items.append("<option value='"+ value.emp_id +"' selected = '"+isSelected+"'>" + value.emp_lastname + value.emp_firstname+"</option>");
                  });
                  $('#product_id').val(data.reporting_id);
                  $('#btn-save').val("update");
                  $('#myModal').modal('show');
                  $(".modal-backdrop.in").hide();
              },
              error: function (data) {
                  console.log('Error:', data);
              }
          });
      });
      $(document).ready(function() {

          $("#frmSupervisor").validate({
              rules: {
                  supervisor_id: {
                      required: true,
                  },
                  reporting_id: {
                      required: true
                  }
              },
              submitHandler: function (form) {
                  var formData = {
                      supervisor_id: $('#supervisor_id').val(),
                      reporting_id: $('#reporting_id').val(),
                  };
                 // alert(JSON.stringify(formData));
                  //ajax submit request
                  $.ajax({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      method: "POST",
                      url: baseURL ,
                      data: formData,
                      dataType: "json",
                      success: function(respond) {
                         //alert(JSON.stringify(respond));
                          console.log("Success", respond);
                          bindDataToTable(respond);
                      },
                      error: function(error) {
                          console.log("Error ", error);
                      }
                  });
                  //console.log(formData);
              }
          });
          function bindDataToTable(data) {
              $("tbody>tr>td.dataTables_empty").hide();
              var table =
                  '<tr id="reporting_id' + data.reporting_id + '">' +
                  '<td class="sorting_1">' + data.emp_lastname + data.emp_firstname +'</td>'+
                  '<td class="sorting_1">' + data.name+ '</td>'
              table += '<td><a data-id=" '+ data.reporting_id +' " href="#" style="text-decoration:none;" class="btn-detail open_modal"> <i class="glyphicon glyphicon-edit"></i></a><a data-id=" '
                  + data.reporting_id +' " href="#" style="text-decoration:none;" onclick=""> <i class="glyphicon glyphicon-trash" style="color:red;"></i></a></td></tr>';
              $('#products-list').append(table);
              $('#frmSupervisor').trigger("reset");
              $('#myModal').modal('hide')
          }
      });
  </script>
@endsection