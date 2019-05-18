@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    @php
        if(\Illuminate\Support\Facades\Auth::guard('employee')->user())
        {
           $employeeID = \Illuminate\Support\Facades\Auth::guard('employee')->user()->emp_number;
        }else
        {
            $ListCompanyEmployee = \App\Model\Employee::where('emp_number',\Illuminate\Support\Facades\Auth::guard('admins')->user()->id)->first();
            $employeeID = $ListCompanyEmployee->emp_number;
        }
    @endphp
    <section id="widget-grid" class="">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                        <span><i class="icon-append fa fa-lock"></i> Employee Terminate </span>
                    </div>
                    @php
                        if(\Illuminate\Support\Facades\Auth::guard('employee')->user())
                            {
                               $employeeID = \Illuminate\Support\Facades\Auth::guard('employee')->user()->emp_number;
                            }else
                            {
                                $ListCompanyEmployee = \App\Model\Employee::where('emp_number',\Illuminate\Support\Facades\Auth::guard('admins')->user()->id)->first();
                                $employeeID = $ListCompanyEmployee->emp_number;
                            }
                    @endphp
                    <div class="modal-body no-padding">
                        <form id="frm_terminate" class="smart-form">
                            <input type="hidden" id="emp_number" name="emp_number" value="{{$employeeID}}" />
                            <fieldset>
                                <section>
                                    <label class="label"> Reason</label>
                                    <label class="select">
                                        <select class="required" name="reason_id" id="reason_id">
                                            <option value=""> -- Select Reason-- </option>
                                            @php $Reason = \App\Model\TerminationReason::all(); @endphp
                                            @foreach($Reason as $Reasons)
                                                <option value="{{$Reasons->id}}">{{$Reasons->name}}</option>
                                            @endforeach
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                                <section>
                                    <label class="label"> Date </label>
                                    <label class="input">
                                        <i class="icon-append fa fa-calendar"></i>
                                        <input  value="{{today()}}" type="text" id="termination_date" name="termination_date" class="datepicker form-control">
                                    </label>
                                </section>
                                <section>
                                    <label class="label">Noted</label>
                                    <label class="textarea">
                                        <textarea rows="8" id="note" name="note" class="custom-scroll"></textarea>
                                    </label>
                                    <div class="note">
                                        <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                    </div>
                                </section>
                            </fieldset>
                            <footer>
                                <button id="btnTerminate" type="submit" class="btn btn-primary">Confirm</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </footer>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- row -->

        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2> Job Details</h2>
                    </header>
                    <div>
                        <div class="jarviswidget-editbox">
                        </div>

                        <form id="frmEmployeeJob" method="POST"  action="{{url('/administration/update-employee-job/'.$employeeID)}}" class="smart-form form-horizontal" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            {{--<input type="hidden" value="{{$e}}"--}}
                            <div class="row">
                                <section class="col col-4">
                                    <label class="label"> Job Title</label>
                                    <label class="select">
                                        <select class="form-control" name="job_titles_code" id="job_titles_code">
                                            <option value=""> -- Select Job Title-- </option>
                                            @php $JobTitle = \App\Model\JobTitle::all(); @endphp
                                            @foreach($JobTitle as $JobTitles)
                                            <option value="{{$JobTitles->id}}" {{$JobTitles->id == $EmployeeDetailsJob->job_titles_code? "selected='selected'":""}}>{{$JobTitles->name}}</option>
                                            @endforeach
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label">Job Specification</label>
                                    <label class="input">
                                        <input value="" type="text" name="JobSpecification" id="JobSpecification">
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label"> Employee Status</label>
                                    <label class="select">
                                        <select class="form-control" name="EmploymentStatus" id="EmploymentStatus">
                                            <option value="">-- Select Employee Status -- </option>
                                            @php $EmploymentStatus = \App\Model\EmploymentStatus::all();  @endphp
                                                @foreach($EmploymentStatus as $EmploymentStatuss)
                                                <option value="{{$EmploymentStatuss->id}}"{{$EmploymentStatuss->id == $EmployeeDetailsJob->emp_status? "selected='selected'":""}}>{{$EmploymentStatuss->name}}</option>
                                                @endforeach
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="label"> Job Category</label>
                                    <label class="select">
                                        <select class="form-control" name="eeo_cat_code" id="eeo_cat_code">
                                            <option value="0"> -- Select JobCategory -- </option>
                                            @php $JobCategory = \App\Model\JobCategory::all(); @endphp
                                            @foreach($JobCategory as $JobCategories)
                                                <option value="{{$JobCategories->id}}"{{$JobCategories->id == $EmployeeDetailsJob->eeo_cat_code? "selected='selected'":""}}>{{$JobCategories->name}}</option>
                                            @endforeach
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label"> Join Date </label>
                                    <label class="input">
                                        <i class="icon-append fa fa-calendar"></i>
                                        <input value="{{$EmployeeDetailsJob->joined_date}}" type="text" id="joined_date" name="joined_date" class="JoinDate form-control">
                                    </label>
                                </section>
                                <section class="col col-4">
                                    @php $SubUnit = \App\Model\SubUnit::all(); @endphp
                                    <label class="label"> Sub Unit</label>
                                    <label class="select">
                                        <select class="form-control" name="emp_status" id="emp_status">
                                            <option value="">Select</option>
                                            @foreach($SubUnit as $SubUnits)
                                            <option value="{{$SubUnits->id}}" {{$EmployeeDetailsJob->work_station == $SubUnits->id ? 'selected="selected"' : '' }}>{{$SubUnits->title}}</option>
                                            @endforeach
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                            </div>
                            <section>
                                @php $location = \App\Model\Location::all(); @endphp
                                <label class="label"> Location</label>
                                <label class="select">
                                    <select class="form-control" name="location" id="location">
                                        <option value="">Select</option>
                                        @foreach($location as $locations)
                                        <option value="{{$locations->id}}" {{ $EmployeeDetailsJob->nation_code == $locations->id ? 'selected="selected"' : '' }}>{{$locations->name}}</option>
                                        @endforeach
                                    </select>
                                    <i></i>
                                </label>
                            </section>
                                <section>
                                    <legend>Employee Contract</legend>
                                </section>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="label"> Start Date </label>
                                    <label class="input">
                                        <i class="icon-append fa fa-calendar"></i>
                                        @php
                                            if(\Illuminate\Support\Facades\Auth::guard('admins')->user()){

                                                $employeeId = \Illuminate\Support\Facades\Auth::guard('admins')->user()->di;
                                            }else{

                                                $employeeId = \Illuminate\Support\Facades\Auth::guard('employee')->user()->id;
                                            }
                                            $contract = \App\Model\contract::where('id',$employeeId)->first(); @endphp
                                        <input  value="{{$contract ? $contract->econ_extend_end_date : " "}}" type="text" id="StartDate" name="econ_extend_start_date" class="datepicker form-control">
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="label"> End Date </label>
                                    <label class="input">
                                        <i class="icon-append fa fa-calendar"></i>
                                        <input value="{{$contract ? $contract->econ_extend_end_date : " "}}" type="text" id="EndDate" name="econ_extend_end_date" class="datepicker form-control">
                                    </label>
                                </section>
                            </div>
                            <section>
                                <label class="label">Contract Details</label>
                                <label class="input">
                                    <input value="" type="file" name="ContractDetails" id="ContractDetails" class="form-control">
                                </label>
                            </section>
                            <footer>
                                <input class="btn btn-primary" type="button" value="" name="BtnEmployeeJob" id="BtnEmployeeJob" />

                                @php $terminate = \App\Model\Termination::where('emp_number',$employeeID)->first();@endphp
                                @if($terminate)
                                    <input value="Active Terminate" id="btn_active_terminate"  type="button" class="btn btn-danger">
                                    <button value="{{$terminate->id}}" id="btn_terminate_reason" type="button" class="btn btn-default" data-dismiss="modal">Termination on : {{$terminate->termination_date}} </button>
                                    @else

                                    <input value="Terminate Employment" id="btn_terminate"  type="button" class="btn btn-danger">
                                @endif
                            </footer>
                        </form>
                    </div>
                </div>
            </article>
        </div>
        <div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                        <h4> Employee Terminate Edit </h4>
                    </div>
                    <div class="modal-body no-padding">
                        <form id="frm_terminate_edit" class="smart-form">
                            <input type="hidden" id="emp_number" name="emp_number" value="{{$employeeID}}" />
                            <fieldset>
                                <section>
                                    <label class="label"> Reason</label>
                                    <label class="select">
                                        <select class="required" name="reason_id_edit" id="reason_id_edit">
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                                <section>
                                    <label class="label"> Date </label>
                                    <label class="input">
                                        <i class="icon-append fa fa-calendar"></i>
                                        <input  value="" type="text" id="termination_date_edit" name="termination_date_edit" class="datepicker form-control">
                                    </label>
                                </section>
                                <section>
                                    <label class="label">Noted</label>
                                    <label class="textarea">
                                        <textarea rows="8" id="note_edt" name="note_edit" class="custom-scroll"></textarea>
                                    </label>
                                    <div class="note">
                                        <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                    </div>
                                </section>
                            </fieldset>
                            <footer>
                                <button id="btnTerminateEdit" type="submit" class="btn btn-primary">Confirm Edit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </footer>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                        <h4> Employee Terminate  </h4>
                    </div>
                    @php $terminate_id = \App\Model\Termination::where('emp_number',$employeeID)->first();@endphp

                    @if($terminate_id)
                       @php $terminate = $terminate_id->id; @endphp
                    @else
                        @php $terminate = " "; @endphp
                    @endif

                    <div class="modal-body no-padding">
                        <form id="frm_terminate_edit" method="POST" class="smart-form" action="{{url('administration/employee-terminate-delete/'.$terminate)}}">
                            <input type="hidden" id="emp_number" name="emp_number" value="{{$employeeID}}" />
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <fieldset>
                                    <h4>Do u want to activate terminate ?</h4><br/>
                            </fieldset>
                            <footer>
                                <button id="btnTerminateEdit" type="submit" class="btn btn-danger"> Activate Terminate</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </footer>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </section>
