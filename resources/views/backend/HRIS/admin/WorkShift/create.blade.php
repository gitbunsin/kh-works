@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
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
                        {{--<h2>Add Job title</h2>--}}
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
                            {{--<form id="validate_works_shifts" method="POST" enctype="multipart/form-data" action="{{url('administration/work-shift')}}" class="smart-form">--}}
                                {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                                {{--<input type="hidden" name="user_id" value="{{Auth::guard('admins')->user()->id}}"/>--}}
                                {{--<fieldset>--}}
                                    {{--<section>--}}
                                        {{--<label class="label">Works Shifts</label>--}}
                                        {{--<label class="input">--}}
                                            {{--<input class="col-6" type="text" name="name" id="name">--}}
                                        {{--</label>--}}
                                    {{--</section>--}}
                                    {{--<section>--}}
                                        {{--<label class="label">Hour Per Day</label>--}}
                                        {{--<label class="input">--}}
                                            {{--<input  type="number" name="hours_per_day" id="hours_per_day">--}}
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
                                                {{--<select id="assign" style="width: 365px;height: 200px;"  name="wishlist[]" class="wishlist" multiple>--}}
                                                    {{--<option value="volvo"></option>--}}
                                                {{--</select>--}}
                                            {{--</label>--}}
                                        {{--</section>--}}
                                    {{--</div>--}}
                                    {{--<div>--}}

                                        {{--<!-- widget edit box -->--}}
                                        {{--<div class="jarviswidget-editbox">--}}
                                            {{--<!-- This area used as dropdown edit box -->--}}

                                        {{--</div>--}}
                                        {{--<!-- end widget edit box -->--}}

                                        {{--<!-- widget content -->--}}
                                        {{--<div class="widget-body">--}}

                                            {{--<select multiple="multiple" size="10" name="duallistbox_demo2" id="initializeDuallistbox">--}}
                                                {{--<option value="option1">Option 1</option>--}}
                                                {{--<option value="option2">Option 2</option>--}}
                                                {{--<option value="option3" selected="selected">Option 3</option>--}}
                                                {{--<option value="option4">Option 4</option>--}}
                                                {{--<option value="option5">Option 5</option>--}}
                                                {{--<option value="option6" selected="selected">Option 6</option>--}}
                                                {{--<option value="option7">Option 7</option>--}}
                                                {{--<option value="option8">Option 8</option>--}}
                                                {{--<option value="option9">Option 9</option>--}}
                                                {{--<option value="option0">Option 10</option>--}}
                                                {{--<option value="option0">Option 11</option>--}}
                                                {{--<option value="option0">Option 12</option>--}}
                                                {{--<option value="option0">Option 13</option>--}}
                                                {{--<option value="option0">Option 14</option>--}}
                                                {{--<option value="option0">Option 15</option>--}}
                                                {{--<option value="option0">Option 16</option>--}}
                                                {{--<option value="option0">Option 17</option>--}}
                                                {{--<option value="option0">Option 18</option>--}}
                                                {{--<option value="option0">Option 19</option>--}}
                                                {{--<option value="option0">Option 20</option>--}}
                                            {{--</select>--}}

                                        {{--</div>--}}
                                        {{--<!-- end widget content -->--}}
                                    {{--</div>--}}
                                    {{--<!-- end widget div -->--}}
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
    <section id="widget-grid" class="">

    <!-- row -->
    <div class="row">
        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="jarviswidget jarviswidget-color-darken" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
            <header>
                <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                <h2>Employee Work Shift </h2>
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
    </script>
@endsection
@section('script')


@endsection