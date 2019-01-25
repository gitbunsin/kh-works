<?php

namespace App\Http\Controllers\Backend;
use App\CandiateHistory;
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
            $company_id = Auth::guard('admins')->user()->id;
            $candidate = DB::table('tbl_job_candidate_vacancy as cv')
                        ->select('cv.*','c.*','v.*','jt.*','cv.id as apply_id')
//                        ->select('cv.*','c.*','jt.*','cv.id as apply_id')
                        ->join('kh_job_vacancy as v','cv.vacancy_id','=','v.id')
                        ->join('tbl_job_candidate as c','c.id','=','cv.candidate_id')
                        ->join('tbl_job_title as jt','c.job_title_code','=','jt.id')
                        ->where('v.company_id',$company_id)
                        ->where('cv.status',2)
                        ->get();
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
        $can_history = new CandiateHistory();
        $can_history->candidate_id = $candidate_id;
        $can_history->vacancy_id = $candidate->vacancy_id;
        $can_history->save();
        return response()->json(['success'=>'Data is successfully added']);

    }
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
        //dd($request->all());
        $c = new Candidate();
        $c->name = Input::get('full_name');
        $c->email = Input::get('email');
        $c->keywords = Input::get('keyword');
        $c->status = 1;
        $c->job_title_code = $request->job_title;
        $c->mode_of_application = 1;
        $c->company_id = Auth::guard('admins')->user()->id;
        $c->cv_file_id = 1;
        $input  = Input::get('date-of-application');
        $date_of_application = Carbon::parse($input )->format('Y-m-d');
        $c->date_of_application = $date_of_application;
        $c->save();
        $C_id = $c->id;
        //C_V = Candidate_Vacancy
        $c_v = new CandidateVacancy();
        $c_v->candidate_id = $C_id;
        $c_v->vacancy_id = $request->vacancy_id;
        $c_v->status = 2;
        $date_applied = \Carbon\Carbon::now();
        $c_v->applied_date = $date_applied;
        $c_v->save();
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
            $CandidateAttachment->candidate_id = $C_id;
            $CandidateAttachment->file_name = $name;
            $CandidateAttachment->file_size = $size;
            $CandidateAttachment->file_type = $type;
            $CandidateAttachment->save();
        }
        return redirect('/administration/candidate')->with('success','Item created successfully!');
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
     * Show the form for editing the specified resource->with('success','Item created successfully!')
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
