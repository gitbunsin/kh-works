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
                            <form id="frmHoliday" method="POST" enctype="multipart/form-data" action="{{url('administration/define-holiday/'.$h->id)}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input name="_method" type="hidden" value="PATCH">
                                <fieldset>
                                    <section>
                                        <label class="label">Name *</label>
                                        <label class="input">
                                            <input value="{{$h->name}}" type="text" name="name" id="name">
                                        </label>
                                    </section>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> Date * </label>
                                            <label class="input">
                                                <i class="icon-append fa fa-calendar"></i>
                                                <input value="{{date('d-m-Y', strtotime($h->date))}}" type="text" id="date" name="date" class="datepicker">
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Full Day/Half Day </label>
                                            <label class="select">
                                                <select name="day" id="day">
                                                    <option value="">-- select --</option>
                                                    <option value="0" {{"0" == $h->length ? "selected=='selected'":''}}> Full Day</option>
                                                    <option value="4" {{"4" == $h->length ? "selected=='selected'":''}}> Half Day</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                    <section>
                                        <label class="label"></label>
                                        <div class="inline-group">
                                            @if($h->recurring == "1")
                                            <label class="checkbox">
                                                <input value="" type="checkbox" checked  name="IsDefault" id="IsDefault">
                                                <i></i>Repeats Annually
                                            </label>
                                                @else
                                                <label class="checkbox">
                                                    <input value="" type="checkbox" name="IsDefault1" id="IsDefault1">
                                                    <i></i>Repeats Annually
                                                </label>
                                                @endif

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
        // $(document).ready(function() {
        //     $('#IsDefault').click(function(event) {
        //         if(this.checked) { // check select status
        //                 this.checked = true;  //select all
        //         }else{
        //                 this.checked = false; //deselect all
        //         }
        //     });
        // });
        // $('#IsDefault').val("1");
        // $("#IsDefault").click(function(){
        //     if ($(this).prop('checked')==true){
        //         //do something
        //         $('#IsDefault').val("1");
        //     }else{
        //         $('#IsDefault').val("0");
        //     }
        // });
        //
        //
        // $('#IsDefault1').val("0");
        // $("#IsDefault1").click(function(){
        //     if ($(this).prop('checked')==true){
        //         //do something
        //         $('#IsDefault1').val("1");
        //     }else{
        //         $('#IsDefault1').val("0");
        //     }
        // });

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