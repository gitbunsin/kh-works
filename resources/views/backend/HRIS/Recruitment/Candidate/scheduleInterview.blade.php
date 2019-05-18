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
                        <h2> Schedule Interview</h2>
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
                            <form id="frmJobTitle" method="POST" enctype="multipart/form-data" action="{{url('administration/update-Schedule-Interview/'.$JobCandidateShortlist->id.'/'.$JobCandidateShortlist->vacancies[0]->id)}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label">Candidate Name</label>
                                            <label class="input"> <i class="icon-append fa fa-joomla"></i>
                                                <input value="{{$JobCandidateShortlist->first_name}} {{$JobCandidateShortlist->last_name}}" class="form-control" disabled type="text" name="job_titles" placeholder="Candidate Name">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available Job name</b> </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label">Vacancy Name</label>
                                            <label class="input"> <i class="icon-append fa fa-joomla"></i>
                                                <input value="{{$JobCandidateShortlist->vacancies[0]->name}}" class="form-control" disabled type="text" name="vacancy_name" placeholder="Vacancy Name">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available Job name</b> </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label">Hiring Manager</label>
                                            <label class="input"> <i class="icon-append fa fa-joomla"></i>
                                                @php $employee = \App\Model\Employee::where('emp_number',$JobCandidateShortlist->vacancies[0]->hiring_manager_id)->first(); @endphp
                                                <input value="{{$employee->emp_lastname}}{{$employee->emp_firstname}}" class="form-control" disabled type="text" name="job_titles" placeholder="Hiring Manager">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available Job name</b> </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label">Current Status</label>
                                            <label class="input"> <i class="icon-append fa fa-joomla"></i>
                                                <input value="{{$JobCandidateShortlist->vacancies[0]->pivot->status}}" class="form-control" disabled type="text" name="job_titles" placeholder="Current Status">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available Job name</b> </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                         <section class="col col-6">
                                            <label class="label">Interview Title</label>
                                            <label class="input"> <i class="icon-append fa fa-joomla"></i>
                                                <input value="" class="form-control"  type="text" name="interview_name" placeholder="Interview Name">
                                                <b class="tooltip tooltip-bottom-right">Needed to enter available  interview Title</b> </label>
                                        </section>
                                        <section class="col col-6">
                                               <label class="label">Interview Name</label>
                                                <select name="interview_id[]" multiple="" style="width:100%" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                                   @php $employee =  \App\Model\Employee::all(); @endphp
                                                    <optgroup label="">
                                                        @foreach($employee as $employees)
                                                        <option value="{{$employees->emp_number}}">{{$employees->emp_lastname}}{{$employees->emp_firstname}}</option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label">Time</label>
                                            <div class="input-group">
                                                <input class="form-control" name="interview_time" id="timepicker" type="text" placeholder="Select time">
                                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                            </div>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label">  Date</label>
                                            <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                                <input type="text" name="interview_date" id="interview_date" placeholder="">
                                            </label>
                                        </section>
                                    </div>
                                    <section>
                                        <label class="label">Noted</label>
                                        <label class="textarea">
                                            <textarea  rows="8" id="note" name="note" class="custom-scroll form-control"></textarea>
                                        </label>
                                        <div class="note">
                                            <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                        </div>
                                    </section>
                                </fieldset>
                                <footer>
                                    <button type="submit" class="btn btn-danger">Schedule Interview</button>
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
        // START AND FINISH DATE
        $('#interview_date').datepicker({
            dateFormat: 'yy-mm-dd',
            prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>',
        });

$('#timepicker').timepicker();
var $loginForm = $("#frmJobTitle").validate({
    // Rules for form validation
    rules : {
        job_titles : {
            required : true
        },
    },
    // Do not change code below
    errorPlacement : function(error, element) {
        error.insertAfter(element.parent());
    }
});
// START AND FINISH DATE

</script>
@endsection