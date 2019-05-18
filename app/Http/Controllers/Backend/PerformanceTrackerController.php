<?php

namespace App\Http\Controllers\Backend;
use App\Model\Employee;
use App\Http\Controllers\Controller;

use App\Model\PerformanceTrack;
use App\PerformanceTrackerLog;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PerformanceTrackerController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->shareMenu();
        $PerformanceTrack = DB::table('performance_tracks as p')
            ->select('p.*','e.*')
            ->join('employees as e','p.emp_number','=','e.emp_number')
            ->get();
        return view('backend.HRIS.performance.trackers.index',compact('PerformanceTrack'));
    }

        public function addPerformanceTrackerLog()
        {
            $this->shareMenu();
           // $t = PerformanceTrackerLog::all();
            //dd($t);
            return view('backend.HRIS.performance.TrackerLog.index');

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
        return view('backend.HRIS.performance.trackers.create');

    }
    public function employeeTracker(){
        $this->shareMenu();

//        $p = DB::table('tbl_hr_performance_track as p')
//            ->select('p.*','e.*')
//            ->join('employees as e','p.employee_id','=','e.emp_number')
//            ->get();
        //dd($p);
        return view('backend.HRIS.performance.EmployeeTracker.index');

    }
    public function viewMyPerformanceTrackerList(){
        $this->shareMenu();
        return view('backend.HRIS.performance.MyTracker.index');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

           // dd($request->all());

//        $employeeId = $request->duallistbox_demo1;
//        dd($employeeId);
//            foreach ($employeeId as $data)
//            {
//                $p = new PerformanceTrack();
//                $p->tracker_name = $request->name;
//                $p->employee_id = $data;
//            }
//        $p->save();
        if(Auth::guard('admins')->user()){
            $Orgazation_Code = Auth::guard('admins')->user()->id;
        }else{
            $Orgazation_Code = Auth::guard('employees')->user()->company_id;
        }
        if ($request->duallistbox_demo1)
            foreach($request->duallistbox_demo1 as $subject)
            {
                $PerformanceTrack= new PerformanceTrack(); // I think this is your intermediat, pivot, table
                $PerformanceTrack->tracker_name = $request->name; // you should know how to find this id
                $PerformanceTrack->emp_number= $subject;
                $PerformanceTrack->added_date = Carbon::now();
                $PerformanceTrack->Organization_Code = $Orgazation_Code;
                $PerformanceTrack->save();

            }
        return redirect('/administration/employee-performance-trackers')->with('success','Item added successfully');

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
        $this->shareMenu();
        return view('backend.HRIS.performance.trackers.edit');

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

    /**
     * Get all employee where no Employee that as tracker
     * @param $id employee tracker id
     *
     * @return json
     */
    public function getEmployeeNoTrakerEmp($id) {

        $employee = Employee::where('emp_number', '!=', $id)->get();
        return Response()->json(["success" => true, "data" => $employee]);

    }
}
