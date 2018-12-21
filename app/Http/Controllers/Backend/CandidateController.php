<?php

namespace App\Http\Controllers\Backend;
use App\CandidateVacancy;
use App\Http\Controllers\Controller;
use App\Interview;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Candidate;
use App\CandidateAttachment;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use PhpParser\Node\Scalar\String_;

class CandidateController extends Controller
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
//        $candidate = DB::table('tbl_job_candidate_vacancy as cv')
//            ->join('tbl_job_candidate as c','cv.candidate_id','=','c.id')
//            ->join('tbl_job_vacancy as v','cv.vacancy_id','=','v.id')
//            ->select('cv.*','c.*','v.*')
//            ->get();
//        $candidate = Candidate::all();
            $company_id = Auth::guard('admins')->user()->id;
//            dd($company_id);

            $candidate = DB::table('tbl_job_candidate_vacancy as cv')
                        ->select('cv.*','v.*','c.*','jt.*','cv.id as apply_id')
                        ->join('kh_job_vacancy as v','cv.vacancy_id','=','v.id')
                        ->join('tbl_job_candidate as c','c.id','=','cv.candidate_id')
                        ->join('tbl_job_title as jt','v.job_title_code','=','jt.id')
                        ->where('v.company_id',$company_id)
                        ->where('cv.status',2)
                        ->get();
//            dd($candidate);
//        dd($company_id);

//        $name = Auth::guard('admins')->user()->name();
//        dd($name);
//        dd($company_id);
//        $candidate = DB::table('tbl_job_candidate as c')
//                 ->select('c.*','cv.*','v.*','c.id as candidate_id','t.*')
//                 ->join('tbl_job_candidate_vacancy as cv','cv.candidate_id','=','c.id')
//                 ->join('kh_job_vacancy as v','cv.vacancy_id','=','v.id')
//                 ->join('tbl_job_title as t','v.job_title_code','=','t.id')
//                 ->Where('v.company_id',$company_id)
//                 ->get();
//        $candidate = DB::table('kh_job_vacancy as v')
//                    ->select('v.*')
//                    ->join('tbl_job_candidate_vacancy as cv','cv.vacancy_id','v.id')
//                    ->
//                    ->where('v.company_id',$company_id)
//                    ->get();
//          dd($candidate);
        return view('backend.HRIS.Recruitment.Candidate.index',compact('candidate'));
    }

    public function approved(Request $request, $candidate_id)
    {

        $candidate_vacancy_id = CandidateVacancy::findOrFail($candidate_id);
        $candidate_vacancy_id->status = 1;
        $candidate_vacancy_id->save();
        $id = $candidate_vacancy_id->id;
        $user_interview = new Interview();
        $can_id = $candidate_id;
        $user_interview->candidate_id = $can_id;
        $user_interview->candidate_vacancy_id = $id;
        $user_interview->save();

    return response()->json(['success'=>'Data is successfully added']);

  }

    public function reject(Request $request, $candidate_id)
    {

        $candidate = CandidateVacancy::findOrFail($candidate_id);
        $candidate->status = 0;
        $candidate->save();
        return response()->json(['success'=>'Data is successfully added']);

    }

//    public function store(Request $request)
//    {
//        //dd($request->all());
//        $Candidate = Candidate::create($request->all());
//        return response()->json($Candidate);
//    }

//    public function accepts(Request $request)
//    {
//        //dd($request->all());
//        $Candidate = Interview::create($request->all());
//        return response()->json($Candidate);
//    }

//    public function show($candidate_id)
//    {
//        $Candidate = Candidate::findOrFail($candidate_id);
//        return response()->json($Candidate);
//    }

//    public function update(Request $request, $candidate_id)
//    {
//        $Candidate = Candidate::findOrFail($candidate_id);
//        $Candidate->first_name = $request->first_name;
//        $Candidate->last_name = $request->last_name;
//        $Candidate->middle_name = $request->middle_name;
//        $Candidate->email = $request->email;
//        $Candidate->comment = $request->comment;
//        $Candidate->keywords = $request->keywords;
//        $Candidate->save();
//        return response()->json($Candidate);
//    }

//    public function destroy($candidate_id)
//    {
//        $Candidate = Candidate::destroy($candidate_id);
//        return response()->json($Candidate);
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $candidate = new Candidate();
        $candidate->first_name = Input::get('first_name');
        $candidate->last_name = Input::get('last_name');
        $candidate->middle_name = Input::get('middle_name');
        $candidate->email = Input::get('email');
        $candidate->keywords = Input::get('keyword');
        $candidate->status = 2;
        $candidate->mode_of_application = 1;
        $candidate->cv_file_id = 1;
        $input  = Input::get('date-of-application');
        $date_of_application = Carbon::parse($input )->format('Y-m-d');
        $candidate->date_of_application = $date_of_application;
        $candidate->save();
        $id = $candidate->id;
        //dd($id);
        $file = Input::file('cv_file_id');
        //dd($request->all());
        if ($request->hasFile('cv_file_id')) {
            $image = $request->file('cv_file_id');
            $mytime = \Carbon\Carbon::now()->toDateTimeString();
            $name = $image->getClientOriginalName();
            $size = $image->getClientSize();
            $type = $image->getMimeType();
            $destinationPath = public_path('/uploaded');
            $image->move($destinationPath,$name);
            $CandidateAttachment = new CandidateAttachment();
            $CandidateAttachment->candidate_id = $id;
            $CandidateAttachment->file_name = $name;
            $CandidateAttachment->file_size = $size;
            $CandidateAttachment->file_type = $type;
            $CandidateAttachment->save();
        }
        return redirect('/administration/candidate');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidate = Candidate::where('id',$id)->first();
        dd($candidate);
        return view('backend.HRIS.Recruitment.Candidate.edit',compact('candidate','id'));
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
