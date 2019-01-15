<?php

namespace App\Http\Controllers\Backend;
use App\CandidateVacancy;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Job;
use App\JobDescription;
use App\JobTitle;
use App\Organization;
use App\Vacancy;
use App\VacancyAttachment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function __construct()
//    {
//        $this->middleware('isAdmin');
//    }
    public function index()
    {
//        $job = Job::orderBy('id','DESC')->get();
        $company_id = Auth::guard('admins')->user()->id;
        $job = DB::table('kh_job_vacancy as v')
            ->select('v.*','t.*','v.id as job_id','e.*')
            ->join('tbl_job_title as t','v.job_title_code',"=",'t.id')
            ->join('tbl1_hr_employee as e','v.hiring_manager_id','=','e.emp_id')
            ->where('v.company_id',$company_id)
            ->get();
//        dd($job);
        return view('backend.HRIS.Recruitment.Job.index',compact('job'));
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
//    public function show($id)
//    {
//        $isApply = false;
//        if (Auth::user()) {
//            $user_id = Auth::user()->id;
//            $canVaObj = new CandidateVacancy();
//            $isApply = $canVaObj->user_apply($id,$user_id);
//        }
//        $job_title = DB::table('kh_job_vacancy as v')
//            ->select('v.*','t.*','v.id as job_id')
//            ->join('tbl_job_title as t','v.job_title_code',"=",'t.id')
//            ->first();
////        $company = Organization::where('id',$job_title->company_id)->first();
////        dd($company);
//        return view('backend.HRIS.Recruitment.Job.show',compact('job_title','company','isApply'));
//    }
        public  function displayJob($job_id , $company_id){
//            $isApply = false;
            if(auth::user()){
                $user_id  = auth::user()->id;
//                dd($user_id);
//                $result = DB::table('tbl_job_candidate as c')
//                    ->select('c.id')
//                    ->where('c.user_id',$user_id)->get()->groupBy('c.user_id');
//
//                $job = array();
//                foreach ($result as $job_ids){
//                    $job[]= $job_ids->id;
//                }
//                $candidate_id = implode(',',$job);
//                dd($candidate_id);
//                $canVaObj = new CandidateVacancy();
//                $isApply = $canVaObj->user_apply($job_id,$candidate_id[0]);
                $isApply = DB::table('tbl_job_candidate as c')
                    ->join('tbl_job_candidate_vacancy as cv','cv.candidate_id','=','c.id')
                    ->where('cv.vacancy_id',$job_id)
                    ->where('c.user_id',$user_id)
                    ->get();
            }
        $job_title = DB::table('kh_job_vacancy as v')
            ->select('v.*','t.*','v.id as job_id','p.*')
            ->join('tbl_job_title as t','v.job_title_code',"=",'t.id')
            ->join('tbl_province as p','v.location','=','p.id')
            ->where('v.company_id',$company_id)
            ->first();

        $company = Organization::where('id',$company_id)->first();
        return view('backend.HRIS.Recruitment.Job.show',compact('job_title','company','isApply'));

        }

//    public function update(Request $request, $job_id)
//    {
//        $job = Job::findOrFail($job_id);
//        $job->job_title = $request->job_title;
//        $job->job_description = $request->job_description;
//        $job->note = $request->note;
//        $job->save();
//        return response()->json($job);
//    }

    public function destroy($id)
    {
        $job = Job::destroy($id);
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
//        dd($request->all());
        $job = new Job();
        $job->job_title_code = $request->job_title_code;
        $job->description = $request->description;
        $job->requirement = $request->requirement;
        $job->min_salary = $request->min;
        $job->max_salary = $request->max;
        $job->job_type = $request->job_type;
        $job->company_id = $request->company_id;
        $job->hiring_manager_id = $request->manager;
        $job->negotiable = 1;
//        dd($request->city);
        $job->location = $request->city;
        $job->closing_date = Carbon::parse($request->closing_date)->format('Y-m-d');
        $job->save();
        $job_id = $job->id;
        $file = $request->file('resume');
//        dd($request->hasFile('cv_file_id'));
        if ($request->hasFile('resume')) {
            $image = $request->file('resume');
            //dd($image);
            $mytime = \Carbon\Carbon::now()->toDateTimeString();
            $name = $image->getClientOriginalName();
            $size = $image->getClientSize();
//
            $type = $image->getMimeType();
            $destinationPath = public_path('/uploaded/CompanyJd/');
            $image->move($destinationPath, $name);
            $jd = new JobDescription();
            $jd->file_name = $name;
            $jd->file_size = $size;
            $jd->job_vacancy_id =$job_id;
            $jd->save();
        }
        return redirect('/administration/post-jobs');
    }

    public function edit($id)
    {
        $job = Job::where('id',$id)->first();
        return view('backend.HRIS.Recruitment.Job.edit',compact('job'));
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
//        dd($request->all());

        $job = Job::findOrFail($id);
        $job->job_title_code = $request->job_title_code;
        $job->description = $request->description;
        $job->requirement = $request->requirement;
        $job->min_salary = $request->min;
        $job->max_salary = $request->max;
        $job->job_type = $request->job_type;
        $job->company_id = $request->company_id;
        $job->hiring_manager_id = $request->manager;
        $job->negotiable = 1;
//        dd($request->city);
        $job->location = $request->city;
        $job->closing_date = Carbon::parse($request->closing_date)->format('Y-m-d');
        $job->save();
        $job_id = $job->id;
        $file = $request->file('resume');
//        dd($request->hasFile('cv_file_id'));
        if ($request->hasFile('resume')) {
            $image = $request->file('resume');
            //dd($image);
            $mytime = \Carbon\Carbon::now()->toDateTimeString();
            $name = $image->getClientOriginalName();
            $size = $image->getClientSize();
//
            $type = $image->getMimeType();
            $destinationPath = public_path('/uploaded/CompanyJd/');
            $image->move($destinationPath, $name);
            $jd = new JobDescription();
            $jd->file_name = $name;
            $jd->file_size = $size;
            $jd->job_vacancy_id =$job_id;
            $jd->save();
        }
        return redirect('/administration/post-jobs');
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
