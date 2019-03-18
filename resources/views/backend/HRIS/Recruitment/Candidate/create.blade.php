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
                        <h2>Add new Candidate</h2>
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
                            <form id="frmCandidate" method="POST" action="{{ url('administration/candidate') }}" class="smart-form" enctype="multipart/form-data" >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">First Name</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-user"></i>
                                                <input type="text" name="emp_firstname" placeholder="First Name">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available name</b> </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">First Name</label>
                                            <label class="input"> <i class="icon-append fa fa-user"></i>
                                                <input type="text" name="emp_middle_name" placeholder="Middle Name">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available name</b> </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">First Name</label>
                                            <label class="input"> <i class="icon-append fa fa-user"></i>
                                                <input type="text" name="emp_lastname" placeholder="Last Name">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available name</b> </label>
                                        </section>
                                    </div>
                                      <div class="row">
                                          <section class="col col-4">
                                              <label class="label">Job Vacancy</label>
                                              <label class="select">
                                                  <select name="vacancy_name" id="vacancy_name" class="required">
                                                      @php $JobVacancy = \App\Model\JobVacancy::all(); @endphp
                                                      <option value="">-- select --</option>
                                                      @foreach($JobVacancy as $JobVacancys)
                                                      <option value="{{$JobVacancys->id}}">{{$JobVacancys->name}}</option>
                                                      @endforeach
                                                  </select>
                                                  <i></i>
                                              </label>
                                          </section>
                                          <section class="col col-4">
                                              <label class="label">Contact No</label>
                                              <label class="input"> <i class="icon-append fa fa-sort-numeric-asc"></i>
                                                  <input type="number" name="contact_number" placeholder="Contact Number">
                                                  <b class="tooltip tooltip-bottom-right">Needed to enter available name</b> </label>
                                          </section>
                                          <section class="col col-4">
                                              <label class="label">Email</label>
                                              <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                                                  <input type="email" name="email" placeholder="Email address">
                                                  <b class="tooltip tooltip-bottom-right">Needed to verify your account</b> </label>
                                          </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label"> Date </label>
                                            <label class="input">
                                                <i class="icon-append fa fa-calendar"></i>
                                                <input type="text" id="date" name="date_of_application" placeholder="Request activation on" class="datepicker">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Resume</label>
                                            <div class="input input-file">
                                                <span class="button">
                                                    <input id="file2" type="file" name="cv_file_id" onchange="this.parentNode.nextSibling.value = this.value">Browse</span><input type="text"  placeholder="Include some files" readonly="">
                                            </div>
                                            <div class="note">
                                                <strong>Note:</strong> Accepts .docx, .doc, .odt, .pdf, .rtf, .txt up to 1MB
                                            </div>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Status</label>
                                            <label class="select">
                                                    <select name="candidateAddStatus" id="candidateAddStatus">
                                                        <option value=""> --  All --</option>
                                                        <option value="APPLICATION INITIATED">Application Initiated</option>
                                                        <option value="SHORTLISTED">Shortlisted</option>
                                                        <option value="INTERVIEW SCHEDULED">Interview Scheduled</option>
                                                        <option value="INTERVIEW PASSED">Interview Passed</option>
                                                        <option value="INTERVIEW FAILED">Interview Failed</option>
                                                        <option value="JOB OFFERED">Job Offered</option>
                                                        <option value="OFFER DECLINED">Offer Declined</option>
                                                        <option value="REJECTED">Rejected</option>
                                                        <option value="HIRED">Hired</option>
                                                    </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                    <section>
                                        <label class="label">Comment</label>
                                        <label class="textarea">
                                            <textarea name="comment" rows="6" class="custom-scroll"></textarea>
                                        </label>
                                        <div class="note">
                                            <strong>Note:</strong> height of the textarea depends on the rows attribute.
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
    <script type="text/javascript">
        $(document).ready(function() {
            var $loginForm = $("#frmCandidate").validate({
                // Rules for form validation
                rules : {
                    full_name : {
                        required : true
                    },
                    job_titles : {
                        required : true,
                        maxlength : 20
                    },
                    middle_name : {
                        required:true
                    },
                    email:{
                        required : true,
                        email : true
                    },
                    candidateAddStatus: {
                        required: true,
                    }
                },
                // Do not change code below
                errorPlacement : function(error, element) {
                    error.insertAfter(element.parent());
                }
            });
        });
        // START AND FINISH DATE
        $('#date').datepicker({
            dateFormat: 'yy-mm-dd',
            prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>',
            onSelect: function (selectedDate) {
                $('#finishdate').datepicker('option', 'minDate', selectedDate);
            }
        });

    </script>

@endsection
