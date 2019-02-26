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
                        <h2>Add Employee Status</h2>
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
                            <form id="frmEmployeeStatus" method="POST" enctype="multipart/form-data" action="{{url('administration/employment-status')}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                {{--<input type="hidden" name="user_id" value="{{Auth::guard('admins')->user()->id}}"/>--}}
                                <fieldset>
                                    <section>
                                        <label class="label">name</label>
                                        <label class="input">
                                            <input type="text" name="name" id="name">
                                        </label>
                                    </section>
                                    <section>
                                            <label class="label"> description</label>
                                            <label class="textarea">
                                                <textarea name="description" id="description" rows="5" cols="5"></textarea>
                                            </label>
                                            <div class="note">
                                                <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                            </div>
                                        </section>
                                </fieldset>
                                <footer>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-default" onclick="window.history.back();">
                                        Back
                                    </button>
                                </footer>
                            </form>
                        </div>
                        <!-- end widget content -->

                    </div>
                </div>
            </article>
        </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript">

        // DO NOT REMOVE : GLOBAL FUNCTIONS!

        $(document).ready(function() {
            var $loginForm = $("#frmEmployeeStatus").validate({
                // Rules for form validation
                rules : {
                    name : {
                        required : true
                    },
                },
                // Do not change code below
                errorPlacement : function(error, element) {
                    error.insertAfter(element.parent());
                }
            });
        });
    </script>

@endsection