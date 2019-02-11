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
                        <h2> Assigned Membership</h2>
                    </header>
                    <!-- widget div-->
                    <div>
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                        </div>
                        <div class="widget-body no-padding">
                            <form id="frmMembership" method="POST"  action="{{url('administration/view-membership/'.$m->id)}}" class="smart-form" enctype="multipart/form-data">
                                <input name="_method" type="hidden" value="PATCH">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> Membership </label>
                                            <label class="select">
                                                <select name="membership_id" id="membership_id">
                                                    <option value="">-- select --</option>
                                                    @php $membership = \App\Membership::all(); @endphp
                                                    @foreach($membership as $memberships)
                                                        <option value="{{$memberships->id}}" {{$memberships->id == $m->membership_code ? 'selected == "selected " ':''}}>{{$memberships->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Subscription Paid By </label>
                                            <label class="select">
                                                <select name="subscription" id="subscription">
                                                    <option value="">-- select --</option>
                                                    @if($m->ememb_subscript_ownership == "1")
                                                    <option value="1" selected> Company </option>
                                                    <option value="2"> Individual </option>
                                                    @else
                                                        <option value="1"> Company </option>
                                                        <option value="2" selected> Individual </option>
                                                    @endif
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> Subscription Amount</label>
                                            <label class="input">
                                                <input value="{{$m->ememb_subscript_amount}}" type="number" name="sub_amount" id="sub_amount">
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Currency </label>
                                            <label class="select">
                                                <select name="currency_id" id="currency_id">
                                                    <option value="">-- select --</option>
                                                    @php $currency = \App\Model\Backend\Currency::all(); @endphp
                                                    @foreach($currency as $currencys)
                                                        <option value="{{$currencys->id}}" {{$currencys->id == $m->ememb_subs_crrency ? 'selected == "selected" ' : ''}}>{{$currencys->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> Subscription Commence Date </label>
                                            <label class="input">
                                                <i class="icon-append fa fa-calendar"></i>
                                                <input value="{{$m->ememb_commence_date}}" type="text" id="ememb_commence_date" name="ememb_commence_date" class="datepicker">
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label">  Subscription Renewal Date </label>
                                            <label class="input">
                                                <i class="icon-append fa fa-calendar"></i>
                                                <input value="{{$m->ememb_renewal_date}}" type="text" id="ememb_renewal_date" name="ememb_renewal_date" class="datepicker">
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
    <script>
        $(document).ready(function() {
            var $loginForm = $("#frmMembership").validate({
                // Rules for form validation
                rules : {
                    membership_id : {
                        required : true
                    },
                    subscription : {
                        required: true
                    }
                },
                // Do not change code below
                errorPlacement : function(error, element) {
                    error.insertAfter(element.parent());
                }
            });
        });
    </script>

@endsection