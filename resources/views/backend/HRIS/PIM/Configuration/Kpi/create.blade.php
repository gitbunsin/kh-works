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
                        <h2>Add Termination Reason</h2>
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
                            <form id="frmKpi" method="POST" enctype="multipart/form-data" action="{{url('administration/employee-kpi')}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> Job Title</label>
                                            <label class="select state-success">
                                                <select name="job_title_code" id="job_title_code" class="valid">
                                                    @php $c = \App\JobTitle::all(); @endphp
                                                    <option value="">-- select --</option>
                                                    @foreach($c as $cs)
                                                        <option value="{{$cs->id}}">{{$cs->job_title}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Key Performance Indicator</label>
                                            <label class="input">
                                               <input type="text" name="performance" id="performance"/>
                                            </label>
                                            <div class="note">
                                                <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                            </div>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> Minimum Rating</label>
                                            <label class="input">
                                                <input type="number" name="min_id" id="min_id"/>
                                            </label>
                                            <div class="note">
                                                <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                            </div>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Maximum Rating</label>
                                            <label class="input">
                                                <input type="number" name="max_id" id="max_id"/>
                                            </label>
                                            <div class="note">
                                                <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                            </div>
                                        </section>
                                    </div>
                                    <section>
                                        <label class="label"></label>
                                        <div class="inline-group">
                                            <label class="checkbox">
                                                <input value="0" type="checkbox" name="IsDefault" id="IsDefault">
                                                <i></i>Make Default Scale
                                            </label>
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
            var $loginForm = $("#frmKpi").validate({
                // Rules for form validation
                rules : {
                    job_title_code : {
                        required : true
                    },
                    performance : {
                        required: true
                    },
                    min_id : {
                        required : true
                    },
                    max_id : {
                        required: true
                    }

                },
                // Do not change code below
                errorPlacement : function(error, element) {
                    error.insertAfter(element.parent());
                }
            });
    </script>
@endsection