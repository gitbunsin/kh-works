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
                            <form id="frmCategory" action="{{url('/administration/jobs-category')}}" method="post"  class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <section>
                                        <label class="label">Job Category</label>
                                        <label class="input">
                                            <input type="text" class="form-control has-error" id="name" name="name" placeholder="Job Category" value="">
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
                                    {{--<section class="col col-4">--}}
                                        {{--<label class="label">Country</label>--}}
                                        {{--<label class="select state-success">--}}
                                            {{--<select name="country_code" id="country_code" class="valid">--}}
                                                {{--<option value="">-- country --</option>--}}
                                                {{--<option value="1">Cambodia--}}
                                                {{--</option>--}}
                                            {{--</select>--}}
                                            {{--<i></i>--}}
                                        {{--</label>--}}
                                    {{--</section>--}}
                                </fieldset>
                                <footer>
                                    <input type="submit" class="btn btn-primary" id="btn-save" value="Save">
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

@endsection
@section('script')
    <script type="text/javascript">

        // DO NOT REMOVE : GLOBAL FUNCTIONS!

        $(document).ready(function() {
            var $loginForm = $("#frmCategory").validate({
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

