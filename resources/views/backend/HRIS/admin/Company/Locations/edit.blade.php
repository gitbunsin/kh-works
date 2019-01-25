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
                            <form id="frmLocations" method="POST" enctype="multipart/form-data" action="{{url('administration/locations/'.$l->id)}}" class="smart-form">
                                <input name="_method" type="hidden" value="PATCH">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">Name</label>
                                            <label class="input">
                                                <input value="{{$l->location_name}}"  type="text" name="name" id="name">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Country</label>
                                            <label class="select state-success">
                                                <select name="country_code" id="country_code" class="valid">
                                                    @php use Illuminate\Support\Facades\DB;$c = DB::table('tbl_country')->get(); @endphp
                                                    <option value="">-- country --</option>
                                                    @foreach($c as $cs)
                                                        <option value="{{$cs->id}}"  {{ $l->country_code == $l->id ? 'selected="selected"' : '' }}>{{$l->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">State/Province</label>
                                            <label class="input">
                                                <input value="{{$l->province}}"  type="text" name="province_id" id="province_id">
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">City</label>
                                            <label class="input">
                                                <input  value="{{$l->city}}" type="text" name="city" id="city">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Address</label>
                                            <label class="input">
                                                <input value="{{$l->address}}"  type="text" name="address" id="address">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Zip/Postal Code</label>
                                            <label class="input">
                                                <input value="{{$l->zip_code}}" type="text" name="zip_code" id="zip_code">
                                            </label>
                                        </section>
                                    </div>

                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">Phone</label>
                                            <label class="input">
                                                <input value="{{$l->phone}}"  type="text" name="phone" id="phone">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Fax</label>
                                            <label class="input">
                                                <input value="{{$l->fax}}" type="text" name="fax" id="fax">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Notes</label>
                                            <label class="input">
                                                <input value="{{$l->notes}}" type="text" name="notes" id="notes">
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
@section('script')
    <script type="text/javascript">
        var $loginForm = $("#frmLocations").validate({
            // Rules for form validation
            rules : {
                name : {
                    required : true
                },
                country_code: {
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