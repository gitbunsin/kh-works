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
                            <form id="frmKpi" method="POST" enctype="multipart/form-data" action="{{url('administration/employee-kpi/'.$k->id)}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input name="_method" type="hidden" value="PATCH">
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> Job Title</label>
                                            <label class="select state-success">
                                                <select name="job_titles_code" id="job_titles_code" class="valid">
                                                    @php $c = \App\Model\JobTitle::all(); {{$k->job_titles_code;}}@endphp
                                                    <option value="">-- select --</option>
                                                    @foreach($c as $cs)
                                                        <option value="{{$cs->id}}" {{$k->job_titles_code == $cs->id ? 'selected="selected"' : ''}} >{{$cs->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Key Performance Indicator</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-joomla"></i>
                                                <input value="{{$k->kpi_indicators}}" type="text" name="performance" id="performance"/>
                                                <b class="tooltip tooltip-bottom-right">Key Performance Indicator</b>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> Minimum Rating</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-joomla"></i>
                                                <input type="number" value="{{$k->min_rating}}" name="min_id" id="min_id"/>
                                                <b class="tooltip tooltip-bottom-right">Minimum Rating</b>
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Maximum Rating</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-joomla"></i>
                                                <input type="number" value="{{$k->max_rating}}" name="max_id" id="max_id"/>
                                                <b class="tooltip tooltip-bottom-right">Maximum Rating</b>
                                            </label>
                                        </section>
                                    </div>
                                    <section>
                                        <label class="label"></label>
                                        <div class="inline-group">
                                            <label class="checkbox">
                                                {{--@php dd($k->default_kpi) @endphp--}}
                                                @if($k->default_kpi == "1")
                                                <input  value="1" type="checkbox" name="IsDefault_yes" id="IsDefault_yes" checked>
                                                @else
                                                    <input value="0" type="checkbox" name="IsDefault_no" id="IsDefault_no">
                                                @endif
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
        // $('#IsDefault_yes').val("1");
        $('#IsDefault_no').click(function () {
           $('#IsDefault_no').val("1");
        });

        $('#IsDefault_yes').click(function () {
            $('#IsDefault_yes').val("0");
        });
        var $loginForm = $("#frmKpi").validate({
            // Rules for form validation
            rules : {
                job_titles_code : {
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