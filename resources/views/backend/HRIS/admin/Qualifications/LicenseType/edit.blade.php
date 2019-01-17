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
                        <h2>Eduction</h2>
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
                            <form id="frmEducation" method="POST" enctype="multipart/form-data" action="{{url('administration/license-types/'.$l->id)}}" class="smart-form">
                                <input name="_method" type="hidden" value="PATCH">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <label class="label">Name</label>
                                    <section>
                                        <label class="input">
                                            <input value="{{$l->name}}" type="text" name="name" id="name">
                                        </label>
                                    </section>
                                    <section>
                                        <label class="label">description</label>
                                        <label class="textarea">
                                            <textarea value="" rows="8" id="description" name="description" class="custom-scroll">{{$l->description}}</textarea>
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
    <script>
        $(document).ready(function() {
            var $loginForm = $("#frmEducation").validate({
                // Rules for form validation
                rules : {
                    name : {
                        required : true
                    },
                },
                errorPlacement : function(error, element) {
                    error.insertAfter(element.parent());
                }
            });
        });
    </script>
@endsection