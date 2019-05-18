<?php

namespace  App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Model\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeContactController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->shareMenu();
//        if(Auth::guard('employee')->user())
//        {
//            $EmployeeID = Auth::guard('employee')->user()->id;
//        }else{
//
//            $listCompanyEmployee = Employee::where('emp_number',Auth::guard('admins')->user()->id)->first();
//            $EmployeeID = $listCompanyEmployee->emp_number;
//
//        }
        $EmployeeContactDetails = Employee::first();
        //dd($EmployeeContactDetails);
        return view('backend.HRIS.PIM.Employee.Contact.index',compact('EmployeeContactDetails'));

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

        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

//        $employee = Employee::findOrFail($id);
//        $employee->emp_street1 = $request->emp_street1;
//        $employee->emp_street2 = $request->emp_street2;
//        $employee->city_code = $request->city_code;
//        $employee->provin_code = $request->provin_code;
//        $employee->emp_zipcode = $request->emp_zipcode;
//        $employee->coun_code = $request->coun_code;
//        $employee->emp_hm_telephone = $request->emp_hm_telephone;
//        $employee->emp_mobile = $request->emp_mobile;
//        $employee->emp_work_telephone = $request->emp_work_telephone;
//        $employee->emp_work_email = $request->emp_work_email;
//        $employee->emp_oth_email = $request->emp_oth_email;

        $employee->save();
        return redirect('/administration/employee-contact-details')->with('success','Contact been edit successfully');

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
