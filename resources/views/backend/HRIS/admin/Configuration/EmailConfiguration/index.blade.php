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
                        <h2> Mail Configuration</h2>
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
                                    <div class="row">
                                    <section class="col col-6">
                                        <label class="label"> Mail Sent As *</label>
                                        <label class="input">
                                            <input type="text" class="form-control has-error" id="name" name="name" value="">
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label class="label"> Sending Method</label>
                                        <label class="select state-success">
                                            <select name="country_code" id="country_code" class="valid">
                                                <option value="">-- select Mail --</option>
                                                <option value="1"> Sendmail</option>
                                                <option value="1">SMTP</option>
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> Path to Sendmail *</label>
                                            <label class="input">
                                                <input type="text" class="form-control has-error" id="PathSendMail" name="PathSendMail"  value="">
                                            </label>
                                        </section>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"></label>
                                            <div class="inline-group">
                                                <label class="checkbox">
                                                    <input value="" type="checkbox" name="SIN" id="SIN">
                                                    <i></i> Send Test Email
                                                </label>
                                            </div>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Test Email Address *</label>
                                            <label class="input">
                                                <input type="text" class="form-control has-error" id="TestEmailAddress" name="TestEmailAddress" value="">
                                            </label>
                                        </section>
                                    </div>
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

