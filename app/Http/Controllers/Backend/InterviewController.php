<?php

namespace App\Http\Controllers\Backend;
use App\CandiateHistory;
use App\Candidate;
use App\Employee;
use App\Http\Controllers\Controller;

use App\Interview;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InterviewController extends Controller
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
        $interview = DB::table('tbl_job_interview as v')
            ->select('v.*','c.*','v.id as interview_id','c.id as candidate_id')
            ->join('tbl_job_candidate as c','c.id','=','v.candidate_id')
            ->where('v.status',0)
            ->get();
//        //
//        dd($interview);
        return view('backend.HRIS.Recruitment.Interview.index',compact('interview'));
    }
    public function updateUser(Request $request)

    {
//         dd($request->all());
         $interview = Interview::findOrFail($request->pk);
         if($request->name == "note"){

             $interview->note = $request->value;
         }
         if ($request->name == "interview_time"){

             $input = $request->value;
             $interview->interview_time = Carbon::parse($input)->format('H:i:s');
         }
         if($request->name == "interview_date"){

             $input = $request->value;
             $interview->interview_date =Carbon::parse($input)->format('Y-d-m');

         }
         $interview->save();
//        Interview::find($request->pk)->update([$request->interview_name => $request->value]);

        return response()->json(['success'=>'done']);

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

    public  function passInterview($candidate_id)
    {
//        dd($interview_id);
      $CanPass = DB::table('tbl_job_interview as v')
            ->select('c.*','v.*','v.id as interview_id')
            ->join('tbl_job_candidate as c','v.candidate_id','=','c.id')
            ->where('c.id',$candidate_id)
            ->first();
//      dd($CanPass);
      $interview_id = $CanPass->interview_id;
      $interview = Interview::findOrFail($interview_id);
//      dd($interview);
      $interview->status = 1;
      $interview->save();
      $p = new Employee();
      $p->company_id = Auth::guard('admins')->user()->id;
      $p->emp_lastname = $CanPass->name;
      $p->emp_firstname = $CanPass->name;
      $p->emp_middle_name = $CanPass->name;
      $p->save();
      return response()->json(['data'=>"done"]);

    }
    public function failInterview($candidate_id)
    {

        $fail = DB::table('tbl_job_interview as v')
            ->select('c.*','v.*','v.id as interview_id')
            ->join('tbl_job_candidate as c','v.candidate_id','=','c.id')
            ->where('c.id',$candidate_id)
            ->first();
//      dd($CanPass);
        $interview_id = $fail->interview_id;
        $interview = Interview::findOrFail($interview_id);
//      dd($interview);
        $interview->status = 1;
        $interview->save();
        $f = new CandiateHistory();
        $f->candidate_id = $candidate_id;
        $f->performed_date = $fail->interview_date;
        $f->note = $fail->note;
        $f->save();
        return response()->json($candidate_id);

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
