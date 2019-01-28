<?php

namespace App\Http\Controllers\Backend;
use App\Employee;
use App\Http\Controllers\Controller;

use App\PerformanceTrack;
use http\Env\Response;
use Illuminate\Http\Request;

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
        return view('backend.HRIS.performance.trackers.index');
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

        return view('backend.HRIS.performance.trackers.index');
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
        $p = new PerformanceTrack();
        $p->tracker_name = $request->name;
        $employeeId = $request->duallistbox_demo1;
        dd($employeeId);
            foreach ($employeeId as $data)
            {
                $p->employee_id = $data;
            }
        $p->save();
        return redirect('/administration/employee-performance-trackers');

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
