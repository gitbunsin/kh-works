<?php

namespace App\Http\Controllers\Backend;
use employeesMembership;
use App\Http\Controllers\Controller;

use App\Subunit;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaveAdjustmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }
    public function viewMatchEmployee()
    {

        $e = DB::table('employees')->count(DB::raw('DISTINCT emp_id'));
        return Response()->json($e);

    }
    public function viewLeaveEntitlements()
    {

        $leave_entitlement = DB::table('tbl_hr_leave_entitlement as e')
            ->select('e.*','l.*')
            ->join('tbl_hr_leave_entitlement_type as l','e.adjustment_type','=','l.id')
            ->get();
        return view('backend.HRIS.Leave.Entitlement.employee_entitlement',compact('leave_entitlement'));
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
