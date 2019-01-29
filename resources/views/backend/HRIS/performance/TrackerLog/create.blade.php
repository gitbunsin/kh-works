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
                        <form id="frmWorkshift" method="POST" enctype="multipart/form-data" action="{{url('administration/employee-performance-trackers')}}" class="">
                            <div class="widget-body">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div id="log_id">
                                    <fieldset class="smart-form">
                                        <div class="row">
                                            <section class="col col-6">
                                                <label class="label"> Tracker Name</label>
                                                <label class="input">
                                                    <input type="text" name="name" id="name">
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label class="label"> Marital Status</label>
                                                <label class="select">
                                                    <select name="marital_status" id="martial_Status" disabled="">
                                                        <option value="">-- select --</option>
                                                        <option value="1">Positive</option>
                                                        <option value="2">Negative</option>
                                                    </select>
                                                    <i></i>
                                                </label>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-lg-12">
                                                <label class="label">Postal Address *</label>
                                                <label class="input">
                                                    <textarea id="postal_address" name="postal_address" rows="10" cols="150">{{Auth::guard('admins')->user()->postal_address}}</textarea>
                                                </label>
                                                <div class="note">
                                                    <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                                </div>
                                            </section>
                                        </div>

                                    </fieldset>
                                </div>
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

        let baseURL = "{{URL::to('/')}}/";
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
        $('')


    </script>
@endsection