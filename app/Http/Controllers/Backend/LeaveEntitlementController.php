<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\LeaveEntitlement;
use App\Subunit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveEntitlementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $categories = Subunit::where('parent_id', '=', 0)->get();
        $allCategories = Subunit::pluck('title','id')->all();
        return view('backend.HRIS.Leave.Entitlement.index',compact('allCategories','categories'));

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
        $e = New LeaveEntitlement();
        $e->employee_id = $request->employee_entitlement;
        $e->company_id = Auth::guard('admins')->user()->id;
        $e->created_by_name = Auth::guard('admins')->user()->name;
        $e->leave_type_id = $request->leave_type;
        $e->adjustment_type = 1;
        $e->no_of_day = $request->entitlements_day;
        $e->save();
        return redirect('/administration/view-leave-entitlements')->with('success','Item has been added successfully');
//        $e->employee_id =
        //dd('hello');
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
