<?php

namespace App\Http\Controllers\Frontend;
use App\Employee;
use App\Exports\UsersExport;
use App\Job;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
// use Illuminate\Support\Facades\Input;
// use Illuminate\Support\Facades\DB;
use App\Candidate;
use App\CandidateAttachment;
use App\CandidateVacancy;
use App\JobCategory;
use App\Vacancy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Psy\Util\Json;

class KhWorksController extends Controller
{


    public function __construct()
    {
        $this->middleware('isClient');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
//    public function index( Request $request)
//    {
//        $Job= DB::table('tbl_jobs as j')
//            ->select('j.*')
//            ->paginate(1);
//        return view('frontend.Kh-Works.layouts.ui-main',compact('Job'));
//    }
//    public function export()
//    {
//
//    }

    public function index(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
//         dd($searchTerm);
        $Job = DB::table('tbl_jobs as j')
            ->select('j.*')
            ->where('job_title', 'like', '%' .$searchTerm. '%')
            ->orWhere('jobdesc', 'like', '%' .$searchTerm. '%')
            ->paginate(3);
        $JobCategory = JobCategory::all();
//        return redirect('/ui',compact('JobTitle','JobCategory'));
        //return Excel::download(new UsersExport, 'users.xlsx');
        return view('frontend.Kh-Works.layouts.ui-main',compact('Job'));

//        return redirect('/kh-works')->with(compact('JobTitle','JobCategory'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  function posts()
    {
        return view('frontend.Kh-Works.pages.postjob');
    }
    public function resume()
    {
        return view('frontend.Kh-Works.pages.resume');
    }
//    public function job()
//    {
//        return view('frontend.pages.Jobs');
//    }
    public  function lists()
    {
        return view('frontend.Kh-Works.pages.list');
    }
    public  function policy()
    {
        return view('frontend.Kh-Works.pages.policy');
    }
    public  function singin(){

        return view('frontend.Kh-works.pages.signing');
    }
    /**
     * function Candidate apply JobCategory.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public  function apply(Request  $request , $id , $user_id)
    {
        //dd($request->all());
        //Add to table JobCategory Candidate
        $candidate = new Candidate();
        $user_candidate = DB::table('users as u')
            ->select('c.*', 'c.id as cv_id', 'u.*')
            ->join('tbl_cvs as c', 'c.user_id', '=', 'u.id')
            ->where('c.user_id', '=', $user_id)
            ->get()
            ->first();
        //$candidate = new Candidate()
        //dd($user_candidate);
        //add CV
        $candidate->cv_file_id = $user_candidate->id;
        $candidate->first_name = $user_candidate->name;
        $candidate->last_name = $user_candidate->name;
        $candidate->middle_name = $user_candidate->name;
        $candidate->email = $user_candidate->email;
        $candidate->mode_of_application = 1;
        $candidate->status = 0;

        $candidate->save();
        //$candidate_id = $candidate->id;

        //add new table for Candidate Attachment
        $Candidate_Attachment = new CandidateAttachment();
        $Candidate_Attachment->candidate_id = $candidate->id;
        $Candidate_Attachment->file_name = $user_candidate->image;
        $Candidate_Attachment->file_type = $user_candidate->type;
        $Candidate_Attachment->file_size = $user_candidate->size;
        $Candidate_Attachment->save();
//        $vacancy = DB::table('tbl_job_vacancy as v')
//            ->select('v.*', 'v.id as vacancy_id', 't.*')
//            ->join('tbl_job_title as t', 'v.job_title_code', '=', 't.id')
//            ->where('v.job_title_code', '=', $id)
//            ->get()
//            ->first();
        $vacancy = new Vacancy();
        $vacancy->job_title_code = $user_candidate->id;
        $vacancy->hiring_manager_id = $user_candidate->user_id;
        $vacancy->name = $user_candidate->name;
        $vacancy->status = 1;

        $vacancy->save();
        $vacancy_id = $vacancy->id;

        //add new Candidate
        $vacancy_candidate = new CandidateVacancy();
        $vacancy_candidate->candidate_id = $candidate->id;
        $vacancy_candidate->vacancy_id = $vacancy->id;
        $vacancy_candidate->status = 1;
        $date_applied = \Carbon\Carbon::now();
        $vacancy_candidate->applied_date = $date_applied;
        $vacancy_candidate->save();

        $user = User::where('id', $user_id)->select('name', 'email')->get();
        $job = Job::where('id', $id)->select('CompanyName', 'email', 'job_title')->get();
        Excel::create('User', function ($excel) use ($user, $job) {
            $excel->sheet('Sheet', function ($sheet) use ($user, $job) {
//                $sheet->cell('A1', function ($cell) {
//                    $cell->setValue('First Name');
//                });
//                $sheet->cell('B1', function ($cell) {
//                    $cell->setValue('email');
//                });
//                $sheet->cell('C1', function ($cell) {
//                    $cell->setValue('Company Name');
//                });
//                $sheet->cell('D1', function ($cell) {
//                    $cell->setValue('job_title');
//                });
//               if (!empty($data)) {
                foreach ($user as $key => $value) {
                    $i = $key + 2;
                    $sheet->cell('A' . $i, $value['name']);
                    $sheet->cell('B' . $i, $value['email']);
                }
                foreach ($job as $key => $values) {
                    $is = $key + 2;
                    $sheet->cell('C' . $is, $values['CompanyName']);
                    $sheet->cell('D' . $is, $values['job_title']);
                }
            });
        })->download();

        //return redirect('/kh-works/jobs/1');
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
        return view('frontend.pages.Jobs');

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
