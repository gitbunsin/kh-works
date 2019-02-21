<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\LeavePeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Sodium\compare;

class LeavePeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->listLeavePeriod();
    }

    public function listLeavePeriod(){
        $p = DB::table('tbl_hr_leave_period_history')->get();
        $userId = Auth::guard('admins')->user()->id;
        $FindLeavePeriod = LeavePeriod::where('company_id', '=', $userId)->orderBy('id', 'desc')->first();
        $checkStatusLeavePeriod = '';
        if($FindLeavePeriod){
            $checkStatusLeavePeriod = "true";
        }
        else{
            $checkStatusLeavePeriod = "false";
        }
        return view('backend.HRIS.Leave.LeavePeriod.create')->with(['getLastPeriod'=>$FindLeavePeriod, 'status'=> $checkStatusLeavePeriod, 'success'=>'item are successfully added!']);
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
        $p = new LeavePeriod();
        $p->leave_period_start_month = $request->bmonth;
        $p->leave_period_start_day = $request->bday;
        $p->company_id = Auth::guard('admins')->user()->id;
        $p->save();
        return redirect('/administration/define-leave-period');
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
