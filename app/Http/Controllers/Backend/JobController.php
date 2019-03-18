<?php

namespace App\Http\Controllers\Backend;
use App\CandidateAttachment;
use App\CandidateVacancy;
use App\JobDescription;
use App\Model\JobCandidate;
use App\Model\JobCandidateVacancy;
use App\Model\JobVacancy;
use App\Model\JobVacancyAttachment;
use App\Model\OrganizationGenInfo;
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
//        $job = Job::orderBy('id','DESC')->get();
        $company_id = Auth::guard('admins')->user()->id;
        $jobVacancy = DB::table('job_vacancies as v')
                            ->join('job_titles as t','v.job_title_code','=','t.id')
                            ->join('employees as e','v.hiring_manager_id','=','e.emp_number')
                            ->get();
//        dd($jobVacancy);
        return view('backend.HRIS.Recruitment.Job.index',compact('jobVacancy'));
        //
    }

//    public function store(Request $request)
//    {
//        $job = Job::create($request->all());
//        return response()->json($job);
//    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
        public  function DisplayVacancy($VacancyID , $OrgizationID){
            $jobVacancy = DB::table('job_vacancies as v')
                ->join('job_titles as t','v.job_title_code','=','t.id')
                ->join('organization_gen_infos as com','v.company_id','=','com.id')
                ->where('t.id',$VacancyID)
                ->orWhere('com.id',$OrgizationID)
                ->select('v.*','t.*','com.*','v.id as VacancyID','com.id as OrganizationCode')
                ->first();
           // dd($VacancyID,$OrgizationID);
//            $jobVacancy = JobVacancy::where('id',$job_id)->first();
           // dd($jobVacancy);

           // dd('hello');
//            $isApply = false;
//            if(auth::user()){
//                $user_id  = auth::user()->id;
//            $isApply = DB::table('tbl_job_candidate as c')
//                ->join('tbl_job_candidate_vacancy as cv','cv.candidate_id','=','c.id')
//                ->where('cv.vacancy_id',$job_id)
//                ->where('c.user_id',$user_id)
//                ->get();
//            }
//        $job_titles = DB::table('kh_job_vacancy as v')
//            ->select('v.*','t.*','v.id as job_id','p.*')
//            ->join('tbl_job_titles as t','v.job_titles_code',"=",'t.id')
//            ->join('tbl_province as p','v.location','=','p.id')
//            ->where('v.company_id',$company_id)
//            ->first();
            //dd($job_Title);

//        $company = OrganizationGenInfo::where('id',$company_id)->first();
        return view('backend.HRIS.Recruitment.Job.show',compact('jobVacancy'));
//        return view('backend.HRIS.Recruitment.Job.show',compact('job_titles','company','isApply'));
        }

    /**
     *
     */
    public function ApplyVacancy(Request $request ,$VacancyID,$OrganizationCode)
       {
           if(Auth::user()){
               //UserApplyVacancy
               $UserApplyVacancy = User::where('id',Auth::user()->id)->first();

//               dd($UserApplyVacancy);

//               $email = $UserApplyVacancy->email;
//               $CandiateExistingModel = JobCandidate::where('email',$email)->first();

              // dd($check);
//                if($CandiateExistingModel){
//
//                }else{
//                    $Candidate  = new JobCandidate();
//                    $Candidate->company_id = $OrganizationCode;
//                    $Candidate->email   = $UserApplyVacancy->email;
//                    $Candidate->save();

//                }


//
//                      $Candidate  = DB::table('job_candidates as c')
//                        ->join('job_candidate_attchments as jc','c.id','=','jc.candidate_id')
//                      ->where('jc.candidate_id',$Candidate->id)
//                        ->first();
//
//                      dd($Candidate);


               //CheckUserApply
//               $CandidateVacancy = DB::table('job_candidate_vacancies')
//                                        ->where('candidate_id',$VacancyID)
//                                        ->orWhere('vacancy_id')
//                                        ->first();
               //dd($CandidateVacancy);


//               dd($user);
//               if ($user === null) {
//                   // user doesn't exist
//                   $Candidate  = new JobCandidate();
//                   $Candidate->company_id = $OrganizationCode;
//                   $Candidate->email   = $user->email;
//                   $Candidate->save();
//                   //CheckUserAttachment
//                   $CandidateAttachment = DB::table('job_candidates as c')
//                       ->join('job_candidate_attchments as jc','jc.candidate_id','=','c.id')
//                       ->where('c.id',$Candidate->id)
//                       ->first();
//               }

            //   dd($CandidateAttachment);

              // dd($request->all());
               //dd($VacancyID,$OrganizationCode);

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
        //
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
       // dd(input::get('job_requirements'));
        $jobVacancy = new JobVacancy();
        $jobVacancy->job_title_code = $request->job_titles_code;
        $jobVacancy->name = $request->vacancy_name;
        $jobVacancy->job_description = $request->job_description;
        $jobVacancy->job_requirements = $request->job_requirements;
        $jobVacancy->company_id = Auth::guard('admins')->user()->id;
        $jobVacancy->hiring_manager_id = $request->hiring_manager;
        $jobVacancy->status = 1;
        $jobVacancy->no_of_position = $request->no_of_position;
        $jobVacancy->save();
        $jobVacancyID = $jobVacancy->id;
        $file = $request->file('resume');
//        dd($request->hasFile('cv_file_id'));
        if ($request->hasFile('resume')) {
            $image = $request->file('resume');
            //dd($image);
            $mytime = \Carbon\Carbon::now()->toDateTimeString();
            $name = $image->getClientOriginalName();
            $size = $image->getClientSize();
            $type = $image->getMimeType();
            $destinationPath = public_path('/uploaded/CompanyJd/');
            $image->move($destinationPath, $name);
            $jd = new JobVacancyAttachment();
            $jd->file_name = $name;
            $jd->file_size = $size;
            $jd->vacancy_id =$jobVacancyID;
            $jd->save();
        }
        return redirect('/administration/post-jobs')->with('success','Item created successfully!');
    }

    public function edit($id)
    {
        $this->shareMenu();
        $jobVacancy = JobVacancy::where('id',$id)->first();
        return view('backend.HRIS.Recruitment.Job.edit');
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
        $jobVacancy = JobVacancy::findOrFail($id);
        $jobVacancy->job_title_code = $request->job_titles_code;
        $jobVacancy->name = $request->vacancy_name;
        $jobVacancy->job_description = $request->job_description;
        $jobVacancy->job_requirements = $request->job_requirements;
        $jobVacancy->company_id = Auth::guard('admins')->user()->id;
        $jobVacancy->hiring_manager_id = $request->hiring_manager;
        $jobVacancy->status = 1;
        $jobVacancy->no_of_position = $request->no_of_position;
        $jobVacancy->save();
        $jobVacancyID = $jobVacancy->id;
        $file = $request->file('resume');
//        dd($request->hasFile('cv_file_id'));
        if ($request->hasFile('resume')) {
            $image = $request->file('resume');
            //dd($image);
            $mytime = \Carbon\Carbon::now()->toDateTimeString();
            $name = $image->getClientOriginalName();
            $size = $image->getClientSize();
            $type = $image->getMimeType();
            $destinationPath = public_path('/uploaded/CompanyJd/');
            $image->move($destinationPath, $name);
            $jd = new JobVacancyAttachment();
            $jd->file_name = $name;
            $jd->file_size = $size;
            $jd->vacancy_id =$jobVacancyID;
            $jd->save();
        }
        return redirect('/administration/post-jobs')->with('success','Item created successfully!');
    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        //
//    }
}
