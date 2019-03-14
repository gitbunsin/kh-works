@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2> Performance Review </h2>
                    </header>
                    <!-- widget div-->
                    <div>
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                        </div>
                        <form id="frmPerformanceReview" method="POST" enctype="multipart/form-data" action="{{url('administration/employee-performance-review')}}" class="">
                            <div class="widget-body">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset class="smart-form">
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label">Employee Name </label>
                                            <div class="form-group">
                                                <select name="employee" id="review_id" style="width:100%" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                                    <optgroup label="Performance Employee Trackers">
                                                        <option value="">-- select trackers --</option>
                                                        @php $tracker = \App\Model\Employee::all(); @endphp
                                                        @foreach($tracker as $trackers)
                                                            <option value="{{$trackers->emp_number}}">{{$trackers->emp_lastname}}{{$trackers->emp_firstname}}</option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                                <div class="note">
                                                    <strong>Usage:</strong> Employee performance tracker
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div  id="supervisor_id">
                                        <div class="row">
                                            <section class="col col-6">
                                                <label class="label"> Supervisor Review</label>
                                                <label class="input">
                                                    <input type="text" name="name" id="name">
                                                </label>
                                            </section>
                                        </div>
                                            <div class="row" id="supervisor_id">
                                                <section class="col col-4">
                                                    <label class="label"> Work Period Start Date </label>
                                                    <label class="input">
                                                        <i class="icon-append fa fa-calendar"></i>
                                                        <input type="text" id="start_date" name="start_date" class="datepicker">
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="label"> Work Period End Date </label>
                                                    <label class="input">
                                                        <i class="icon-append fa fa-calendar"></i>
                                                        <input type="text" id="end_date" name="end_date" class="datepicker">
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="label"> Due Date </label>
                                                    <label class="input">
                                                        <i class="icon-append fa fa-calendar"></i>
                                                        <input type="text" id="due_date" name="due_date" class="datepicker">
                                                    </label>
                                                </section>
                                        </div>
                                    </div>
                                </fieldset>

                            </div>
                            <br/>
                            <!-- end widget content -->
                            <fieldset class="smart-form">
                                <footer>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-default" onclick="window.history.back();">
                                        Back
                                    </button>
                                    <br/>
                                </footer>
                            </fieldset>

                        </form>


                    </div>
                    <!-- end widget div -->
                    <br/>
                </div>
                <!-- end widget -->

            </article>
            <!-- END COL -->
        </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript">
        var $loginForm = $("#frmPerformanceReview").validate({
            // Rules for form validation
            rules : {
                employee : {
                    required : true
                },
                name : {
                    required : true
                }
            },
            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });

        let baseURL = "{{URL::to('/')}}/";
        $('#supervisor_id').hide();
        $("#review_id").on('change', function () {
            let employeeID = this.value;


            if (employeeID != 0) {
                //console.log("Employee ID = ", employeeID);
                /**
                 * 1. Make ajax Request
                 * 2. Append data result as employee option
                 *
                 */
                $.ajax({
                    url: baseURL+"administration/employee/tracker/review/" + employeeID,
                    method: "GET",
                    type: "json",
                    success: function (respond) {
                        $('#supervisor_id').show({
                            duration: 800,
                        });
                    },
                    error: function (err) {
                        console.log(err)
                    }

                });
            }

        });
    </script>
@endsection