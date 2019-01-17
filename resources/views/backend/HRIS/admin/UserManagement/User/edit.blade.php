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
                        <h2> User</h2>
                    </header>
                    <!-- widget div-->
                    <div>
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                        </div>
                        <div class="widget-body no-padding">
                            <form id="frmUser" method="POST" enctype="multipart/form-data" action="{{url('administration/user/'.$u->id)}}" class="smart-form">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label">Username</label>
                                            <label class="input">
                                                <input value="{{$u->name}}" class="form-control" type="text" name="username" id="username">
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label">Email</label>
                                            <label class="input">
                                                <input value="{{$u->email}}" class="form-control" type="text" name="email" id="email">
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label">Password</label>
                                            <label class="input">
                                                <input placeholder="Old Password"  class="form-control" type="password" name="password" id="password">
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label">Confirm Password</label>
                                            <label class="input">
                                                <input class="form-control" type="password" name="confirm_password" id="confirm_password">
                                            </label>
                                        </section>
                                    </div>
                                    <section>
                                        <label class="label"> Status</label>
                                        <label class="select">
                                            <select name="status" id="status" class="required">
                                                <option value="">Choose Status</option>
                                                <option value="1" {{$u->verified ==1 ? 'selected="selected"' : ''}}>Enable</option>
                                                <option value="2" {{$u->verified ==0 ? 'selected="selected"' : ''}}>Disabled</option>
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
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
        $(document).ready(function() {
            var $loginForm = $("#frmUser").validate({
                // Rules for form validation
                rules : {
                    username : {
                        required : true
                    },
                    email:{
                        required : true
                    },
                    password : {
                        required : true,
                        minlength : 6
                    },
                    confirm_password : {
                        required : true,
                        minlength : 6,
                        equalTo : "#password"
                    },
                    status : {
                        required : true
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