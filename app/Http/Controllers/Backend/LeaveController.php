<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Leave;
use App\LeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('backend.HRIS.Leave.Leave.index');
    }
    public function applyLeave()
    {
        return view('backend.HRIS.Leave.Leave.applyLeave');
    }
    public function viewMyLeaveEntitlements(){
        $leave_entitlement = DB::table('tbl_hr_leave_entitlement as e')
            ->select('e.*','l.*')
            ->join('tbl_hr_leave_entitlement_type as l','e.adjustment_type','=','l.id')
            ->get();
        return view('backend.HRIS.Leave.Entitlement.my_entitlement',compact('leave_entitlement'));
    }
    public function viewMyLeaveList()
    {


        $all_leave = DB::table('tbl_hr_leave_request as l')
            ->join('tbl_hr_leave_type as lt','l.leave_type_id','=','lt.id')
            ->get();
        return view('backend.HRIS.Leave.Leave.my_leave',compact('all_leave'));


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
    public function viewLeaveBalanceReport()
    {


        return view('backend.HRIS.Leave.Leave.leave_report');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function requestLeaveBalance($id)
    {
        $leave_balance = DB::table('tbl_hr_leave_entitlement as e')
                 ->join('tbl_hr_leave_type as t','e.leave_type_id','=','t.id')
                ->where('e.leave_type_id',$id)
                ->first();
        return response()->json($leave_balance);
    }
    public function assginLeave()
    {

        return view('backend.HRIS.Leave.Leave.assignLeave');
    }
    public function leaveRequest(Request $request){

        dd($request->all());
        $leave_request = new LeaveRequest();
        $leave_request->company_id = Auth::guard('admins')->user()->id;
        $leave_request->employee_id = 1 ;
        $leave_request->leave_type_id = $request->leave_type;
        $leave_request->comments = $request->comment;
        $leave_request->date_applied = \Carbon\Carbon::now();
        $leave_request->save();
        $leave_request_id  = $leave_request->id;
        $leave = new Leave();
        $firstDate  = $request->startdate;
        $toDate = $request->finishdate;
        if($firstDate){
            $leave->date = $firstDate;
            $leave->length_hours = 8;
            $leave->length_days = 1;
            $leave->status = 1;
            $leave->comments = $request->comments;
            $leave->leave_request_id = $request->$leave_request_id;
            $leave->employee_id = 1;
//            $leave->start_time  = $request->start_time ;
//            $leave->end_time = $request->end_time;
            $leave->duration_type = $request->duration_type ;
            $leave->save();
        }
        if($toDate){
            $leave->date = $toDate;
            $leave->length_hours = 8;
            $leave->length_days = 1;
            $leave->status = 1;
            $leave->comments = $request->comments;
            $leave->leave_request_id = $request->$leave_request_id;
            $leave->employee_id = 1;
//            $leave->start_time  = $request->start_time ;
//            $leave->end_time = $request->end_time;
            $leave->duration_type = $request->duration_type ;
            $leave->save();
        }


        return redirect('/administration/get-applyLeave')->with('success','Leave has been requested');


        //dd('hello');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd('hello');
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
