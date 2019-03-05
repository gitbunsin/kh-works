<?php

namespace App\Http\Controllers\Backend;
use App\Helper\AppHelper;
use App\Helper\MenuHelper;
use App\Http\Controllers\Controller;

use App\Leave;
use App\LeaveRequest;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class LeaveController
 * @package App\Http\Controllers\Backend
 */
class LeaveController extends Controller
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

        //
        $menus = MenuHelper::getInstance()->getSidebarMenu(AppHelper::getInstance()->getRoleID(), AppHelper::getInstance()->getCompanyId());
        return view('backend.HRIS.Leave.Leave.index',compact('menus'));
    }
    public function applyLeave()
    {

        // Specify the start date. This date can be any English textual format

//        $startTime = strtotime( '2010-05-01 12:00' );
//        $endTime = strtotime( '2010-05-10 12:00' );
//        dd($startTime, $endTime);

//        date_default_timezone_set('UTC');
//
//        $start_date = '2019-02-21';
//        $end_date = '2019-03-23';
//
//        while (strtotime($start_date) <= strtotime($end_date)) {
//            echo $start_date;
//            $start_date = date ("Y-m-d", strtotime("+1 days", strtotime($start_date)));
//        }
       // $menus = MenuHelper::getInstance()->getSidebarMenu(AppHelper::getInstance()->getRoleID(), AppHelper::getInstance()->getCompanyId());

        return view('backend.HRIS.Leave.Leave.applyLeave',compact('menus'));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * Step to apply leave
     * 1 . Add Entitlement for leave
     */
    public function addLeaveEntitlement(){



        return response()->json(['Data'=>'successfully']);

    }
    public function viewMyLeaveEntitlements(){
        $leave_entitlement = DB::table('leave_entitlements as e')->get();
//            ->select('e.*','l.*')
//            ->join('leave_entitlement_types as l','e.adjustment_type','=','l.id')
//            ->get();
        return view('backend.HRIS.Leave.Entitlement.my_entitlement',compact('leave_entitlement'));
    }
    public function viewMyLeaveList()
    {

        $all_leave = DB::table('leave_requests as l')
            ->join('leave_types as lt','l.leave_type_id','=','lt.id')
            ->get();
        $menus = MenuHelper::getInstance()->getSidebarMenu(AppHelper::getInstance()->getRoleID(), AppHelper::getInstance()->getCompanyId());
        return view('backend.HRIS.Leave.Leave.my_leave',compact('all_leave','menus'));


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


        $menus = MenuHelper::getInstance()->getSidebarMenu(AppHelper::getInstance()->getRoleID(), AppHelper::getInstance()->getCompanyId());
        return view('backend.HRIS.Leave.Leave.leave_report',compact('menus'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function requestLeaveBalance($id)
    {
        $leave_balance = DB::table('leave_entitlements')->get();
//                 ->join('leave_types as t','e.leave_types_id','=','t.id')
//                ->where('e.leave_type_id',$id)
//                ->first();
        return response()->json($leave_balance);
    }
    public function assginLeave()
    {
        $menus = MenuHelper::getInstance()->getSidebarMenu(AppHelper::getInstance()->getRoleID(), AppHelper::getInstance()->getCompanyId());
        return view('backend.HRIS.Leave.Leave.assignLeave',compact('menus'));
    }
    public function leaveRequest(Request $request){



       // dd($request->all());


        $time1  = strtotime($request->startdate);
        $time2 = strtotime($request->finishdate);

        for ( $i = $time1; $i <= $time2; $i = $i + 86400 ) {
           // $thisDate = date( 'Y-m-d', $i ); // 2010-05-01, 2010-05-02, etc

            if(Auth::guard('admins')->user()){
                $company_id = Auth::guard('admins')->user()->id;
            }else{
                $company_id = Auth::guard('employee')->user()->id;
            }

            $leave_request = new LeaveRequest();
            $leave_request->company_id = $company_id;
            $leave_request->employee_id = 1 ;
            $leave_request->leave_type_id = $request->leave_type;
            $leave_request->comments = $request->comment;
            $leave_request->date_applied = \Carbon\Carbon::now();
            $leave_request->save();
            $leave_request_id = $leave_request->id;
            $leave = new Leave();
            $leave->leave_request_id = $leave_request_id;
            $leave->leave_type_id = $request->leave_type;
            $leave->length_hours = 8;
            $leave->length_days = 1;
            $leave->status = 1;
            $leave->comments = $request->comments;
            $leave->date = date( 'Y-m-d', $i );
            $leave->save();

        }
        //dd($time1);

//        $begin = new DateTime($time1);
//        $end = new DateTime($time2);
//
//        $interval = DateInterval::createFromDateString('1 day');
//        $period = new DatePeriod($begin, $interval, $end);
//
//
//
//        foreach ($period as $dt) {
//
//

//        }
//        $leave->save();

// Loop between timestamps, 24 hours at a time


//
//        if($firstDate){
//
////            $leave->start_time  = $request->start_time ;
////            $leave->end_time = $request->end_time;
//            $leave->duration_type = $request->duration_type ;
//            $leave->save();
//            $leave_id = $leave->id;
//            if($toDate){
//                $leave->id = $leave_id;
//                $leave->date = $toDate;
//                $leave->length_hours = 8;
//                $leave->length_days = 1;
//                $leave->status = 1;
//                $leave->comments = $request->comments;
//                $leave->leave_request_id = $request->$leave_request_id;
//                $leave->employee_id = 1;
////            $leave->start_time  = $request->start_time ;
////            $leave->end_time = $request->end_time;
//                $leave->duration_type = $request->duration_type ;
//                $leave->save();
//            }
//        }



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
