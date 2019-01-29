<?php

namespace App\Http\Controllers\Backend;
use App\Employee;
use App\Http\Controllers\Controller;

use App\PerformanceTrack;
use App\PerformanceTrackerLog;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerformanceTrackerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $p = DB::table('tbl_hr_performance_track as p')
            ->select('tracker_name', DB::raw('count(*) as total'))
            ->groupBy('tracker_name')
            ->get();

//        dd($p);

       // dd($p);
        //dd($user_info);
        return view('backend.HRIS.performance.trackers.index',compact('p'));
    }

        public function addPerformanceTrackerLog()
        {

            $t = PerformanceTrackerLog::all();
            //dd($t);
            return view('backend.HRIS.performance.TrackerLog.index',compact('t'));

        }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.HRIS.performance.trackers.create');

    }
    public function employeeTracker(){

        $p = DB::table('tbl_hr_performance_track as p')
            ->select('tracker_name', DB::raw('count(*) as total'))
            ->groupBy('tracker_name')
            ->get();
        //dd($p);
        return view('backend.HRIS.performance.EmployeeTracker.index',compact('p'));

    }
    public function viewMyPerformanceTrackerList(){
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
        if ($request->duallistbox_demo1)
            foreach($request->duallistbox_demo1 as $subject)
            {
                $forumTeacher= new PerformanceTrack(); // I think this is your intermediat, pivot, table
                $forumTeacher->tracker_name = $request->name; // you should know how to find this id
                $forumTeacher->employee_id= $subject;
                $forumTeacher->save();
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

        $employee = Employee::where('emp_id', '!=', $id)->get();


        return Response()->json(["success" => true, "data" => $employee]);

    }
}
