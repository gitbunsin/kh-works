<?php

namespace App\Http\Controllers\Backend;
use App\CandiateHistory;
use App\CandidateVacancy;
use App\Helper\MenuHelper;
use App\Http\Controllers\Controller;
use App\Interview;
use App\Model\JobCandidate;
use App\Model\JobCandidateAttchment;
use App\Model\JobVacancyAttachment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Candidate;
use App\CandidateAttachment;
use Carbon\Carbon;
use PhpParser\Node\Scalar\String_;

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
            $JobCandidate = JobCandidate::all();
//            $candidate = DB::table('tbl_job_candidate_vacancy as cv')
//                        ->select('cv.*','c.*','v.*','jt.*','cv.id as apply_id')
////                        ->select('cv.*','c.*','jt.*','cv.id as apply_id')
//                        ->join('kh_job_vacancy as v','cv.vacancy_id','=','v.id')
//                        ->join('tbl_job_candidate as c','c.id','=','cv.candidate_id')
//                        ->join('tbl_job_titles as jt','c.job_titles_code','=','jt.id')
//                        ->where('v.company_id',$company_id)
//                        ->where('cv.status',2)
//                        ->get();

      //  $menus = MenuHelper::getInstance()->getSidebarMenu(AppHelper::getInstance()->getRoleID(), AppHelper::getInstance()->getCompanyId());
        $this->shareMenu();
        return view('backend.HRIS.Recruitment.Candidate.index',compact('JobCandidate'));
    }

    public function approved(Request $request)
    {

        $Interview = new \App\Model\JobInterview();
        $Interview->candidate_id = $request->candidate_id;
        $Interview->status = 1;
        $Interview->applied_date = carbon::now();
        $Interview->save();

        return redirect('/administration/candidate')->with('success','Item created successfully!');


    }
//    public function approved(Request $request, $candidate_id)
//    {
//
//        $candidate_vacancy_id = CandidateVacancy::findOrFail($candidate_id);
//        $candidate_vacancy_id->status = 1;
//        $candidate_vacancy_id->save();
//        $id = $candidate_vacancy_id->id;
//        $user_interview = new Interview();
//        $can_id = $candidate_id;
//        $user_interview->candidate_id = $can_id;
//        $user_interview->candidate_vacancy_id = $id;
//        $user_interview->save();
//
//    return response()->json(['success'=>'Data is successfully added']);
//
//  }

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
        $Candidate = new JobCandidate();
        $Candidate->first_name = $request->emp_firstname;
        $Candidate->middle_name = $request->emp_middle_name;
        $Candidate->last_name = $request->emp_lastname;
//        $Candidate->last_name= $request->email;
        $Candidate->contact_number = $request->contact_number;
        $Candidate->status = 1;
        $Candidate->comment = $request->comment;
        $Candidate->email = $request->email;
        $Candidate->added_person = Auth::guard('admins')->user()->id;
        $Candidate->company_id =Auth::guard('admins')->user()->id;
        $Candidate->keyword = $request->keyword;
        $Candidate->date_of_application = Carbon::parse($request->date_of_application)->format('Y-m-d');
        $Candidate->save();
        $Candidate__id = $Candidate->id;
       // dd($Candidate__id);
        if ($request->hasFile('cv_file_id')) {
            $image = $request->file('cv_file_id');
            $mytime = \Carbon\Carbon::now()->toDateTimeString();
            $name = $image->getClientOriginalName();
            $size = $image->getClientSize();
            $type = $image->getMimeType();
            $destinationPath = public_path('/uploaded');
            $image->move($destinationPath,$name);
            $CandidateAttachment = new JobCandidateAttchment();
            $CandidateAttachment->candidate_id = $Candidate__id;
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
        $this->shareMenu();
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
