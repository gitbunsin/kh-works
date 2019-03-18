<?php

namespace  App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\License;
use App\Model\Backend\EmployeeLicense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeLicenseController extends BackendController
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->shareMenu();
        return view('backend.HRIS.PIM.Employee.license.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(Auth::guard('admins')->user()){
            $company_id = Auth::guard('admins')->user()->id;
        }else{
            $company_id = Auth::guard('employee')->user()->company_id;
        }
        $l = new EmployeeLicense();
        $l->company_id = $company_id;
        $l->employee_id = $company_id;
        $l->licenseType_id = $request->license_type_id;
        $l->license_number = $request->license_number;
        $l->issued_date = \Carbon\Carbon::parse($request->issued_date);
        $l->expiry_date = \Carbon\Carbon::parse($request->expiry_date);

        $l->save();
//        $l = DB::table('tbl_hr_license as es')
//            ->join('tbl_licenseType as s','es.licenseType_id','=','s.id')
//            ->where('s.id',$request->licenseType_id)
//            ->first();
//        return response()->json($l);
        return redirect('/administration/employee-qualification')->with('success','Item has been added successfully');
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
        $lx = EmployeeLicense::findOrFail($id);
        return view('backend.HRIS.PIM.Employee.license.edit',compact('lx'));

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
        if(Auth::guard('admins')->user()){
            $company_id = Auth::guard('admins')->user()->id;
        }else{
            $company_id = Auth::guard('employee')->user()->company_id;
        }
        $l = EmployeeLicense::findOrFail($id);
        $l->company_id = $company_id;
        $l->employee_id = $company_id;
        $l->licenseType_id = $request->license_type_id;
        $l->license_number = $request->license_number;
        $l->issued_date = \Carbon\Carbon::parse($request->issued_date);
        $l->expiry_date = \Carbon\Carbon::parse($request->expiry_date);

        $l->save();
//        $l = DB::table('tbl_hr_license as es')
//            ->join('tbl_licenseType as s','es.licenseType_id','=','s.id')
//            ->where('s.id',$request->licenseType_id)
//            ->first();
//        return response()->json($l);
        return redirect('/administration/employee-qualification')->with('success','Item has been edited successfully');
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
