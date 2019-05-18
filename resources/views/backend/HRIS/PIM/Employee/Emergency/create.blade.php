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
                        <h2> Emergency Contact</h2>

                    </header>
                    <!-- widget div-->
                    <div>
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                        </div>
                        <div class="widget-body no-padding">
                            <form id="frmEmergency" method="POST"  action="{{url('administration/employee-emergency-contact')}}" class="smart-form" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label">Name</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-joomla"></i>
                                                <input type="text" name="name" id="name">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available name</b> </label>
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Relationship</label>
                                            <label class="select">
                                                <select class="form-control" name="relationship_id" id="relationship_id">
                                                    @php $relationship = array('parents','fathers','son'); @endphp
                                                        <option value=""> -- select relationship --</option>
                                                    @foreach($relationship as $relationships)
                                                        <option value="{{$relationships}}">{{$relationships}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-6">
                                            <div class="form-group">
                                                <label class="label">Home Telephone</label>
                                                <div class="input-group">
                                                    <input  value="" id="home_telephone"  type="text" name="home_telephone" class="form-control" data-mask="(999) 999-9999" data-mask-placeholder= "X">
                                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                </div>
                                                <p class="note">
                                                    Data format (XXX) XXX-XXXX
                                                </p>
                                            </div>
                                        </section>
                                        <section>
                                            <section class="col col-6">
                                                <div class="form-group">
                                                    <label class="label">Mobile </label>
                                                    <div class="input-group">
                                                        <input  id="mobile" value="" type="text" name="mobile" class="form-control" data-mask="(999) 999-9999" data-mask-placeholder= "X">
                                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                    </div>
                                                    <p class="note">
                                                        Data format (XXX) XXX-XXXX
                                                    </p>
                                                </div>
                                            </section>
                                        </section>
                                    </div>
                                        <section>
                                            <div class="form-group">
                                                <label class="label">Work Telephone </label>
                                                <div class="input-group">
                                                    <input  id="work_telephone" value="" type="text" name="work_telephone" class="form-control" data-mask="(999) 999-9999" data-mask-placeholder= "X">
                                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                </div>
                                                <p class="note">
                                                    Data format (XXX) XXX-XXXX
                                                </p>
                                            </div>
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
    <script>
        $(document).ready(function() {
            var $loginForm = $("#frmEmergency").validate({
                // Rules for form validation
                rules : {
                    name : {
                        required : true
                    },
                    relationship_id : {
                        required : true
                    },
                    mobile :{
                        required:true
                    },
                    home_telephone :{
                        required:true
                    },
                    work_telephone : {
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