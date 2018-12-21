<?php

namespace  App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\CandidateAttachment;
use App\UserCv;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersCvController extends Controller
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

//        $user_cv = DB::table('tbl_cvs as c')
//            ->join('kh_seeker as s','c.user_id','=','s.id')
//            ->select('s.*','c.*')
//            ->get();
        $company_id = Auth::guard('admins')->user()->id;
//        dd($company_id);
            $user_cv = DB::table('tbl_job_candidate as c')
                        ->select('c.name as candidate_name','c.id as candidate_id','cv.name as cv_name','cv.user_id as user_cv_id','s.photo as user_photo')
                        ->join('tbl_cvs as cv','c.user_id','=','cv.user_id')
                        ->join('tbl_job_candidate_vacancy as jcv','c.id','=','jcv.candidate_id')
                        ->join('kh_job_vacancy as v','jcv.vacancy_id','=','v.id')
                        ->join('tbl_job_title as t','v.job_title_code','=','t.id')
                        ->join('kh_seeker as s','c.user_id','=','s.id')
                        ->where('v.company_id',$company_id)
                        ->get();
//            dd($user_cv);
//        $result = DB::table('kh_job_vacancy as v')
//                     ->select('v.id as job_id')
//                     ->where('v.company_id',$company_id)->get();
//                        $job = array();
//                    foreach ($result as $job_ids){
//                        $job[]= $job_ids->job_id;
//                    }
//                    $job_id = implode(',',$job);
////                    dd($job_id);
//        $user_cv = DB::table('tbl_cvs as cv')
//                    ->select('cv.*','s.*','cv.name as cv_name')
//                    ->join('tbl_job_candidate_vacancy as jcv','cv.user_id','=','jcv.candidate_id')
//                    ->join('kh_seeker as s','cv.user_id','=','s.id')
//                    ->where('vacancy_id',$job_id)
//                    ->get()->groupBy('cv.user_id');
//            dd($user_cv);
        return view('backend.HRIS.Recruitment.Cv.index',compact('user_cv'));
    }
    public function getDownload($user_id)
    {
//        dd('hello');
        $entry = UserCv::where('user_id',$user_id)->firstOrFail();
//        dd($entry);
        $pathToFile = public_path()."/uploaded/UserCv/".$entry->name;
        return response()->download($pathToFile);
        //PDF file is stored under project/public/download/info.pdf
//        $file= public_path(). "/uploaded/UserCv/Bunsin_CV.pdf";
//
//        $headers = array(
//            'Content-Type: application/pdf',
//        );
//
//        return Response::download($file, 'filename.pdf', $headers);
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
