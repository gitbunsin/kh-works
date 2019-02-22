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
                        <h2> Add OAuth Client</h2>
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
                            <form id="frmAuthClient" method="POST" enctype="multipart/form-data" action="{{url('administration/open-id-provider/'.$OpenIDProvider->id)}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input name="_method" type="hidden" value="PATCH">
                                <fieldset>
                                    <section>
                                        <label class="label"> Type</label>
                                        <label class="select">
                                            <select name="TypeID" id="TypeID" class="TypeID">
                                                <option value="">-- select type --</option>
                                                <option value="OpenID"> OpenID</option>
                                                <option value="GooglePlus">Google +</option>
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> Name *</label>
                                            <label class="input">
                                                <input value="{{$OpenIDProvider->provider_name}}" type="text" name="Name" id="name">
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Redirect URI</label>
                                            <label class="input">
                                                <input value="{{$OpenIDProvider->provider_url}}" type="text" name="Uri" id="Uri">
                                            </label>
                                        </section>

                                    </div>

                                    <div class="row" id="ClientShow">
                                        <section class="col col-4">
                                            <label class="label"> Client ID *</label>
                                            <label class="input">
                                                <input type="text" name="ID" id="ID">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label"> Client Secret *</label>
                                            <label class="input">
                                                <input type="text" name="ClientSecret" id="ClientSecret">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label"> Developer Key *</label>
                                            <label class="input">
                                                <input type="text" name="DeveloperKey" id="DeveloperKey">
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
        $('#ClientShow').hide();
        $('#TypeID').on('change',function () {
            $TypeVal =  $('#TypeID').val();
            if($TypeVal == "OpenID"){
                $('#ClientShow').hide();
            }else if($TypeVal =="GooglePlus"){
                $('#ClientShow').show({duration: 800,});
            }else{
                $('#ClientShow').hide();
            }
        });
        var $loginForm = $("#frmAuthClient").validate({
            // Rules for form validation
            rules : {
                ID : {
                    required : true
                },
                Secret : {
                    required: true
                },
                Uri : {
                    required : true
                }
            },
            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });
    </script>
@endsection