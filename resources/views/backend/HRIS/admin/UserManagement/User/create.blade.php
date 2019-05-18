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
                        <h2>Add User</h2>
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
                            <form id="smart-form-register" method="POST" enctype="multipart/form-data" action="{{url('administration/user')}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="user_id" value="{{Auth::guard('admins')->user()->id}}"/>
                                <fieldset>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label class="label">Employee Name</label>
                                                <div class="form-group">
                                                    <select name="employee_name"
                                                            id="employee_name"
                                                            style="width:100%" class="select2 select2-hidden-accessible"
                                                            tabindex="-1" aria-hidden="true">
                                                            <option value=""></option>
                                                            @php $tracker = \App\Model\Employee::all(); @endphp
                                                            @foreach($tracker as $trackers)
                                                                <option value="{{$trackers->emp_number}}">{{$trackers->emp_firstname}}{{$trackers->emp_middle_name}}{{$trackers->emp_firstname}}</option>
                                                            @endforeach
                                                    </select>
                                                    <div class="note">
                                                        <strong>Usage:</strong> Employee for login system
                                                    </div>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label class="label">Email</label>
                                                <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                                                    <input type="email" name="email" placeholder="Email address">
                                                    <b class="tooltip tooltip-bottom-right">Needed to verify your account</b> </label>
                                            </section>
                                        </div>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label">Password</label>
                                            <label class="input"> <i class="icon-append fa fa-lock"></i>
                                                <input type="password" name="password" placeholder="Password" id="password">
                                                <b class="tooltip tooltip-bottom-right">Don't forget your password</b> </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label">Confirm Password</label>
                                            <label class="input"> <i class="icon-append fa fa-lock"></i>
                                                <input type="password" name="passwordConfirm" placeholder="Confirm password">
                                                <b class="tooltip tooltip-bottom-right">Don't forget your password</b> </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> Role</label>
                                            <label class="select">
                                                @php $role = \App\Role::all(); @endphp
                                                <select name="role_id" id="role_id" class="required">
                                                   @foreach($role as $roles)
                                                        <option value="{{$roles->id}}">{{$roles->name}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="note">
                                                    <strong>Ess:</strong> Employee Role &  <strong> Admin </strong>is Admin role
                                                </div>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Status</label>
                                            <label class="select">
                                                @php $Status = array("0"=>"Disabled","1"=>"Enable") @endphp
                                                <select name="status" id="status" class="required">
                                                    @foreach($Status as $key => $Statuses)
                                                        <option value="{{$key}}">{{$Statuses}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
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
        var $registerForm = $("#smart-form-register").validate({

            // Rules for form validation
            rules : {
                employee_name : {
                    required : true
                },
                email : {
                    required : true,
                    email : true
                },
                password : {
                    required : true,
                    minlength : 6,
                    maxlength : 20
                },
                passwordConfirm : {
                    required : true,
                    minlength : 6,
                    maxlength : 20,
                    equalTo : '#password'
                },
            },

            // Messages for form validation
            messages : {
                login : {
                    required : 'Please enter your login'
                },
                email : {
                    required : 'Please enter your email address',
                    email : 'Please enter a VALID email address'
                },
                password : {
                    required : 'Please enter your password'
                },
                passwordConfirm : {
                    required : 'Please enter your password one more time',
                    equalTo : 'Please enter the same password as above'
                },
            },

            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });

    </script>
@endsection