<?php

namespace App\Http\Controllers\Backend;
use App\EmployeeEmergencyContacts;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeEmergencyContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $EmergencyContact = DB::table('tbl_hr_emp_emergency_contacts as c')
                        ->join('tbl1_hr_employee as e','c.emp_number','=','e.emp_id')
                        ->get();
//        dd($EmergencyContact);

        return view('backend.HRIS.PIM.Employee.emergency',compact('EmergencyContact'));
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
        $emergency = new EmployeeEmergencyContacts();
        $emergency->eec_name = $request->eec_name;
        $emergency->emp_number = Auth::guard('employee')->user()->id;
        $emergency->eec_relationship = $request->eec_relationship;
        $emergency->eec_home_no = $request->eec_home_no;
        $emergency->eec_mobile_no = $request->eec_mobile_no;
        $emergency->eec_office_no = $request->eec_office_no;
        $emergency->save();
        return response()->json($emergency);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($emergency_id)
    {

        $EmergencyContact = EmployeeEmergencyContacts::findOrFail($emergency_id);
        return response()->json($EmergencyContact);
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
    public function update(Request $request, $emergency_id)
    {
        $emergency = EmployeeEmergencyContacts::findOrFail($emergency_id);
        $emergency->eec_name = $request->eec_name;
        $emergency->eec_relationship = $request->eec_relationship;
        $emergency->eec_home_no = $request->eec_home_no;
        $emergency->eec_mobile_no = $request->eec_mobile_no;
        $emergency->eec_office_no = $request->eec_office_no;
        $emergency->save();
        return response()->json($emergency);
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
