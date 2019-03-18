<?php

namespace  App\Http\Controllers\Backend;
use App\CandidateAttachment;
use App\Http\Controllers\Controller;
use App\Model\JobCandidateAttchment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersCvController extends BackendController
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
        if(Auth::guard('admins')->user()){
            $CompanyID = Auth::guard('admins')->user()->id;

        }else{
            $CompanyID = Auth::guard('employee')->user()->company_id;
        }
        $CandidateAttachment= DB::table('job_candidates as JC')
            ->join('job_candidate_attchments as JCA','JCA.candidate_id','=','JC.id')
            ->get();
        //dd($CandidateAttachment);
//        $user_cv = DB::table('tbl_job_candidate as c')
//                    ->select('c.name as candidate_name','c.id as candidate_id','cv.name as cv_name',
//                        'cv.user_id as user_cv_id',
//                        's.photo as user_photo'
//                    )
//                    ->join('user_attachments as cv','c.user_id','=','cv.user_id')
//                    ->join('tbl_job_candidate_vacancy as jcv','c.id','=','jcv.candidate_id')
//                    ->join('kh_job_vacancy as v','jcv.vacancy_id','=','v.id')
//                    ->join('tbl_job_titles as t','v.job_titles_code','=','t.id')
//                    ->join('users as s','c.user_id','=','s.id')
//                    ->where('v.company_id',$company_id)
//                    ->get();
        return view('backend.HRIS.Recruitment.Cv.index',compact('CandidateAttachment'));
    }
    public function getDownload($user_id)
    {
//        dd('hello');
        $entry = JobCandidateAttchment::where('id',$user_id)->firstOrFail();
//        dd($entry);
        $pathToFile = public_path()."/uploaded/UserCv/".$entry->name;
        return response()->download($pathToFile);
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
