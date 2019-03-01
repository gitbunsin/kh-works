
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
                                                $e = DB::table('employees')
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