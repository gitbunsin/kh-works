<?php

namespace App\Http\Controllers\Backend;
use App\Helper\AppHelper;
use App\Helper\MenuHelper;
use App\Http\Controllers\Controller;

use App\Model\Leave;
use App\Model\LeaveEntitlement;
use App\Model\LeaveRequest;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use function Sodium\compare;

/**
 * Class LeaveController
 * @package App\Http\Controllers\Backend
 */
class LeaveController extends BackendController
{
    /**
     * LeaveController constructor.
     */
    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->shareMenu();
        //
        $ListAllLeave = LeaveEntitlement::all();
        return view('backend.HRIS.Leave.Leave.index', compact('ListAllLeave'));
    }
    public function applyLeave()
    {
        //dd('hello');
        $this->shareMenu();
        $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', '2015-5-5 3:30:34');
        $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', '2015-5-5 10:40:34');
        $diff_in_hours = $to->diffInHours($from);
      // dd($diff_in_hours);
        //return $this->leaveRequest();
        return view('backend.HRIS.Leave.Leave.applyLeave');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * Step to apply leave
     * 1 . Add Entitlement for leave
     */
    public function addLeaveEntitlement()
    {


        return response()->json(['Data' => 'successfully']);

    }


    public function viewMyLeaveList()
    {
        $this->shareMenu();

        $all_leave = DB::table('leave_entitlements as l')
            ->join('leave_types as lt', 'l.leave_type_id', '=', 'lt.id')
            ->join('employees as e','l.emp_number','=','e.emp_number')
            ->get();

        //dd($all_leave);
        return view('backend.HRIS.Leave.Leave.my_leave', compact('all_leave'));


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
        $leave_balance = DB::table('leave_entitlements as e')
            ->join('leave_types as t', 'e.leave_type_id', '=', 't.id')
            ->where('e.leave_type_id', $id)
            ->first();
        return response()->json($leave_balance);
    }

    public function DisplayLeaveDetails()
    {


        return response()->json(['Data' => "True"]);
    }


    public function AssignLeave()
    {
        $this->shareMenu();

        return view('backend.HRIS.Leave.Leave.assignLeave');
    }

    public function leaveRequest(Request $request)
    {
        //dd('hello');
         if(Auth::guard('admins')->user()){
             $emp_number = Auth::guard('admins')->user()->id;

             }else{
                    $emp_number = Auth::guard('employees')->user()->id;
             }
         //dd($emp_number);
        if (Auth::guard('admins')->user()) {
            $company_id = Auth::guard('admins')->user()->id;
        } else {
            $company_id = Auth::guard('employee')->user()->id;
        }

        if (Auth::guard('admins')->user()) {
            $name = Auth::guard('admins')->user()->name;
        } else {
            $name = Auth::guard('employee')->user()->email;
        }

        // dd($request->all());
        $time1 = strtotime($request->startdate);
        $time2 = strtotime($request->finishdate);
//        dd($time1,$time2);
        $CheckExistingDateApplyLeave = Leave::where('date', $request->startdate)
            ->orWhere('date', $request->finishdate)
            ->get();
//        dd($CheckExistingDateApplyLeave);
        if (!$CheckExistingDateApplyLeave->isEmpty()) {
//            $this->shareMenu();
//            return view('backend.HRIS.Leave.Leave.applyLeave')->with('warning', 'Workshift Length Exceeded Due To the Following Leave Requests:');
            return redirect('/administration/get-applyLeave')->with('warning', 'Workshift Length Exceeded Due To the Following Leave Requests:');
        }else{
           // dd('hello');
            for ($i = $time1; $i <= $time2; $i = $i + 86400) {
                // $thisDate = date( 'Y-m-d', $i ); // 2010-05-01, 2010-05-02, etc
                $leave_request = new LeaveRequest();
                $leave_request->company_id = $company_id;
                $leave_request->emp_number = $emp_number;
                $leave_request->leave_type_id = $request->leave_type;
                $leave_request->date_applied = \Carbon\Carbon::now();
                $leave_request->save();
                $leave_request_id = $leave_request->id;
                $leave = new Leave();

                $leave->leave_request_id = $leave_request_id;
                $leave->leave_type_id = $request->leave_type;
                $leave->company_id = $company_id;
                $leave->emp_number = $emp_number;
                //Set Haft Day leave
                $allDays = $request->partial_day;
                if($allDays == "1"){

                    $leave->length_hours = $request->duration_half_day;
                    $leave->length_days = $request->duration_morning;
                }
                $LeaveSpecificTime = $request->duration_half_day;
                if($LeaveSpecificTime == "2"){
                    $leave->start_time = $request->duration_from_date;
                    $leave->end_time = $request->duration_to_date;
                      $leave->duration_type =$request->duration_Duration;
                }
                //dd($LeaveSpecificTime);
                ////////////////////StartDay//////////////////////////////
                $allDays = $request->partial_day;
                if($allDays == "2"){

                    $leave->length_hours = $request->start_day;
                    $leave->length_days = $request->start_date_morning;
                }
                $LeaveSpecificTime = $request->start_day;
                if($LeaveSpecificTime == "2"){
                    $leave->start_time = $request->start_day_from_date;
                    $leave->end_time = $request->start_day_to_date;
                    $leave->duration_type =$request->duration_start_Day;
                }

                $allDays = $request->partial_day;
                if($allDays == "3"){

                    $leave->length_hours = $request->end_date;
                    $leave->length_days = $request->end_date_morning;
                }
                $LeaveSpecificTime = $request->end_date;
                if($LeaveSpecificTime == "2"){
                    $leave->start_time = $request->End_Day_fromDate;
                    $leave->end_time = $request->End_Day_ToDate;
                    $leave->duration_type =$request->duration_end_date;
                }
                $leave->created_by_name =$name;
                $leave->status = 1;
                $leave->comment = $request->comments;
                $leave->date = date('Y-m-d', $i);
                $leave->save();
                // dd( $time2 -  $time1);
            }
//        $now = time(); // or your date as well
//        $your_date = strtotime("2010-01-01");
            $datediff = $time2 - $time1;
            $result =  round($datediff / (60 * 60 * 24)+1);
            $leaveEntitlement = LeaveEntitlement::findOrFail($leave->leave_type_id);
            $leaveEntitlement->day_used = $result;
            $leaveEntitlement->save();
        }
        return redirect('/administration/get-applyLeave')->with('success', 'Leave has been requested');


        //dd('hello');
    }

//    public  function dateDiffInDays($time1, $time2)
//    {
//        $time1 = strtotime(input::get('startdate'));
//        $time2 = strtotime(input::get('finishdate'));
//        // Calulating the difference in timestamps
//        $diff = strtotime($time2) - strtotime($time1);
//
//        // 1 day = 24 hours
//        // 24 * 60 * 60 = 86400 seconds
//        return abs(round($diff / 86400));
//    }


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
