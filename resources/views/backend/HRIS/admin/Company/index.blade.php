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
                        <h2> Edit Company Profiles</h2>
                    </header>
                    <div>
                        <div class="jarviswidget-editbox">
                        </div>
                        <div class="widget-body no-padding">

                            @if($guard = Auth::guard('employee')->user())
                                @php
                                    $id = Auth::guard('employee')->user()->company_id;
                                //dd($id)
                                @endphp
                            @else
                                @php
                                    $id = Auth::guard('admins')->user()->id;
                                @endphp
                            @endif
                            {{Form::open(array("url"=>"#", "class"=>"smart-form","enctype"=>"multipart/form-data"))}}
                            <input name="company_id" id="company_id" type="hidden" value="{{$id}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="company_id" value="">
                            <fieldset>
                                <div class="row">
                                    <section class="col col-6">
                                        <label class="label">Company Profiles </label>
                                        <label class="input">
                                            <input  value="{{(Auth::guard('admins')->user()) ? Auth::guard('admins')->user()->name : Auth::guard('employee')->user()->company_id}}" type="text" name="name" id="name">
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label class="label">Company Email</label>
                                        <label class="input">
                                            <input  value="{{(Auth::guard('admins')->user()) ? Auth::guard('admins')->user()->email : Auth::guard('employee')->user()->email}}" type="text" name="email" id="email">
                                        </label>
                                    </section>
                                </div>
                                <section>
                                    <label class="label">Postal Address *</label>
                                    <label class="input">
                                        <textarea id="postal_address" name="postal_address" rows="10" cols="150">{{Auth::guard('admins')->user()->postal_address}}</textarea>
                                    </label>
                                    <div class="note">
                                        <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                    </div>
                                </section>
                                <div class="row">
                                    <section class="col col-4">
                                        <label class="label">City</label>
                                        <label class="input">
                                            <input  value="{{Auth::guard('admins')->user()->city}}" type="text" name="city" id="city">
                                        </label>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">Zip Code</label>
                                        <label class="input">
                                            <input  value="{{Auth::guard('admins')->user()->zip_code}}" type="text" name="zip_code" id="zip_code">
                                        </label>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">Street</label>
                                        <label class="input">
                                            <input  value="{{Auth::guard('admins')->user()->street1}}" type="text" name="street1" id="street1">
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-4">
                                        <label class="label">Country</label>
                                        <label class="input">
                                            <input  value="{{Auth::guard('admins')->user()->country}}" type="text" name="country" id="country">
                                        </label>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">Province</label>
                                        <label class="input">
                                            <input  value="{{Auth::guard('admins')->user()->province}}" type="text" name="province" id="province">
                                        </label>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">Tax Id</label>
                                        <label class="input">
                                            <input  value="{{Auth::guard('admins')->user()->tax_id}}" type="text" name="tax_id" id="tax_id">
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-4">
                                        <label class="label">Websites</label>
                                        <label class="input">
                                            <input  value="{{Auth::guard('admins')->user()->website}}" type="text" name="website" id="website">
                                        </label>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">registration number</label>
                                        <label class="input">
                                            <input  value="{{Auth::guard('admins')->user()->registration_number}}" type="text" name="registration_number" id="registration_number">
                                        </label>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">Noted</label>
                                        <label class="input">
                                            <input  value="{{Auth::guard('admins')->user()->note}}" type="text" name="note" id="note">
                                        </label>
                                    </section>
                                </div>

                                <section>
                                    <label class="label">Company Profiles *</label>
                                    <label class="input">
                                        <textarea id="company_profile" name="ckeditor" rows="10" cols="150">{{Auth::guard('admins')->user()->postal_address}}</textarea>
                                    </label>
                                    <div class="note">
                                        <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                    </div>
                                </section>
                                <div class="row">
                                    <section class="col col-4">
                                        <div class="form-group">
                                            <label class="label">Phone masking</label>
                                            <div class="input-group">
                                                <input id="phone" value="{{Auth::guard('admins')->user()->phone}}" type="text" name="phone" class="form-control" data-mask="(999) 999-9999" data-mask-placeholder= "X">
                                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            </div>
                                            <p class="note">
                                                Data format (XXX) XXX-XXXX
                                            </p>
                                        </div>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">fax *</label>
                                        <label class="input">
                                            <input  value="{{Auth::guard('admins')->user()->fax}}" type="text" name="fax" id="fax">
                                        </label>
                                        <div class="note">
                                            <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                        </div>
                                    </section>
                                    <section class="col col-4">
                                        <div class="form-group">
                                            <label class="label">Mobile</label>
                                            <div class="input-group">
                                                <input value="{{Auth::guard('admins')->user()->mobile}}" type="text" name="mobile" id="mobile" class="form-control" data-mask="(999) 999-9999" data-mask-placeholder= "X">
                                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            </div>
                                            <p class="note">
                                                Data format (XXX) XXX-XXXX
                                            </p>
                                        </div>
                                    </section>
                                </div>
                                <section>
                                    <label class="label">Company Logos *</label>
                                    <label class="input">
                                        <input  value="" type="file" name="company_logo" id="company_logo">
                                    </label>
                                </section>
                                <section>
                                    <div id="forumPost">

                                    </div>
                                </section>
                            </fieldset>

                                <footer>
                                    <input type="button" class="btn btn-primary" id="btn_company" value="">
                                    <input type="hidden" id="product_id" name="product_id" value="0">
                                    <button type="button" class="btn btn-default" id="btnclose" data-dismiss="modal">Close</button>
                                </footer>
                            {{ Form::close() }}
                        </div>

                        <!-- end widget content -->
                    </div>
                </div>
            </article>
        </div>
    </section>
@endsection
@section('script')
<script src=""></script>
      <script src="{{ asset('/js/hr/company.js') }}"></script>
@endsection