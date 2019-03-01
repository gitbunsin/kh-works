<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\PerformanceTrackerLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerformanceTrackerLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // dd('hell');
        $t = PerformanceTrackerLog::all();
//        $t = DB::table('tbl_performance_tracker_log as p')
//            ->select('p.*','e.*')
//            ->join('employees as e','p.employee_id','=','e.emp_id')
//            ->get();
//        dd($t);
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
        $l = new PerformanceTrackerLog();
        $l->log = $request->log;
        $l->employee_id = Auth::guard('employee')->user()->id;
        $l->achievement = $request->achievement;
        $l->save();
        return redirect('administration/performance-tracker-log');
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
