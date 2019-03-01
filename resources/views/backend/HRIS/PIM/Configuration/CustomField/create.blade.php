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
                        <h2>Add Termination Reason</h2>
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
                            <form id="frmCustomField" method="POST" enctype="multipart/form-data" action="{{url('administration/employee-kpi')}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> Field Name </label>
                                            <label class="input">
                                                <input type="text" name="fieldname" id="fieldname"/>
                                            </label>
                                            <div class="note">
                                                <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                            </div>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Screen *</label>
                                            <label class="select ">
                                                <select name="screen" id="screen" class="valid">
                                                    @php $c = \App\JobTitle::all(); @endphp
                                                    <option value="">-- select --</option>
                                                    @foreach($c as $cs)
                                                        <option value="{{$cs->id}}">{{$cs->job_titles}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> Type *</label>
                                            <label class="select">
                                                <select name="type" id="type" class="valid">
                                                    <option value="">-- select --</option>
                                                    <option value="Text or Number">Text or Number</option>
                                                    <option value="Drop Down"> Drop Down</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <div class="optional" id="optional">
                                            <section class="col col-6">
                                                <label class="label"> Select Option</label>
                                                <label class="input">
                                                    <input type="text" name="option" id="option"/>
                                                </label>
                                                <div class="note">
                                                    <strong>Note:</strong> Enter allowed options separated by commas
                                                </div>
                                            </section>
                                        </div>
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
                $('#optional').hide();
                $('#type').on('change',function () {
                   var type = $('#type').val();
                   if(type == "Text or Number"){
                       $('#optional').hide();
                   }else if(type == "Drop Down"){
                       $('#optional').show({duration : 800,});
                   }else{
                       $('#optional').hide();
                   }
                });

            $(document).ready(function() {

                //custom rule method
                $.validator.addMethod("isBiggerThanMinSalary", function (value, element, arg) {
                    var maxSalary = $("#max_id").val();
                    return parseInt(maxSalary) > parseInt(value);
                }, "Minimum Salary must be smaller than Maximun Salary");
                var $loginForm = $("#frmCustomField").validate({
                    // Rules for form validation
                    rules : {
                        type : {
                            required : true
                        },
                        fieldname : {
                            required: true
                        },
                        screen : {
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