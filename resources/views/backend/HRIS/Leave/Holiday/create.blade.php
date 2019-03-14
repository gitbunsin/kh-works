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
                        <h2> Holiday </h2>
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
                            <form id="frmHoliday" method="POST" enctype="multipart/form-data" action="{{url('administration/define-holiday')}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <section>
                                        <label class="label">Name</label>
                                        <label class="input"> <i class="icon-append fa fa-user"></i>
                                            <input type="text" name="name" placeholder="Name">
                                            <b class="tooltip tooltip-bottom-right">Needed to enter available name</b> </label>
                                    </section>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> Date * </label>
                                            <label class="input">
                                                <i class="icon-append fa fa-calendar"></i>
                                                <input type="text" id="date" name="date" class="datepicker">
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Full Day/Half Day </label>
                                            @php $Holiday = array('0'=>'FullDay','8'=>'Half Day'); @endphp
                                            <label class="select">
                                                <select name="day" id="day">
                                                    <option value="">-- select --</option>
                                                    @foreach($Holiday as $key => $Holidays)
                                                            <option value="{{$key}}">{{$Holidays}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                    <section>
                                        <div class="row">
                                            <label class="label col col-2"> check Repeat Holiday
                                            </label>
                                            <div class="inline-group col col-8">
                                                <label class="checkbox">
                                                    <input name="check" value="1" type="checkbox" id="myCheck">
                                                    <i></i> Yes
                                                </label>
                                                <label class="checkbox">
                                                    <input name="uncheck" value="0" type="checkbox" id="myCheck">
                                                    <i></i> No
                                                </label>

                                            </div>
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
         // $('#IsDefault').val("0");
         // $("#IsDefault").click(function(){
         //     if ($(this).prop('checked')==true){
         //         //do something
         //         $('#IsDefault').val("1");
         //     }else{
         //         $('#IsDefault').val("0");
         //     }
         // });
         $('#date').datepicker({
             dateFormat: 'yy-mm-dd',
             prevText: '<i class="fa fa-chevron-left"></i>',
             nextText: '<i class="fa fa-chevron-right"></i>',
             onSelect: function (selectedDate) {
                 $('#finishdate').datepicker('option', 'minDate', selectedDate);
             }
         });
            var $loginForm = $("#frmHoliday").validate({
                // Rules for form validation
                rules : {
                    name : {
                        required : true
                    },
                    date : {
                        required: true
                    },
                    day: {
                        required:true
                    }
                },
                // Do not change code below
                errorPlacement : function(error, element) {
                    error.insertAfter(element.parent());
                }
            });
    </script>
@endsection