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
                        <h2>Add Job Category</h2>
                    </header>
                    <!-- widget div-->
                    <div>
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                        </div>
                        <!-- end widget edit box -->
                        <div class="widget-body no-padding">
                            <form id="job_category" method="POST" enctype="multipart/form-data" action="{{url('administration/jobs-category/'.$job_category->id)}}" class="smart-form">
                                <input name="_method" type="hidden" value="PATCH">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <section>
                                        <label class="label">Job Category</label>
                                        <label class="input">
                                            <input type="text" class="form-control has-error" id="name" name="name" placeholder="Job Category" value="{{$job_category->name}}">
                                        </label>
                                    </section>
                                    <section>
                                        <label class="label"> description</label>
                                        <label class="textarea">
                                            <textarea name="description" id="description" rows="5" cols="5">{{$job_category->description}}</textarea>
                                        </label>
                                        <div class="note">
                                            <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                        </div>
                                    </section>
                                </fieldset>
                                <footer>
                                    <input type="submit" class="btn btn-primary" id="btn-save" value="submit">
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
    </section>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        if (!window.jQuery) {
            document.write('<script src="js/libs/jquery-2.1.1.min.js"><\/script>');
        }
    </script>

    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script>
        if (!window.jQuery.ui) {
            document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');
        }
    </script>

    <script type="text/javascript">

        // DO NOT REMOVE : GLOBAL FUNCTIONS!

        $(document).ready(function() {

            pageSetUp();
            $('#startdate').datepicker({
                // format: 'DD - dd MM yyyy'
            });
            var $loginForm = $("#job_category").validate({
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
@endsection