@endsection
@section('script')
    <script>
        $('#btn_terminate').click(function(){
            $('#exampleModal').modal('show');
            $(".modal-backdrop.in").hide();
        });
        $(document).ready(function() {
            //Create currency to Paygrade
            var baseURL = "{{URL::to('/')}}/";
            $("#frm_terminate").validate({
                rules: {
                    reason_id: {
                        required: true,
                    }
                },
                messages: {
                    reason_id: {
                        required: "Please select the Reason Termination"
                    }
                },
                submitHandler: function (form) {
                    var formData = {
                        reason_id: $('#reason_id').val(),
                        emp_number : $('#emp_number').val(),
                        termination_date : $('#termination_date').val(),
                        note : $('#note').val()
                    };
                   // alert(JSON.stringify(formData));
                    //ajax submit request
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "POST",
                        url: baseURL + "administration/employee-terminate",
                        data: formData,
                        dataType: "json",
                        success: function (respond) {

                            console.log("Success", respond);
                            // $('#btn_terminate').val("Active Terminate");
                            $('#btn_terminate_date').val("Terminate On :");
                            $('#exampleModal').modal('hide')
                            location.reload();
                            // bindDataToTable(respond);
                        },
                        error: function (error) {
                            console.log("Error ", error);
                        }
                    });
                }
            });
        });

        $(document).on('click','#btn_terminate_reason',function(){
            var baseURL = "{{URL::to('/')}}/";
            $('#exampleModalEdit').modal('show');
            $(".modal-backdrop.in").hide();
            var terminate_id = $('#btn_terminate_reason').val();
            //alert(terminate_id);
            $.ajax({
                type: "GET",
                url: baseURL + "administration/employee-terminate/"+terminate_id,
                success: function (data) {
                    console.log(data.termination.reason_id)
                   var item = $('#reason_id_edit');
                    item.empty();
                    $.each(data.TerminationReason, function(key, value) {
                       // console.log("terminate_reason",value.id);
                        var isSelected = false;
                     if(value.id == data.termination.reason_id) {
                         console.log("termination reason=",value.name,'id=',value.id);
                         isSelected = true;
                     }
                        item.append("<option value='"+ value.id +"' selected ='" + isSelected +"'>" + value.name + "</option>");

                    });
                    $('#termination_date_edit').val(data.termination.termination_date);
                    $('#note_edt').val(data.termination.noted);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });

        $(document).ready(function() {
            $('#btnTerminateEdit').on('click',function () {
                var baseURL = "{{URL::to('/')}}/";
                $("#frm_terminate_edit").validate({
                    rules: {
                        reason_id_edit: {
                            required: true,
                        }
                    },
                    messages: {
                        reason_id_edit: {
                            required: "Please select the Reason Termination"
                        }
                    },
                    submitHandler: function (form) {
                        var formData = {
                            reason_id: $('#reason_id_edit').val(),
                            emp_number : $('#emp_number').val(),
                            termination_date : $('#termination_date_edit').val(),
                            noted : $('#note_edit').val()
                        };
                        // alert(JSON.stringify(formData));
                        //ajax submit request
                        var terminate_id = $('#btn_terminate_reason').val();
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            method: "POST",
                            url: baseURL + "administration/employee-terminate/"+terminate_id,
                            data: formData,
                            dataType: "json",
                            success: function (respond) {
                                console.log("Success", respond);
                                // $('#btn_terminate').val("Active Terminate");
                                $('#btn_terminate_date').val("Terminate On :"+respond.termination_date);
                                $('#exampleModalEdit').modal('hide')
                                location.reload();
                                // bindDataToTable(respond);
                            },
                            error: function (error) {
                                console.log("Error ", error);
                            }
                        });
                    }
                });
            });
        });


        $('#btn_active_terminate').click(function(){
            $('#exampleModalDelete').modal('show');
            $(".modal-backdrop.in").hide();
        });
        //
        //
        // var $loginForm = $("#frmEmployeeJob").validate({
        //     // Rules for form validation
        //     rules : {
        //         job_titles_code : {
        //             required : true
        //         },
        //         EmploymentStatus : {
        //
        //             required: true
        //         },location : {
        //
        //             required: true
        //         },emp_status : {
        //
        //             required: true
        //         },
        //         location : {
        //             required : true
        //         }
        //     },
        //     // Do not change code below
        //     errorPlacement : function(error, element) {
        //         error.insertAfter(element.parent());
        //     }
        // });
        // START AND FINISH DATE

        $('#joined_date').datepicker({
            dateFormat: 'yy-mm-dd',
            prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>',
            onSelect: function (selectedDate) {
                $('#EndDate').datepicker('option', 'minDate', selectedDate);
            }
        });
        $('#termination_date').datepicker({
            dateFormat: 'yy-mm-dd',
            prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>'
        });

        $('#termination_date_edit').datepicker({
            dateFormat: 'yy-mm-dd',
            prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>'
        });


        $('#StartDate').datepicker({
            dateFormat: 'yy-mm-dd',
            prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>',
            onSelect: function (selectedDate) {
                $('#EndDate').datepicker('option', 'minDate', selectedDate);
            }
        });
        $('#EndDate').datepicker({
            dateFormat: 'yy-mm-dd',
            prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>',
            onSelect: function (selectedDate) {
                $('#StartDate').datepicker('option', 'maxDate', selectedDate);
            }
        });

        DisabledEmployeeJob();
        function DisabledEmployeeJob(){

            $('#job_titles_code').prop('disabled',true);
            $('#eeo_cat_code').prop('disabled',true);
            $('#EmploymentStatus').prop('disabled',true);
            $('#joined_date').prop('disabled',true);
            $('#location').prop('disabled',true);
            $('#emp_status').prop('disabled',true);
            $('#StartDate').prop('disabled',true);
            $('#EndDate').prop('disabled',true);
            $('#ContractDetails').prop('disabled',true);
        }
        function EnableEmployeeJob(){
            $('#job_titles_code').prop('disabled',false);
            $('#eeo_cat_code').prop('disabled',false);
            $('#EmploymentStatus').prop('disabled',false);
            $('#joined_date').prop('disabled',false);
            $('#location').prop('disabled',false);
            $('#emp_status').prop('disabled',false);
            $('#StartDate').prop('disabled',false);
            $('#EndDate').prop('disabled',false);
            $('#ContractDetails').prop('disabled',false);
        }

        $('#BtnEmployeeJob').val("Edit");
        $('#BtnEmployeeJob').on('click',function () {

            $isEdit = $('#BtnEmployeeJob').val();
            if($isEdit =="Edit"){
                EnableEmployeeJob();
                var Save = $('#BtnEmployeeJob').val('Save');
            }else{
                $isSave = $('#BtnEmployeeJob').val();
                // alert($isSave);
                if($isSave == "Save") {
                    // alert('ok');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $('#frmEmployeeJob').submit();
                    e.preventDefault();
                }
            }
        });

    </script>
@endsection