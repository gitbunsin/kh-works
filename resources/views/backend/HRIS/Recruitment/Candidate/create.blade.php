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
                                            <label class="label">Full Name</label>
                                            <label class="input">
                                                <input type="text" maxlength="20" id="full_name" name="full_name">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Email</label>
                                            <label class="input">
                                                <input type="text" id="email" name="email">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            @php
                                                use Illuminate\Support\Facades\DB;$c_id = Auth::guard('admins')->user()->id;
                                                $j = DB::table('kh_job_vacancy as v')
                                                        ->select('v.*','t.*','v.id as j_id')
                                                        ->join('tbl_job_title as t','v.job_title_code','=','t.id')
                                                        ->get();
                                            @endphp

                                            <label class="label">Job Title</label>
                                            <label class="select">
                                                <select name="job_title" id="job_title" class="required">
                                                    <option value="">-- select --</option>
                                                    @foreach($j as $js)
                                                        <option value="{{$js->id}}">{{$js->job_title}}</option>
                                                        <input type="hidden" id="vacancy_id" name="vacancy_id" value="{{$js->j_id}}"/>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">Contact Number</label>
                                            <label class="input">
                                                <input name="contact_number" id="contact_number" type="text" list="list">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">Key Words</label>
                                            <label class="input">
                                                <input name="keyword" id="keyword" placeholder="Enter comma separated words..." type="text" maxlength="10">
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label"> Date </label>
                                            <label class="input">
                                                <i class="icon-append fa fa-calendar"></i>
                                                <input type="text" name="date-of-application" placeholder="Request activation on" class="datepicker">
                                            </label>
                                        </section>
                                    </div>
                                    <div>
                                        <section>
                                            <label class="label">Resume</label>
                                            <div class="input input-file">
                                                <span class="button">
                                                    <input id="file2" type="file" name="cv_file_id" onchange="this.parentNode.nextSibling.value = this.value">Browse</span><input type="text"  placeholder="Include some files" readonly="">
                                            </div>
                                            <div class="note">
                                                <strong>Note:</strong> Accepts .docx, .doc, .odt, .pdf, .rtf, .txt up to 1MB
                                            </div>
                                        </section>
                                    </div>

                                    <section>
                                        <label class="label">Comment</label>
                                        <label class="textarea">
                                            <textarea rows="6" class="custom-scroll"></textarea>
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
                    job_title : {
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
                // Do not change code below
                errorPlacement : function(error, element) {
                    error.insertAfter(element.parent());
                }
            });
        });

    </script>

@endsection
