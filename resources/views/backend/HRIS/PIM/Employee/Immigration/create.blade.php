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
                        <h2> Add Immigration</h2>
                    </header>
                    <!-- widget div-->
                    <div>
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                        </div>
                        <div class="widget-body no-padding">
                            <form id="frmImmigration" method="POST"  action="{{url('administration/view-immigration')}}" class="smart-form" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <div class="row">
                                    <section>
                                        <label class="label col col-2">Documents</label>
                                        <div class="inline-group">
                                            <div class="col col-10">
                                                <label class="radio">
                                                    <input checked value="1" type="radio" name="document" id="document">
                                                    <i></i>Passport
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" value="2" id="document" name="document">
                                                    <i></i> Visa
                                                </label>
                                            </div>
                                        </div>
                                    </section>
                                    </div>
                                    <section>
                                        <label class="label">Number </label>
                                        <label class="input">
                                            <i class="icon-append fa fa-joomla"></i>
                                            <input type="number" name="passport_number" id="passport_number">
                                            <b class="tooltip tooltip-bottom-right">Needed to enter available name</b> </label>

                                        </label>
                                    </section>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> Issued Date </label>
                                            <label class="input">
                                                <i class="icon-append fa fa-calendar"></i>
                                                <input type="text" id="issued_date" name="issued_date" class="datepicker">
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label">  Expiry Date </label>
                                            <label class="input">
                                                <i class="icon-append fa fa-calendar"></i>
                                                <input type="text" id="expiry_date" name="expiry_date" class="datepicker">
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> Eligible Status</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-joomla"></i>
                                                <input type="number" name="status" id="status">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available name</b> </label>

                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Issued By  </label>
                                            <label class="select">
                                                <select name="Issued_By" id="Issued_By">
                                                    <option value="">-- select --</option>
                                                    {{--@php $nationality = \App\nation::all(); @endphp--}}
                                                    {{--@foreach($nationality as $nationalities)--}}
                                                         {{--<option value="{{$nationalities->id}}">{{$nationalities->name}}</option>--}}
                                                    {{--@endforeach--}}
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                    <section>
                                        <label class="label"> Eligible Review Date </label>
                                        <label class="input">
                                            <i class="icon-append fa fa-calendar"></i>
                                            <input type="text" id="review_date" name="review_date" class="datepicker">
                                        </label>
                                    </section>
                                    <section>
                                        <label class="label"> Comments *</label>
                                        <label class="input">
                                            <textarea id="comments" name="comments" rows="10" cols="165"> </textarea>
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
            var $loginForm = $("#frmImmigration").validate({
                // Rules for form validation
                rules : {
                    passport_number : {
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