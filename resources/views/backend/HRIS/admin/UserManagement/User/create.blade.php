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
                        <h2>Add User</h2>
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
                            <form id="validate_works_shifts" method="POST" enctype="multipart/form-data" action="{{url('administration/userRole')}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="user_id" value="{{Auth::guard('admins')->user()->id}}"/>
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label">Username</label>
                                            <label class="input">
                                                <input class="col-6" type="text" name="name" id="name">
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> UserRoles</label>
                                            <label class="select">
                                                @php use App\JobTitle;$Role= \App\UserRole::all(); @endphp
                                                <select name="user_roles" id="user_roles">
                                                    <option value="0">Choose Roles</option>
                                                    @foreach($Role as $Roles)
                                                        <option value="{{$Roles->id}}">{{$Roles->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label">Employee</label>
                                            <label class="input">
                                                <input class="col-6" type="text" name="name" id="name">
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Status</label>
                                            <label class="select">
                                                {{--@php use App\JobTitle;$Role= \App\UserRole::all(); @endphp--}}
                                                <select name="user_roles" id="user_roles">
                                                    <option value="0">Choose Status</option>
                                                    <option value="1">Enable</option>
                                                    <option value="2">Disabled</option>
                                                </select>
                                                <i></i>
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
            selected.appendTo('.wishlist');
        }


        function RemoveItem()
        {
            var selected = $('.wishlist option:selected');
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