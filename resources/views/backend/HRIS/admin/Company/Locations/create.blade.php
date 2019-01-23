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
                        <h2>Locations</h2>
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
                            <form id="validate_pay_grade" method="POST" enctype="multipart/form-data" action="{{url('administration/locations')}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="user_id" value="{{Auth::guard('admins')->user()->id}}"/>
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">Name</label>
                                            <label class="input">
                                                <input  type="text" name="name" id="name">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Country</label>
                                            <label class="select state-success">
                                                <select name="country_code" id="country_code" class="valid">
                                                    @php use Illuminate\Support\Facades\DB;$c = DB::table('tbl_country')->get(); @endphp
                                                    <option value="">-- country --</option>
                                                    @foreach($c as $cs)
                                                        <option value="{{$cs->id}}">{{$cs->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">State/Province</label>
                                            <label class="input">
                                                <input  type="text" name="province_id" id="province_id">
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">City</label>
                                            <label class="input">
                                                <input  type="text" name="city" id="city">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Address</label>
                                            <label class="input">
                                                <input  type="text" name="address" id="address">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Zip/Postal Code</label>
                                            <label class="input">
                                                <input  type="text" name="zip_code" id="zip_code">
                                            </label>
                                        </section>
                                    </div>

                                        <div class="row">
                                            <section class="col col-4">
                                                <label class="label">Phone</label>
                                                <label class="input">
                                                    <input  type="text" name="phone" id="phone">
                                                </label>
                                            </section>
                                            <section class="col col-4">
                                                <label class="label">Fax</label>
                                                <label class="input">
                                                    <input  type="text" name="fax" id="fax">
                                                </label>
                                            </section>
                                            <section class="col col-4">
                                                <label class="label">Notes</label>
                                                <label class="input">
                                                    <input  type="text" name="notes" id="notes">
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
@endsection