<?php

namespace App\Http\Controllers\Backend;
use App\Model\Candidate;
use App\Model\candidate_attachment;
use App\Model\candidate_history;
use App\Model\candidate_vacancy;
use App\Model\Employee;
use App\Model\interview;
use App\Model\Vacancy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CandidateController extends BackendController
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
        $company_id = Auth::guard('admins')->user()->id;
        $JobCandidate = Candidate::with('vacancies')->get();
//        dd($JobCandidate);
//        dd($JobCandidate[]->);
        return view('backend.HRIS.Recruitment.Candidate.index',compact('JobCandidate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->shareMenu();
        return view('backend.HRIS.Recruitment.Candidate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $candidate = \App\Model\Candidate::create($request->all());
        $candidate->company()->associate(Auth::guard('admins')->user()->id);
        $candidate->save();
        $vacancy_id = $request->vacancy_name;
        $vacancy  = Vacancy::find($vacancy_id);
        // dd($vacancy);
//        $candidate->candidate_history()->attach(array('candidate_id'=>$candidate->id,'vacancy_id'=>$vacancy_id));
        $candidate->vacancies()->attach($vacancy,array('status'=>'APPLICATION INITIATED','applied_date'=>carbon::now()));
        $candidate_history = new candidate_history();
        $candidate_history->candidate_id = $candidate->id;
        $candidate_history->vacancy_id = $vacancy_id;
        $candidate_history->performed_date = carbon::now();
        $candidate_history->save();
//        $candidate->vacancies()->status = "APPLICATION INITIATED";

        //dd($request->all());
//        $Candidate = new JobCandidate();
//        $Candidate->first_name = $request->emp_firstname;
//        $Candidate->middle_name = $request->emp_middle_name;
//        $Candidate->last_name = $request->emp_lastname;
////        $Candidate->last_name= $request->email;
//        $Candidate->contact_number = $request->contact_number;
//        $Candidate->status = 1;
//        $Candidate->comment = $request->comment;
//        $Candidate->email = $request->email;
//        $Candidate->added_person = Auth::guard('admins')->user()->id;
//        $Candidate->company_id =Auth::guard('admins')->user()->id;
//        $Candidate->keyword = $request->keyword;
//        $Candidate->date_of_application = Carbon::parse($request->date_of_application)->format('Y-m-d');
//        $Candidate->save();
//        $Candidate_id = $Candidate->id;
       // dd($Candidate__id);
        if ($request->hasFile('cv_file_id')) {
            $image = $request->file('cv_file_id');
            $mytime = \Carbon\Carbon::now()->toDateTimeString();
            $name = $image->getClientOriginalName();
            $size = $image->getClientSize();
            $type = $image->getMimeType();
            $destinationPath = public_path('/uploaded/UserCV');
            $image->move($destinationPath,$name);
            $CandidateAttachment = new candidate_attachment();
            $CandidateAttachment->candidate_id = $candidate->id;
            $CandidateAttachment->file_name = $name;
            $CandidateAttachment->file_size = $size;
            $CandidateAttachment->file_type = $type;
            $CandidateAttachment->save();
        }
//
//        $JobCandiateVacancy = new JobCandidateVacancy();
//        $JobCandiateVacancy->candidate_id = $Candidate_id;
//        $JobCandiateVacancy->vacancy_id = $request->vacancy_name;
//        $JobCandiateVacancy->applied_date = $request->date_of_application;
//        $JobCandiateVacancy->status = "APPLICATION INITIATED";
//        $JobCandiateVacancy->save();
//
//
//        $JobCandiateVacancyHistory = new JobCandidateHistory();
//        $JobCandiateVacancyHistory->candidate_id = $Candidate_id;
//        $JobCandiateVacancyHistory->vacancy_id = $request->vacancy_name;
//        $JobCandiateVacancyHistory->candidate_vacancy_name = $request->vacancy_name;
//        $JobCandiateVacancyHistory->performed_by = $request->date_of_application;
//
//        $JobCandiateVacancyHistory->save();
        return redirect('/administration/candidate')->with('success','Candidate has been created successfully!');
    }

    public function CandidateShortlist($id)
    {
        $this->shareMenu();
        $JobCandidateShortlist = Candidate::with('vacancies')->where('id',$id)->first();
           // dd($JobCandidateShortlist->vacancies[0]->pivot->vacancy_id);
        return view('backend.HRIS.Recruitment.Candidate.shortlist',compact('JobCandidateShortlist'));
    }
    public function UpdateCandidateShortlist($candidate_id , $vacancy_id)
    {


         //  dd($candidate_id ,$vacancy_id );
//         $candidate_vacancy = candidate_vacancy::where(['candidate_id'=>$candidate_id,'vacancy_id'=>$vacancy_id]);
         $candidate_vacancy =   candidate_vacancy::where('candidate_id',"=",$candidate_id)->where('vacancy_id',"=",$vacancy_id)->first();
         $candidate_vacancy->status = "SHORT LIST";

         $candidate_history = new candidate_history();
         $candidate_history->candidate_id = $candidate_id;
         $candidate_history->vacancy_id = $vacancy_id;
         $candidate_history->performed_date = carbon::now();
         $candidate_history->note = input::get('note');
         $candidate_history->save();
         $candidate_vacancy->save();
//         $candidate->vacancies()->updateExistingPivot($candidate,array('status'=>'SHORT LIST','applied_date'=>carbon::now()));

        return redirect('/administration/candidate')->with('success','Candidate has been became the shortlist!');


    }

    public function CandidateRejectList($id){

        $this->shareMenu();
        $JobCandidateReject = Candidate::with('vacancies')->where('id',$id)->first();

        return view('backend.HRIS.Recruitment.Candidate.reject',compact('JobCandidateReject'));
    }

    public function UpdateCandidateRejectList($candidate_id,$vacancy_id)
    {

        $candidate_vacancy =   candidate_vacancy::where('candidate_id',"=",$candidate_id)->where('vacancy_id',"=",$vacancy_id)->first();
        $candidate_vacancy->status = "REJECT";
        $candidate_vacancy->save();
        return redirect('/administration/candidate')->with('success','Candidate has been became the Rejected!');

    }

    public function CandidateScheduleInterview($id)
    {

        $this->shareMenu();
        $JobCandidateShortlist = Candidate::with('vacancies')->where('id',$id)->first();
        return view('backend.HRIS.Recruitment.Candidate.scheduleInterview',compact('JobCandidateShortlist'));
    }

    public function UpdateCandidateScheduleInterview(Request $request ,$candidate_id, $vacancy_id)
    {

        $candidate_vacancy =   candidate_vacancy::where('candidate_id',"=",$candidate_id)->where('vacancy_id',"=",$vacancy_id)->first();
        $candidate_vacancy->status = "SCHEDULE INTERVIEW";
        $candidate_vacancy->save();
       // dd('hello');
      //  dd($candidate_id, $vacancy_id);
        //dd($id);
//        dd($request->all());
//        $candidate = Candidate::find($id);
//        $candidate->vacancies()->updateExistingPivot($candidate,array('status'=>'SCHEDULE INTERVIEW','applied_date'=>carbon::now()));
        $interview = interview::create($request->all());
        $interview->candidate()->associate($candidate_id);
        $interview->CandidateVacancy()->associate($candidate_vacancy->id);
        $employee = Employee::find($request->interview_id);
//        dd($request->interview_id);
        $interview->employees()->attach($employee);
        $interview->save();


        $candidate_history = new candidate_history();
        $candidate_history->candidate_id = $candidate_id;
        $candidate_history->vacancy_id = $vacancy_id;
//        $candidate_history->interview_id = $interview->id;
//        $candidate_history->performance_by = $request->interview_id;
        $candidate_history->interviewers =$interview->interview_name;
        $candidate_history->performed_date = carbon::now();
        $candidate_history->note = input::get('note');
        $candidate_history->save();

          //dd($id);
//        $JobCandidateVacancy = JobCandidateVacancy::findOrFail($id);
//        $JobCandidateVacancy->status = "Schedule Interview";
//        $JobCandidateVacancy->save();
//        $candidate_vacancy_id = $JobCandidateVacancy->id;
//
//
//        $JobInterview = new JobInterview();
//        $JobInterview->candidate_vacancy_id = 1;
//        $JobInterview->candidate_id = $id;
//        $JobInterview->interview_name = Carbon::now();
//        $JobInterview->interview_date = input::get('startdate');
//        $JobInterview->interview_time = input::get('time');
//        $JobInterview->note = input::get('note');
//        $JobInterview->save();
//        // $JobInterview_id = $JobInterview->id;
//
//        $JobInterview_id = $JobInterview->id;
//        //dd($JobInterview_id);
//
//        $JobInterviewer = new JobInterviewInterviewer();
//        $JobInterviewer->interview_id = $JobInterview_id;
//        $JobInterviewer->interviewer_id = input::get('interview_name');
//        $JobInterviewer->save();


        //dd($JobInterview->id);
//            dd();

//        $JobCanddiateVacancyHistory = JobCandidateHistory::findOrFail($id);
//            $JobCanddiateVacancyHistory->interview_id = input::get('interview_name');
       // $JobCandidateVacancy->save();
        return redirect('/administration/interview')->with('success','Candidate has been became the ScheduleInterview!');


    }

    /**
     * Show the form for editing the specified resource->with('success','Item created successfully!')
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->shareMenu();
//        $candidate = DB::table('job_candidates as c')
//            ->join('job_candidate_vacancies as cv','cv.candidate_id','=','c.id')
//            ->join('job_vacancies as v','cv.vacancy_id','=','v.id')
//            ->where('c.id',$id)
//            ->select('c.*','cv.*','v.*','v.id as vacancyID')
//            ->first();
////        dd($candidate);
//        $CandidateHistory = DB::table('job_candidate_histories')
//            ->where('candidate_id',$id)
//            ->get();
//        dd($CandidateHistory);
        $candidate = Candidate::with(['vacancies'])->where('id',$id)->first();
        $candidate_history =   candidate_history::where('candidate_id',"=",$id)->where('vacancy_id',"=",$candidate->vacancies[0]->id)->get();
//        dd($candidate_history);
        // dd($candidate);
//        dd($candidate->vacancies[0]->id);
        return view('backend.HRIS.Recruitment.Candidate.edit',compact('candidate','candidate_history'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function update(Request $request, $id)
//    {
//
//        $candidate = Candidate::findOrFail($id);
////        dd($candidate);
//        $input = $request->all();
//        $candidate->fill($input)->save();
//        $request->session()->flash('alert-success', 'New Candidate has been updated!!!');
//        return redirect('/administration/candidate');
//        //
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function destroy($id)
//    {
//        $candidate = Candidate::findOrFail($id);
//        $candidate->delete();
//        Session::flash('alert-danger', 'JobCategory successfully deleted!');
//        return redirect('/administration/candidate');
//        //
//    }
}
