<?php

namespace  App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\CandidateAttachment;
use App\UserCv;
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
    public function index()
    {
//        $Cv = DB::table('tbl_job_candidate_attachment')
//            ->join('tbl_job_candidate', 'tbl_job_candidate_attachment.candidate_id', '=', 'tbl_job_candidate.id')
//            ->select('tbl_job_candidate_attachment.*', 'tbl_job_candidate.*')
//            ->get();
//        dd($CandidateAttachment);
        $user_cv = DB::table('tbl_cvs as c')
            ->join('kh_seeker as s','c.user_id','=','s.id')
            ->select('s.*','c.*')
            ->get();
//        dd($user_cv);
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
