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
                            <form id="frmLocations" method="POST" enctype="multipart/form-data" action="{{url('administration/locations')}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="user_id" value="{{Auth::guard('admins')->user()->id}}"/>
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">Name</label>
                                            <label class="input"> <i class="icon-append fa fa-joomla"></i>
                                                <input type="text" name="name" placeholder="Name">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available name</b> </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Country</label>
                                            <label class="select state-success">
                                                <select name="country_code" id="country_code" class="valid">
                                                    @php use Illuminate\Support\Facades\DB;$country =\App\Model\Country::all(); @endphp
                                                    <option value="">-- country --</option>
                                                    @foreach($country as $countries)
                                                        <option value="{{$countries->id}}">{{$countries->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">State/Province</label>
                                            <label class="input"> <i class="icon-append fa fa-joomla"></i>
                                                <input type="text" name="province_id" placeholder="Name">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available name</b> </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">City</label>
                                            <label class="input"> <i class="icon-append fa fa-joomla"></i>
                                                <input type="text" name="city" placeholder="Name">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available name</b> </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Address</label>
                                            <label class="input"> <i class="icon-append fa fa-joomla"></i>
                                                <input type="text" name="address" placeholder="Name">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available name</b> </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Zip/Postal Code</label>
                                            <label class="input">
                                                <label class="input"> <i class="icon-append fa fa-joomla"></i>
                                                    <input  type="text" name="zip_code" id="zip_code">
                                                    <b class="tooltip tooltip-bottom-right">Needed to enter available name</b> </label>
                                            </label>
                                        </section>
                                    </div>

                                        <div class="row">
                                            <section class="col col-4">
                                                <label class="label">Phone</label>
                                                <label class="input">
                                                    <label class="input"> <i class="icon-append fa fa-joomla"></i>
                                                        <input  type="text" name="phone" id="phone">
                                                        <b class="tooltip tooltip-bottom-right">Needed to enter available name</b> </label>
                                                </label>
                                            </section>
                                            <section class="col col-4">
                                                <label class="label">Fax</label>
                                                <label class="input">
                                                    <label class="input"> <i class="icon-append fa fa-joomla"></i>
                                                        <input  type="text" name="fax" id="fax">
                                                        <b class="tooltip tooltip-bottom-right">Needed to enter available name</b>
                                                    </label>

                                                </label>
                                            </section>
                                            <section class="col col-4">
                                                <label class="label">Notes</label>
                                                <label class="input">
                                                    <label class="input"> <i class="icon-append fa fa-joomla"></i>

                                                        <input  type="text" name="notes" id="notes">
                                                        <b class="tooltip tooltip-bottom-right">Needed to enter available name</b>
                                                    </label>
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