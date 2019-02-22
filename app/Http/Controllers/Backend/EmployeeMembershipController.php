<?php

namespace App\Http\Controllers\Backend;
use App\EmployeeMembership;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeMembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::guard('admins')->user()){
            $employee_log = Auth::guard('admins')->user()->id;
        }else{
            $employee_log = Auth::guard('employee')->user()->id;
        }
        $m = DB::table('tbl_hr_emp_memeber_detail as m')
                        ->join('tbl_membership as c','m.membership_code','=','c.id')
                        ->join('tbl_currency_type as t','m.ememb_subs_crrency','=','t.currency_id')
                        ->where('m.id',$employee_log)
                        ->get();
//        dd($m);
        return view('backend.HRIS.PIM.Employee.Membership.index',compact('m'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.HRIS.PIM.Employee.Membership.create');
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
        $m = new EmployeeMembership();
        $m->company_id = Auth::guard('admins')->user()->id;
        $m->membership_code = $request->membership_id;
        $m->ememb_subscript_amount = $request->sub_amount;
        $m->ememb_subs_crrency = $request->currency_id;
        $m->ememb_commence_date =  Carbon::parse($request->ememb_commence_date);
        $m->ememb_renewal_date = Carbon::parse($request->ememb_renewal_date);
        $m->save();

        return redirect('/administration/view-membership')->with('success','Item has been added successfully');
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
        if(Auth::guard('admins')->user()){
            $comployee_log = Auth::guard('admins')->user()->id;
        }else{
            $employee_log = Auth::guard('employee')->user()->id;
        }
        $m = DB::table('tbl_hr_emp_memeber_detail as m')
            ->join('tbl_membership as c','m.membership_code','=','c.id')
            ->join('tbl_currency_type as t','m.ememb_subs_crrency','=','t.currency_id')
            ->where('m.id',$comployee_log)
            ->where('m.id',$id)
            ->first();
        return view('backend.HRIS.PIM.Employee.Membership.edit',compact('m'));
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
        $m = EmployeeMembership::findOrFail($id);
        $m->company_id = Auth::guard('admins')->user()->id;
        $m->membership_code = $request->membership_id;
        $m->ememb_subscript_amount = $request->sub_amount;
        $m->ememb_subs_crrency = $request->currency_id;
        $m->ememb_commence_date =  Carbon::parse($request->ememb_commence_date);
        $m->ememb_renewal_date = Carbon::parse($request->ememb_renewal_date);
        $m->save();
        return redirect('/administration/view-membership')->with('success','Item as has been edited');
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
