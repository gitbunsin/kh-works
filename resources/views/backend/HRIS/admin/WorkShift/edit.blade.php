
@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2> Employee WorkShift</h2>
                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->

                        </div>
                        <form id="" method="POST" enctype="multipart/form-data" action="{{url('administration/work-shift')}}" class="">
                            <div class="widget-body">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="user_id" value="{{Auth::guard('admins')->user()->id}}"/>
                                <div class="row">
                                    <fieldset class="smart-form">
                                        <section class="col col-6">
                                            <label class="label">Works Shifts</label>
                                            <label class="input">
                                                <input type="text" name="name" id="name">
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label">Hour Per Day</label>
                                            <label class="input">
                                                <input  type="number" name="hours_per_day" id="hours_per_day">
                                            </label>
                                        </section>
                                    </fieldset>
                                </div>
                                -@php  use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\DB;
                                                $e = DB::table('tbl1_hr_employee')
                                                ->where('company_id',Auth::guard('admins')->user()->id)
                                                ->where('status',0)
                                                ->get();
                                @endphp
                                <select multiple="multiple" size="10" name="duallistbox_demo2" id="initializeDuallistbox">
                                    @foreach($e as $es)
                                        <option value="{{$es->emp_id}}">{{$es->emp_lastname}}{{$es->emp_firstname}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br/>
                            <!-- end widget content -->
                            <fieldset class="smart-form">
                                <footer>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-default" onclick="window.history.back();">
                                        Back
                                    </button>
                                    <br/>
                                </footer>
                            </fieldset>

                        </form>


                    </div>
                    <!-- end widget div -->
                    <br/>
                </div>
                <!-- end widget -->

            </article>
            <!-- END COL -->
        </div>
    </section>
@endsection
@section('script')


@endsection
{{--@extends('backend.HRIS.layouts.cms-layouts')--}}
{{--@section('content')--}}
    {{--<style>--}}
        {{--textarea {--}}
            {{--overflow-y: scroll;--}}
            {{--height: 200px;--}}
            {{--resize: none;--}}
        {{--}--}}
    {{--</style>--}}
    {{--<section id="widget-grid" class="">--}}

        {{--<!-- row -->--}}
        {{--<div class="row">--}}
            {{--<!-- NEW WIDGET START -->--}}
            {{--<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">--}}
                {{--<!-- Widget ID (each widget will need unique ID)-->--}}
                {{--<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">--}}
                    {{--<header>--}}
                        {{--<span class="widget-icon"> <i class="fa fa-edit"></i> </span>--}}
                        {{--<h2> Works Shift</h2>--}}
                    {{--</header>--}}
                    {{--<!-- widget div-->--}}
                    {{--<div>--}}
                        {{--<!-- widget edit box -->--}}
                        {{--<div class="jarviswidget-editbox">--}}
                            {{--<!-- This area used as dropdown edit box -->--}}
                        {{--</div>--}}
                        {{--<!-- end widget edit box -->--}}
                        {{--<!-- widget content -->--}}
                        {{--<div class="widget-body no-padding">--}}
                            {{--<form id="validate_works_shifts" method="POST" enctype="multipart/form-data" action="{{url('/administration/work-shift/'.$work_shift->id)}}" class="smart-form">--}}
                                {{--<input name="_method" type="hidden" value="PATCH">--}}
                                {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                                {{--<fieldset>--}}
                                    {{--<section>--}}
                                        {{--<label class="label">Works Shifts</label>--}}
                                        {{--<label class="input">--}}
                                            {{--<input value="{{$work_shift->name}}" class="col-6" type="text" name="name" id="name">--}}
                                        {{--</label>--}}
                                    {{--</section>--}}
                                    {{--<section>--}}
                                        {{--<label class="label">Hour Per Day</label>--}}
                                        {{--<label class="input">--}}
                                            {{--<input value="{{$work_shift->hours_per_day}}"  type="number" name="hours_per_day" id="hours_per_day">--}}
                                        {{--</label>--}}
                                    {{--</section>--}}
                                    {{--<div class="row">--}}
                                        {{--<section class="col col-5">--}}
                                            {{--<label class="label">Available Employee</label>--}}
                                            {{--<label class="input">--}}
                                                {{--@php  use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\DB;--}}
                                                            {{--$emp = DB::table('tbl1_hr_employee')--}}
                                                {{--->where('company_id',Auth::guard('admins')->user()->id)--}}
                                                {{--->where('status',0)--}}
                                                {{--->get();--}}
                                              {{--// dd($emp);--}}
                                                {{--@endphp--}}
                                                {{--<input type="hidden" value="{{$emp->emp_id}}" name="emp_id"/>--}}
                                                {{--<select style="width: 365px;height: 200px;" name="possible[]" class="possible" multiple>--}}
                                                    {{--@foreach($emp as $emps)--}}
                                                        {{--<option value="{{$emps->emp_id}}">{{$emps->emp_lastname}}{{$emps->emp_firstname}}</option>--}}
                                                    {{--@endforeach--}}
                                                {{--</select>--}}
                                                {{--{{Form::select('possible[]',$category_details,null,array('multiple'=>true,'class'=>'custom-scroll')); }}--}}
                                            {{--</label>--}}
                                        {{--</section>--}}
                                        {{--<p></p>--}}
                                        {{--<section class="col col-2">--}}
                                            {{--<div class="add" style="margin-top: 120px">--}}
                                                {{--<input type="button" value="Add" onclick="MyMoveItem();">--}}
                                                {{--<input type="button" value="Remove" onclick="RemoveItem();">--}}
                                            {{--</div>--}}

                                        {{--</section>--}}
                                        {{--<section class="col col-5">--}}
                                            {{--<label class="label">Assign Employer</label>--}}
                                            {{--<label class="input">--}}
                                                {{--@php--}}
                                                    {{--$emp_id =--}}
                                                     {{--DB::table('tbl_employee_work_shift as s')--}}
                                                                {{--->select('s.*','e.*')--}}
                                                                {{--->join('tbl1_hr_employee as e','s.emp_id','=','e.emp_id')--}}
                                                                {{--->where('status',1)--}}
                                                                {{--->get();--}}
                                                               {{--// dd($emp_id);--}}

                                                {{--@endphp--}}
                                                {{--<select id="assign" style="width: 365px;height: 200px;"  name="wishlist_list[]" class="wishlist_list" multiple>--}}
                                                        {{--@foreach($emp_id as $emps)--}}
                                                            {{--<option value="{{$emps->emp_id}}">{{$emps->emp_lastname}}{{$emps->emp_firstname}}</option>--}}
                                                        {{--@endforeach--}}
                                                {{--</select>--}}
                                            {{--</label>--}}
                                        {{--</section>--}}
                                    {{--</div>--}}
                                {{--</fieldset>--}}
                                {{--<footer>--}}
                                    {{--<button type="submit" class="btn btn-primary">Save</button>--}}
                                    {{--<button type="button" class="btn btn-default" onclick="window.history.back();">--}}
                                        {{--Back--}}
                                    {{--</button>--}}
                                {{--</footer>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                        {{--<!-- end widget content -->--}}

                    {{--</div>--}}
                {{--</div>--}}
            {{--</article>--}}
        {{--</div>--}}
    {{--</section>--}}
    {{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>--}}
    {{--<script>--}}
        {{--if (!window.jQuery) {--}}
            {{--document.write('<script src="js/libs/jquery-2.1.1.min.js"><\/script>');--}}
        {{--}--}}
    {{--</script>--}}

    {{--<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>--}}
    {{--<script>--}}
        {{--if (!window.jQuery.ui) {--}}
            {{--document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');--}}
        {{--}--}}
    {{--</script>--}}
    {{--<script>--}}
        {{--function MyMoveItem()--}}
        {{--{--}}
            {{--var selected = $('.possible option:selected');--}}
            {{--selected.appendTo('.wishlist_list');--}}
        {{--}--}}


        {{--function RemoveItem()--}}
        {{--{--}}
            {{--var selected = $('.wishlist_list option:selected');--}}
            {{--selected.appendTo('.possible');--}}
        {{--}--}}
        {{--//       $(".add").click(function () {--}}
        {{--//           var multipleValues = $( "#multiple" ).val();--}}
        {{--////           var value = $(this).attr("value");--}}
        {{--////           console.log(multipleValues);--}}
        {{--////           alert(multipleValues);--}}
        {{--//           $( "p" ).html(multipleValues);--}}
        {{--//       });--}}
        {{--//          $(".add").(function () {--}}
        {{--//              var multipleValues = $( "#multiple" ).val() || [];--}}
        {{--//              // When using jQuery 3:--}}
        {{--//              // var multipleValues = $( "#multiple" ).val();--}}
        {{--//              $( "p" ).html(multipleValues.join( ", " ) );--}}
        {{--//          });--}}
        {{--//       $( "select" ).change( displayVals );--}}
        {{--//       displayVals();--}}
    {{--</script>--}}

    {{--<script type="text/javascript">--}}

        {{--// DO NOT REMOVE : GLOBAL FUNCTIONS!--}}

        {{--$(document).ready(function() {--}}

            {{--pageSetUp();--}}
            {{--$('#startdate').datepicker({--}}
                {{--// format: 'DD - dd MM yyyy'--}}
            {{--});--}}
            {{--
            {{--});--}}
        {{--});--}}

    {{--</script>--}}
{{--@endsection--}}