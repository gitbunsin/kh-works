<?php

namespace App\Http\Controllers\Backend;
use App\Helper\AppHelper;
use App\Helper\MenuHelper;
use App\Http\Controllers\Controller;

use App\Model\EmployeeEmergencyContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeEmergencyContactController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->shareMenu();
        $ListEmployeeEmergencyContact = DB::table('employee_emergency_contacts as ec')
                ->join('employees as e','ec.emp_number','=','e.emp_number')
            ->get();

        return view('backend.HRIS.PIM.Employee.Emergency.index',compact('ListEmployeeEmergencyContact'));
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
        return view('backend.HRIS.PIM.Employee.Emergency.create');
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
           $employeeID =  Auth::guard('admins')->user()->id;
        }else{

            $employeeID = Auth::guard('employee')->user()->company_id;
        }
        $emergency = new EmployeeEmergencyContact();
        $emergency->eec_name = $request->name;
        $emergency->emp_number = $employeeID;
        $emergency->eec_home_no = $request->home_telephone;
        $emergency->eec_mobile_no = $request->mobile;
        $emergency->eec_office_no = $request->work_telephone;
        $emergency->save();
        return redirect('/administration/employee-emergency-contact/');
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
        $this->shareMenu();
//        $e = DB::table('tbl_hr_emp_emergency_contacts as e')
//                        ->select('e.*','r.*','e.id as emergency_id')
//                        ->join('tbl_relationship as r','e.relationship_id',"=",'r.id')
//                        ->where('e.id',$id)
//                        ->first();
//        dd($e);
        return view('backend.HRIS.PIM.Employee.Emergency.edit');

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

        $emergency = EmployeeEmergencyContacts::findOrFail($id);
        $emergency->eec_name = $request->name;
        $emergency->emp_number = Auth::guard('employee')->user()->id;
        $emergency->relationship_id = $request->relationship_id;
        $emergency->eec_home_no = $request->home_telephone;
        $emergency->eec_mobile_no = $request->mobile;
        $emergency->eec_office_no = $request->work_telephone;
        $emergency->save();

        return redirect('/administration/employee-emergency-contact');
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
