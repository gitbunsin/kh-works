@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <style>
        textarea {
            overflow-y: scroll;
            height: 200px;
            resize: none;
        }
    </style>
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2> Works Shift</h2>
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
                            <form id="validate_works_shifts" method="POST" enctype="multipart/form-data" action="{{url('/administration/work-shift/'.$work_shift->id)}}" class="smart-form">
                                <input name="_method" type="hidden" value="PATCH">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <section>
                                        <label class="label">Works Shifts</label>
                                        <label class="input">
                                            <input value="{{$work_shift->name}}" class="col-6" type="text" name="name" id="name">
                                        </label>
                                    </section>
                                    <section>
                                        <label class="label">Hour Per Day</label>
                                        <label class="input">
                                            <input value="{{$work_shift->hours_per_day}}"  type="number" name="hours_per_day" id="hours_per_day">
                                        </label>
                                    </section>
                                    <div class="row">
                                        <section class="col col-5">
                                            <label class="label">Avaible Employee</label>
                                            <label class="input">
                                                @php
                                                  $work_shift_id = $work_shift->id;
                                                    $emp = \App\Employee::all();
                                                @endphp
                                                <select style="width: 365px;height: 200px;" name="possible" class="possible" multiple>
                                                    @foreach($emp as $emps)
                                                        <option value="{{$emps->emp_id}}">{{$emps->emp_lastname}}{{$emps->emp_firstname}}</option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </section>
                                        <p></p>
                                        <section class="col col-2">
                                            <div class="add" style="margin-top: 120px">
                                                <input type="button" value="Add" onclick="MyMoveItem();">
                                                <input type="button" value="Remove" onclick="RemoveItem();">
                                            </div>

                                        </section>
                                        <section class="col col-5">
                                            <label class="label">Assign Employer</label>
                                            <label class="input">
                                                @php
                                                    $work_shift_id = $work_shift->id;
                                                      $emp = \App\Employee::where('emp_id',$work_shift_id)->get();
                                                @endphp
                                                <select id="assign" style="width: 365px;height: 200px;"  name="wishlist_list" class="wishlist_list" multiple>
                                                        @foreach($emp as $emps)
                                                            <option value="{{$emps->emp_id}}">{{$emps->emp_lastname}}{{$emps->emp_firstname}}</option>
                                                        @endforeach
                                                </select>
                                            </label>
                                        </section>
                                    </div>
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
    <script>
        function MyMoveItem()
        {
            var selected = $('.possible option:selected');
            selected.appendTo('.wishlist_list');
        }


        function RemoveItem()
        {
            var selected = $('.wishlist_list option:selected');
            selected.appendTo('.possible');
        }
        //       $(".add").click(function () {
        //           var multipleValues = $( "#multiple" ).val();
        ////           var value = $(this).attr("value");
        ////           console.log(multipleValues);
        ////           alert(multipleValues);
        //           $( "p" ).html(multipleValues);
        //       });
        //          $(".add").(function () {
        //              var multipleValues = $( "#multiple" ).val() || [];
        //              // When using jQuery 3:
        //              // var multipleValues = $( "#multiple" ).val();
        //              $( "p" ).html(multipleValues.join( ", " ) );
        //          });
        //       $( "select" ).change( displayVals );
        //       displayVals();
    </script>

    <script type="text/javascript">

        // DO NOT REMOVE : GLOBAL FUNCTIONS!

        $(document).ready(function() {

            pageSetUp();
            $('#startdate').datepicker({
                // format: 'DD - dd MM yyyy'
            });
            var $loginForm = $("#validate_works_shifts").validate({
                // Rules for form validation
                rules : {
                    name : {
                        required : true
                    },
                    hours_per_day:{
                        required : true
                    },
                },
                // Messages for form validation
                messages : {
                    name : {
                        required : 'field is required !'
                    },
                    hours_per_day : {
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