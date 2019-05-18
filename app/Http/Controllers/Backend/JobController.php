<?php

namespace App\Http\Controllers\Backend;
use App\CandidateAttachment;
use App\CandidateVacancy;
use App\JobDescription;
use App\Model\Candidate;
use App\Model\candidate_attachment;
use App\Model\candidate_history;
use App\Model\candidate_vacancy;
use App\Model\JobCandidate;
use App\Model\JobCandidateAttchment;
use App\Model\JobCandidateHistory;
use App\Model\JobCandidateVacancy;
use App\Model\JobVacancy;
use App\Model\JobVacancyAttachment;
use App\Model\OrganizationGenInfo;
use App\Model\Vacancy;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JobController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function __construct()
   {
      // $this->middleware('isAdmin');
   }
    public function index()
    {
        $this->shareMenu();
        $jobVacancy = Vacancy::with(['employee','jobtitle'])->get();
//        dd($jobVacancy);
        return view('backend.HRIS.Recruitment.Job.index',compact('jobVacancy'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
        public  function DisplayVacancy($Vacany_id , $OrgizationID)
        {
            //dd($Vacany_id);
            $jobVacancy = Vacancy::with(['company', 'jobtitle', 'candidates'])->where(['id' => $Vacany_id])->first();
            $isApply = false;
            if (Auth::user()){
                $isApply = DB::table('candidate_vacancy as cv')
                    ->join('candidates as c', 'cv.candidate_id', '=', 'c.id')
                    ->where(['cv.vacancy_id' => $Vacany_id, 'c.user_id' => Auth::user()->id])
                    ->first();
                //dd($isApply);
             }
            //dd($isApply);
        return view('backend.HRIS.Recruitment.Job.show',compact('jobVacancy','isApply'));
        }

    /**
     *
     */
    public function ApplyVacancy(Request $request ,$VacancyID,$OrganizationCode)
       {
           //dd('hello');
           if(Auth::user()){
               //UserApplyVacancy
               $UserApplyVacancy = User::where('id',Auth::user()->id)->first();
               $UserID = $UserApplyVacancy->id;
              $UserAttachment = DB::table('users as u')
                                ->join('user_attachments as a','a.user_id','=','u.id')
                                ->where('a.user_id',$UserID)
                                ->first();
              //dd($UserAttachment);
//               dd($isApply);
               if($UserAttachment){
                  $Candidate = new Candidate();
                  $Candidate->user_id = Auth::user()->id;
                  $Candidate->company_id = $OrganizationCode;
                  $Candidate->first_name = Auth::user()->name;
                  $Candidate->middle_name = Auth::user()->name;
                  $Candidate->last_name = Auth::user()->name;
                  $Candidate->email = Auth::user()->email;
                  $Candidate->contact_number  = Auth::user()->phone;
                  $Candidate->status = 1;
                  $Candidate->date_of_application = Carbon::now();
                  $Candidate->save();

                  $Candidate_id = $Candidate->id;

//
                  $CandidateAttachment = new candidate_attachment();
                  $CandidateAttachment->candidate_id = $Candidate_id;
                  $CandidateAttachment->file_name = $UserAttachment->name;
                  $CandidateAttachment->file_size = $UserAttachment->size;
                  $CandidateAttachment->file_type = $UserAttachment->type;
                  $CandidateAttachment->save();
//
//                   $Candidate_id = $Candidate->id;
                  $JobCandiateVacancy = new candidate_vacancy();
                  $JobCandiateVacancy->candidate_id = $Candidate_id;
                  $JobCandiateVacancy->vacancy_id = $VacancyID;
                  $JobCandiateVacancy->applied_date = carbon::now();
                  $JobCandiateVacancy->status = "APPLICATION INITIATED";
                  $JobCandiateVacancy->save();
//                   $candidate= Candidate::find($id);
                   //$Candidate->vacancies()->sync($Candidate_id,array('status'=>'APPLICATION INITIATED','applied_date'=>carbon::now()));


                  $CandidateVacancyHistory = new candidate_history();
                   $CandidateVacancyHistory->candidate_id = $Candidate_id;
                   $CandidateVacancyHistory->vacancy_id = $VacancyID;
                   $CandidateVacancyHistory->candidate_vacancy_name = "";
                   $CandidateVacancyHistory->performed_date = Carbon::now();
                   $CandidateVacancyHistory->save();

                  return redirect('/administration/display-job-details/'.$VacancyID.'/'.$OrganizationCode)->with('success','Job has been applied');
//                  dd("have CV");

              }else{

                  return redirect('/kh-works/resume')->with('error','Please Upload Ur resume to apply this Job!');
              }
           }else{
               return redirect('/login')->with('error','Please login to apply this Job!');
           }

        }
    public function destroy($id)
    {
        $job = JobVacancyAttachment::destroy($id);
        return response()->json($job);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->shareMenu();
        return view('backend.HRIS.Recruitment.Job.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $vacancy = Vacancy::create($request->all());
        $vacancy->company()->associate(Auth::guard('admins')->user()->id);
        $vacancy->employee()->associate($request->hiring_manager_id);
        $vacancy->jobtitle()->associate($request->job_title_code);
        $file = $request->file('resume');
//        dd($request->hasFile('cv_file_id'));
//        if ($request->hasFile('resume')) {
//            $image = $request->file('resume');
//            //dd($image);
//            $mytime = \Carbon\Carbon::now()->toDateTimeString();
//            $name = $image->getClientOriginalName();
//            $size = $image->getClientSize();
//            $type = $image->getMimeType();
//            $destinationPath = public_path('/uploaded/CompanyJd/');
//            $image->move($destinationPath, $name);
//            $jd = new JobVacancyAttachment();
//            $jd->file_name = $name;
//            $jd->file_size = $size;
//            $jd->vacancy()->associate($vacancy->id);
////            $jd->vacancy_id =$vacancy->id;
//            $jd->save();
//        }
        $vacancy->save();

        return redirect('/administration/post-jobs')->with('success','Item created successfully!');
    }

    public function edit($id)
    {
        $this->shareMenu();
        $jobVacancy = Vacancy::find($id);
        return view('backend.HRIS.Recruitment.Job.edit',compact('jobVacancy'));
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

        $vacancy = Vacancy::findOrFail($id);
        $vacancy->update($request->all());
        $vacancy->company()->associate(Auth::guard('admins')->user()->id);
        $vacancy->employee()->associate($request->hiring_manager_id);
        $vacancy->jobtitle()->associate($request->job_title_code);
        $vacancy->save();
//        $jobVacancy = JobVacancy::findOrFail($id);
//        $jobVacancy->job_title_code = $request->job_titles_code;
//        $jobVacancy->name = $request->vacancy_name;
//        $jobVacancy->job_description = $request->job_description;
//        $jobVacancy->job_requirements = $request->job_requirements;
//        $jobVacancy->company_id = Auth::guard('admins')->user()->id;
//        $jobVacancy->hiring_manager_id = $request->hiring_manager;
//        $jobVacancy->status = 1;
//        $jobVacancy->no_of_position = $request->no_of_position;
//        $jobVacancy->save();
//        $jobVacancyID = $jobVacancy->id;
//        $file = $request->file('resume');
////        dd($request->hasFile('cv_file_id'));
//        if ($request->hasFile('resume')) {
//            $image = $request->file('resume');
//            //dd($image);
//            $mytime = \Carbon\Carbon::now()->toDateTimeString();
//            $name = $image->getClientOriginalName();
//            $size = $image->getClientSize();
//            $type = $image->getMimeType();
//            $destinationPath = public_path('/uploaded/CompanyJd/');
//            $image->move($destinationPath, $name);
//            $jd = new JobVacancyAttachment();
//            $jd->file_name = $name;
//            $jd->file_size = $size;
//            $jd->vacancy_id =$jobVacancyID;
//            $jd->save();
//        }
        return redirect('/administration/post-jobs')->with('success','Item has been updated successfully!');
    }
//
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd('hello job details');
        //
    }
}
