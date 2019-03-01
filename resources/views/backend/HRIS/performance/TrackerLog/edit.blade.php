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
                        <h2> Add Employee Tracker </h2>
                    </header>
                    <!-- widget div-->
                    <div>
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                        </div>
                        <form id="frmWorkshift" method="POST" enctype="multipart/form-data" action="{{url('administration/employee-performance-tracker')}}" class="">
                            <div class="widget-body">
                                <input type="hidden" name="_token" value="{{PATCH}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                    <fieldset class="smart-form">
                                        <section class="col col-6">
                                            <label class="label"> Tracker Name</label>
                                            <label class="input">
                                                <input type="text" name="name" id="name">
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label">Employee Name</label>
                                            <div class="form-group">
                                                <select style="width:100%" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                                    <optgroup label="Performance Employee Trackers">
                                                        <option value="0">-- select trackers --</option>
                                                        @php $tracker = \App\Model\Employee::all(); @endphp
                                                        @foreach($tracker as $trackers)
                                                            <option value="{{$trackers->emp_id}}">{{$trackers->emp_lastname}}{{$trackers->emp_firstname}}</option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                                <div class="note">
                                                    <strong>Usage:</strong> Employee performance tracker
                                                </div>
                                            </div>
                                        </section>
                                    </fieldset>
                                </div>
                                @php  use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\DB;
                                                $e = DB::table('employees')->get();
                                @endphp
                                <select multiple="multiple" size="10" name="duallistbox_demo2" id="initializeDuallistbox">
                                    @foreach($e as $es)
                                        <option value="{{$es->emp_id}}">{{$es->emp_lastname}}{{$es->emp_firstname}}</option>
                                    @endforeach
                                </select>
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
        var $loginForm = $("#frmWorkshift").validate({
            // Rules for form validation
            rules : {
                name : {
                    required : true
                },
                hours_per_day : {
                    required : true
                }
            },
            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });
    </script>
@endsection