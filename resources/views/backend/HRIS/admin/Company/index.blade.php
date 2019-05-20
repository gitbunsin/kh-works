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
                            {{Form::open(array("url"=>"administration/companyProfile/".$id,"method"=>"POST","class"=>"smart-form","id"=>"frmCompany","enctype"=>"multipart/form-data"))}}
                                <input name="_method" type="hidden" value="PATCH">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <fieldset>
                                <div class="row">
                                    <section class="col col-6">
                                        <label class="label">Company Name </label>
                                        <div class="input-group">
                                            <input class="form-control" value="{{(Auth::guard('admins')->user()) ? Auth::guard('admins')->user()->name : Auth::guard('employee')->user()->company_id}}" type="text" name="name" id="name">
                                            <span class="input-group-addon"><i class="fa fa-book "></i></span>
                                        </div>
                                    </section>
                                    <section class="col col-6">
                                        <label class="label">Company Email</label>
                                        <div class="input-group">
                                            <input  class="form-control" value="{{(Auth::guard('admins')->user()) ? Auth::guard('admins')->user()->email : Auth::guard('employee')->user()->email}}" type="text" name="email" id="email">
                                            <span class="input-group-addon"><i class="fa fa-send-o "></i></span>
                                        </div>
                                    </section>
                                </div>
                                <section>
                                    <label class="label">Postal Address *</label>
                                    <label class="input">
                                        <textarea class="form-control" id="postal_address" name="postal_address" rows="10" cols="163">{{Auth::guard('admins')->user()->postal_address}}</textarea>
                                    </label>
                                    <div class="note">
                                        <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                    </div>
                                </section>
                                <div class="row">
                                    <section class="col col-4">
                                        <label class="label">City</label>
                                        <div class="input-group">
                                            <input class="form-control" value="{{Auth::guard('admins')->user()->city}}" type="text" name="city" id="city">
                                            <span class="input-group-addon"><i class="fa fa-send-o "></i></span>
                                        </div>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">Zip Code</label>
                                        <div class="input-group">
                                            <input class="form-control" value="{{Auth::guard('admins')->user()->zip_code}}" type="text" name="zip_code" id="zip_code">
                                            <span class="input-group-addon"><i class="fa fa-code "></i></span>
                                        </div>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">Street</label>
                                        <div class="input-group">
                                            <input class="form-control" value="{{Auth::guard('admins')->user()->stree1}}" type="text" name="street1" id="street1">
                                            <span class="input-group-addon"><i class="fa fa-street-view "></i></span>
                                        </div>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-4">
                                        <label class="label">Country</label>
                                        <div class="input-group">
                                            <input class="form-control"  value="{{Auth::guard('admins')->user()->country}}" type="text" name="country" id="country">
                                            <span class="input-group-addon"><i class="fa fa-street-view "></i></span>
                                        </div>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">Province</label>
                                        <div class="input-group">
                                            <input class="form-control" value="{{Auth::guard('admins')->user()->province}}" type="text" name="province" id="province">
                                            <span class="input-group-addon"><i class="fa fa-street-view "></i></span>
                                        </div>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">Tax Id</label>
                                        <div class="input-group">
                                            <input class="form-control"  value="{{Auth::guard('admins')->user()->tax_id}}" type="text" name="tax_id" id="tax_id">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch "></i></span>
                                        </div>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-4">
                                        <label class="label">Websites</label>
                                        <div class="input-group">
                                            <input class="form-control" value="{{Auth::guard('admins')->user()->website}}" type="text" name="website" id="website">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch "></i></span>
                                        </div>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">registration number</label>
                                        <div class="input-group">
                                            <input class="form-control"  value="{{Auth::guard('admins')->user()->registration_number}}" type="text" name="registration_number" id="registration_number">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch "></i></span>
                                        </div>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">Noted</label>
                                        <div class="input-group">
                                            <input class="form-control" value="{{Auth::guard('admins')->user()->note}}" type="text" name="note" id="note">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch "></i></span>
                                        </div>
                                    </section>
                                </div>

                                <section>
                                    <label class="label">Company Profiles *</label>
                                    <label class="input">
                                        <textarea class="form-control" id="company_profile" name="company_profile" rows="10" cols="163">{{Auth::guard('admins')->user()->company_profile}}</textarea>
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
                                                <input  id="phone" value="{{Auth::guard('admins')->user()->phone}}" type="text" name="phone" class="form-control" data-mask="(999) 999-9999" data-mask-placeholder= "X">
                                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            </div>
                                            <p class="note">
                                                Data format (XXX) XXX-XXXX
                                            </p>
                                        </div>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">fax *</label>
                                        <div class="input-group">
                                            <input class="form-control"  value="{{Auth::guard('admins')->user()->fax}}" type="text" name="fax" id="fax">
                                            <span class="input-group-addon"><i class="fa fa-fax"></i></span>
                                        </div>
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
                                    <div class="input-group">
                                        <input class="form-control"  value="" type="file" name="company_logo" id="company_logo">
                                        <span class="input-group-addon"><i class="fa fa-file "></i></span>
                                    </div>
                                </section>
                                <section>
                                    <img class="img-circle" src="{{asset('/uploaded/companyLogo/'.Auth::guard('admins')->user()->company_logo)}}" width="100px" height="100px" alt="">
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
      <script src="{{ asset('/js/hr/company.js') }}"></script>
      <script>
          $(document).ready(function () {
              $('.job_description').summernote({
                  height : 180,
                  focus : false,
                  tabsize : 2
              });
              $('.alert-success').fadeOut(5000);
              $('[data-toggle=confirmation]').confirmation({
                  rootSelector: '[data-toggle=confirmation]',
                  onConfirm: function (event, element) {
                      element.closest('form').submit();

                  }
              });
          });
      </script>
@endsection