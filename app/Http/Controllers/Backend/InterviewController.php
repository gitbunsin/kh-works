<?php

namespace App\Http\Controllers\Backend;
use App\CandiateHistory;
use App\Model\Candidate;
use App\Model\candidate_history;
use App\Model\candidate_vacancy;
use \App\Model\Employee;
use App\Http\Controllers\Controller;

use App\Interview;
use App\Model\JobCandidateHistory;
use App\Model\JobCandidateVacancy;
use App\Model\JobInterview;
use App\Model\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class InterviewController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

        $this->middleware('isAdmin');

    }
    public function index()
    {

        $this->shareMenu();
        $Interview = \App\Model\interview::with(['candidate','CandidateVacancy'])->get();
//        dd($Interview);
        return view('backend.HRIS.Recruitment.Interview.index',compact('Interview'));
    }
    public function UpdateCandidateInterviewDate(Request $request,$id)
    {
//         dd($request->all());
        $interview = \App\Model\interview::findOrFail($id);
        $interview->interview_date = $request->value;
        $interview->save();

        return response()->json(["success"=>"done","id"=>$request->value]);

    }
    public function UpdateCandidateInterviewTime(Request $request,$id)
    {
//         dd($request->all());
        $interview = \App\Model\interview::findOrFail($id);
        $interview->interview_time = $request->value;
        $interview->save();

        return response()->json(["success"=>"done","id"=>$request->value]);

    }

     public function UpdateCandidateInterviewNote(Request $request,$id)
    {
//         dd($request->all());
        $interview = \App\Model\interview::findOrFail($id);
        $interview->note = $request->value;
        $interview->save();

        return response()->json(["success"=>"done","id"=>$request->value]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public  function CandidateInterviewPass($id)
    {
//        dd($id);
        $this->shareMenu();
        $Interview = \App\Model\interview::with(['candidate','CandidateVacancy'])->where('id',$id)->first();
//        dd($Interview);
        $Vacancy = Vacancy::where('id',$Interview->CandidateVacancy->vacancy_id)->first();
//        dd($Vacancy->name);
//        dd($Vacancy->hiring_manager_id);
        return view('backend.HRIS.Recruitment.Interview.pass',compact('Interview','Vacancy'));
    }


    public function UpdateCandidateInterviewPass($candidate_id,$vacancy_id)
    {
//        dd($candidate_id, $vacancy_id);
        $candidate_vacancy =   candidate_vacancy::where('candidate_id',"=",$candidate_id)->where('vacancy_id',"=",$vacancy_id)->first();
        $candidate_vacancy->status = "INTERVIEW PASS";
        $candidate_vacancy->save();

//        $candidate= Candidate::find($id);
//        $candidate->vacancies()->updateExistingPivot($candidate,array('status'=>'INTERVIEW PASS','applied_date'=>carbon::now()));

        return redirect('/administration/interview')->with('success','Candidate has been became the Interview Pass!');

    }

    public function CandidateInterviewFail($id){

        $this->shareMenu();
        $InterviewFails = \App\Model\interview::with(['candidate','CandidateVacancy'])->where('id',$id)->first();
        $Vacancy = Vacancy::where('id',$InterviewFails->CandidateVacancy->vacancy_id)->first();
        return view('backend.HRIS.Recruitment.Interview.fail',compact('InterviewFails','Vacancy'));
    }

    public function UpdateCandidateInterviewFail($candidate_id,$vacancy_id){

        $candidate_vacancy =   candidate_vacancy::where('candidate_id',"=",$candidate_id)->where('vacancy_id',"=",$vacancy_id)->first();
        $candidate_vacancy->status = "INTERVIEW FAIL";
        $candidate_vacancy->save();

        $candidate_history = new candidate_history();
        $candidate_history->candidate_id = $candidate_id;
        $candidate_history->vacancy_id = $vacancy_id;
        $candidate_history->performed_date = carbon::now();
        $candidate_history->note = input::get('note');
        $candidate_history->save();

//        $candidate= Candidate::find($id);
//        $candidate->vacancies()->updateExistingPivot($candidate,array('status'=>'INTERVIEW PASS','applied_date'=>carbon::now()));

        return redirect('/administration/interview')->with('success','Candidate has been became the Interview Pass!');
    }


    public function CandidateOfferJob($id){
        //dd($id);
        $this->shareMenu();
        $CandidateJobOffer = \App\Model\interview::with(['candidate','CandidateVacancy'])->where('id',$id)->first();
        $Vacancy = Vacancy::where('id',$CandidateJobOffer->CandidateVacancy->vacancy_id)->first();
        return view('backend.HRIS.Recruitment.Interview.offer',compact('CandidateJobOffer','Vacancy'));
    }

    public function UpdateCandidateOfferJob($candidate_id,$vacancy_id)
    {
        $candidate_vacancy =   candidate_vacancy::where('candidate_id',"=",$candidate_id)->where('vacancy_id',"=",$vacancy_id)->first();
        $candidate_vacancy->status = "OFFER  JOB";
        $candidate_vacancy->save();

        $candidate_history = new candidate_history();
        $candidate_history->candidate_id = $candidate_id;
        $candidate_history->vacancy_id = $vacancy_id;
        $candidate_history->performed_date = carbon::now();
        $candidate_history->note = input::get('note');
        $candidate_history->save();

       // dd($id);
//        $candidate= Candidate::find($id);
//        $candidate->vacancies()->updateExistingPivot($candidate,array('status'=>'OFFER  JOB','applied_date'=>carbon::now()));
        return redirect('/administration/interview')->with('success','Candidate has been became the Job Offer!');

    }


    public function CandidateDeclineJob($id)
    {
        $this->shareMenu();
        $CandidateDeclineJob = \App\Model\interview::with(['candidate','CandidateVacancy'])->where('id',$id)->first();
        $Vacancy = Vacancy::where('id',$CandidateDeclineJob->CandidateVacancy->vacancy_id)->first();

        return view('backend.HRIS.Recruitment.Interview.decline',compact('CandidateDeclineJob','Vacancy'));
    }

    public function UpdateCandidateDeclineJob($candidate_id,$vacancy_id)
    {

        $candidate_vacancy =   candidate_vacancy::where('candidate_id',"=",$candidate_id)->where('vacancy_id',"=",$vacancy_id)->first();
        $candidate_vacancy->status = "OFFER  DECLINED";
        $candidate_vacancy->save();

        $candidate_history = new candidate_history();
        $candidate_history->candidate_id = $candidate_id;
        $candidate_history->vacancy_id = $vacancy_id;
        $candidate_history->performed_date = carbon::now();
        $candidate_history->note = input::get('note');
        $candidate_history->save();
//        $candidate= Candidate::find($id);
//        $candidate->vacancies()->updateExistingPivot($candidate,array('status'=>'OFFER  DECLINED','applied_date'=>carbon::now()));
        return redirect('/administration/interview')->with('success','Candidate has been became the Offer Declined!');

    }



    public function CandidateHireJob($id){
        $this->shareMenu();
        $CandidateHireJob = \App\Model\interview::with(['candidate','CandidateVacancy'])->where('id',$id)->first();
        $Vacancy = Vacancy::where('id',$CandidateHireJob->CandidateVacancy->vacancy_id)->first();

        return view('backend.HRIS.Recruitment.Interview.hire',compact('CandidateHireJob','Vacancy'));

    }

    public function UpdateCandidateHireJob($candidate_id,$vacancy_id)
    {

//        $candidate= Candidate::find($id);
//        $candidate->vacancies()->updateExistingPivot($candidate,array('status'=>'HIRED','applied_date'=>carbon::now()));
        $candidate_vacancy =   candidate_vacancy::where('candidate_id',"=",$candidate_id)->where('vacancy_id',"=",$vacancy_id)->first();
        $candidate_vacancy->status = "HIRED";
        $candidate_vacancy->save();
        $candidate_history = new candidate_history();
        $candidate_history->candidate_id = $candidate_id;
        $candidate_history->vacancy_id = $vacancy_id;
        $candidate_history->performed_date = carbon::now();
        $candidate_history->note = input::get('note');
        $candidate_history->save();

        $candidate = Candidate::where('id',$candidate_id)->first();
//        $vacancy = Vacancy::where('id',$vacancy_id)->first();
//        dd($candidate,$vacancy);
        $employee = new Employee();
        $employee->emp_firstname = $candidate->first_name;
        $employee->emp_middle_name = $candidate->middle_name;
        $employee->emp_lastname = $candidate->last_name;
        $employee->emp_work_email = $candidate->email;
        $employee->emp_mobile = $candidate->contact_number;
        $employee->save();

        $remove_interview=  \App\Model\interview::where('candidate_id',"=",$candidate_id)->first();
        $remove_interview->delete();

        return redirect('/administration/employee')->with('success','Candidate has been became the employees!');

    }

//
//    public function CandidateReject($id)
//    {
//        $this->shareMenu();
//        $CandidateReject = DB::table('job_interviews as i')
//            ->join('job_interview_interviewers as ii','ii.interview_id','=','i.id')
//            ->join('employees as e','e.emp_number','=','ii.interviewer_id')
//            ->join('job_candidates as c','i.candidate_id','=','c.id')
//            ->join('job_candidate_vacancies as cv','i.candidate_vacancy_id','=','cv.id')
//            ->join('job_vacancies as v','cv.vacancy_id','=','v.id')
//            ->select('i.*','ii.*','e.*','c.*','cv.*','cv.status as candidate_application_status','v.*')
//            ->first();
//
//        return view('backend.HRIS.Recruitment.Interview.reject',compact('CandidateReject'));
//    }

    public function CandidateReject($id)
    {

        $this->shareMenu();
        $CandidateReject= \App\Model\interview::with(['candidate','CandidateVacancy'])->where('id',$id)->first();
        $Vacancy = Vacancy::where('id',$CandidateReject->CandidateVacancy->vacancy_id)->first();

        return view('backend.HRIS.Recruitment.Interview.reject',compact('CandidateReject','Vacancy'));
    }


    public function UpdateCandidateReject($candidate_id,$vacancy_id)
    {

        $candidate_vacancy =   candidate_vacancy::where('candidate_id',"=",$candidate_id)->where('vacancy_id',"=",$vacancy_id)->first();
        $candidate_vacancy->status = "REJECT";
        $candidate_vacancy->save();
        $candidate_history = new candidate_history();
        $candidate_history->candidate_id = $candidate_id;
        $candidate_history->vacancy_id = $vacancy_id;
        $candidate_history->performed_date = carbon::now();
        $candidate_history->note = input::get('note');
        $candidate_history->save();

        $remove_interview=  \App\Model\interview::where('candidate_id',"=",$candidate_id)->first();
        $remove_interview->delete();
       // dd('hello');
//        $JobCandidateVacancy = JobCandidateVacancy::findOrFail($id);
//        $JobCandidateVacancy->status = "Reject";
//        $JobCandidateVacancy->save();
        return redirect('/administration/interview')->with('success','Candidate has been Rejected!');
    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
