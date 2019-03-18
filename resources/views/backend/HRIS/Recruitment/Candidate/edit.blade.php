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
                        <h2>Edit Candidate</h2>
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

                            <form id="CandidateFrm" method="POST" action="{{ url('administration/candidate') }}" class="smart-form" enctype="multipart/form-data" >
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="PATCH">
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">First Name</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-user"></i>
                                                <input class="form-control"  value="{{$candidate->first_name}}" type="text" maxlength="20" name="first_name" id="first_name">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available name</b> </label>
                                            </label>
                                        </section >
                                        <section class="col col-4">
                                            <label class="label">last Name</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-user"></i>
                                                <input class="form-control" value="{{$candidate->last_name}}" type="text"  id="last_name" name="last_name">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available name</b> </label>
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Middle Name</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-user"></i>
                                                <input class="form-control" value="{{$candidate->middle_name}}" type="text" maxlength="20" name="middle_name" id="middle_name">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available name</b> </label>

                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">Email</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-user"></i>
                                                <input class="form-control" value="{{$candidate->email}}" type="text" id="email" name="email">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available name</b> </label>

                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">contact Number</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-user"></i>
                                                <input class="form-control" value="{{$candidate->contact_number}}" name="contact_number" id="contact_number" type="text" list="list">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available name</b> </label>

                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">KeyWord</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-user"></i>
                                                <input class="form-control" name="keywords" id="keywords" value="{{$candidate->keywords}}" placeholder="Enter comma separated words..." type="text" maxlength="10">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available name</b> </label>

                                            </label>
                                        </section>

                                    </div>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label"> Date </label>
                                            <label class="input">
                                                <i class="icon-append fa fa-calendar"></i>
                                                <input  type="text" id="date_of_application" name="date_of_application" placeholder="Request activation on" class="form-control">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Resume</label>
                                            <div class="input input-file">
                                                <span class="button"><input class="form-control" id="file2" type="file" name="cv_file_id" onchange="this.parentNode.nextSibling.value = this.value">Browse</span><input class="form-control" type="text"  placeholder="Include some files" readonly="">
                                            </div>
                                            <div class="note">
                                                <strong>Note:</strong> Accepts .docx, .doc, .odt, .pdf, .rtf, .txt up to 1MB
                                            </div>
                                        </section>
                                    </div>
                                    <section>
                                        <label class="label">Comment</label>
                                        <label class="textarea">
                                            <textarea  rows="6" class="custom-scroll form-control" id="comments" name="comments">{{$candidate->comment}}</textarea>
                                        </label>
                                        <div class="note">
                                            <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                        </div>
                                    </section>
                                </fieldset>
                                <footer>
                                    <input class="btn btn-primary" type="button" id="BtnCandidate" name="BtnCandidate" value=""/>
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
    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2> Candidate's History</h2>
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
                            <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th> Performed Date</th>
                                    <th> Description</th>
                                    <th> Details</th>
                                </tr>
                                </thead>
                                <tbody id="products-list" name="products-list">
                                @foreach($CandidateHistory as $CandidateHistories)
                                    <tr id="job_id{{$CandidateHistories->id}}">
                                        <td>{{$CandidateHistories->performed_by}}</td>
                                        <td></td>
                                        <td>
                                            <form action="{{ url('/administration/jobs-title', ['id' => $CandidateHistories->id]) }}" style="display:inline" method="post">
                                                <input type="hidden" name="_method" value="delete" />
                                                {!! csrf_field() !!}
                                                <a href="#" target="_blank" data-toggle="confirmation"  data-title="Are You Sure Delete?" class="">
                                                    <i class="glyphicon glyphicon-trash"  style="color:red;"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
@endsection
@section('script')

    <script>
         DisabledCandidateFrm();
         function DisabledCandidateFrm() {

             $('#first_name').prop('disabled',true);
             $('#last_name').prop('disabled',true);
             $('#middle_name').prop('disabled',true);
             $('#email').prop('disabled',true);
             $('#contact_number').prop('disabled',true);
             $('#keywords').prop('disabled',true);
             $('#comments').prop('disabled',true);
             $('#date_of_application').prop('disabled',true);
             $('#file2').prop('disabled',true);

        }
         function  EnableCandiateForm(){

             $('#first_name').prop('disabled',false);
             $('#last_name').prop('disabled',false);
             $('#middle_name').prop('disabled',false);
             $('#email').prop('disabled',false);
             $('#contact_number').prop('disabled',false);
             $('#keywords').prop('disabled',false);
             $('#comments').prop('disabled',false);
             $('#date_of_application').prop('disabled',false);
             $('#file2').prop('disabled',false);
         }

         $(document).ready(function () {
             DisabledCandidateFrm();
             var edit = $('#BtnCandidate').val('Edit');
             // alert(emp_number);
             $('#BtnCandidate').click(function(e){
                 $isEdit = $('#BtnCandidate').val();
                 if($isEdit =="Edit"){
                     EnableCandiateForm();
                     var Save = $('#BtnCandidate').val('Save');
                 }else{
                     $isSave = $('#BtnCandidate').val();
                     var emp_number = $('#emp_number').val();
                     // alert($isSave);
                     if($isSave == "Save") {
                         // alert('ok');
                         $.ajaxSetup({
                             headers: {
                                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                             }
                         });
                         $('#CandidateFrm').submit();
                         e.preventDefault();
                     }
                 }

             });
         });

        var $loginForm = $("#validate").validate({
            // Rules for form validation
            rules : {
                first_name : {
                    required : true
                },
                last_name : {
                    required : true,
                    maxlength : 20
                },
                middle_name : {
                    required:true
                },
                email:{
                    required : true,
                    email : true
                }
            },
            // Messages for form validation
            messages : {
                first_name : {
                    required : 'Please enter first name'
                },
                last_name : {
                    required: 'Please enter your last name'
                },
                middle_name : {
                    required:'Pleae inter middle name'
                },
                email :{
                    required:'please enter correct email'
                }
            },

            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });
        // START AND FINISH DATE
        $('#date_of_application').datepicker({
            dateFormat: 'yy-mm-dd',
            prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>',
            onSelect: function (selectedDate) {
                $('#finishdate').datepicker('option', 'minDate', selectedDate);
            }
        });

    </script>
    @endsection