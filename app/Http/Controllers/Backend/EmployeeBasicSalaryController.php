<?php

namespace App\Http\Controllers\Backend;

use App\Model\EmployeeBasicSalary;
use const http\Client\Curl\AUTH_ANY;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeBasicSalaryController extends BackendController
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
        $BasicSalary = EmployeeBasicSalary::with(['employee','paygrade','payPeriod','currency'])->get();
//        dd($BasicSalary);
        return view('backend.HRIS.PIM.Employee.Salary.index',compact('BasicSalary'));
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
        return view('backend.HRIS.PIM.Employee.Salary.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $BasicSalary = new EmployeeBasicSalary();
        $BasicSalary->company()->associate(Auth::guard('admins')->user()->id);
        $BasicSalary->employee()->associate(Auth::guard('admins')->user()->id);
        $BasicSalary->paygrade()->associate($request->pay_grade);
        $BasicSalary->payPeriod()->associate($request->Payperiod);
        $BasicSalary->currency()->associate($request->currency);
        $BasicSalary->salary_component = $request->SalaryComponent;
        $BasicSalary->ebsal_basic_salary = $request->ebsal_basic_salary;
        $BasicSalary->comments = $request->comment;

        $BasicSalary->save();
        return redirect('/administration/employee-salary')->with('success','Item has been successfully');

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
        $BasicSalary = EmployeeBasicSalary::find($id);
        return view('backend.HRIS.PIM.Employee.Salary.edit',compact('BasicSalary'));

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
        //dd('hello');
        //
        //dd('hello');
        if(Auth::guard('admins')->user()){
            $OrganizationCode = Auth::guard('admins')->user()->id;
        }else{
            $OrganizationCode = Auth::guard('employee')->user()->company_id;
        }
        $BasicSalary = EmployeeBasicSalary::findOrFail($id);
        $BasicSalary->organization_code =  $OrganizationCode;
        $BasicSalary->emp_number = $OrganizationCode;
        $BasicSalary->sal_grd_code = $request->pay_grade;
        $BasicSalary->currency_id = $request->currency;
        $BasicSalary->payperiod_code = $request->Payperiod;
        $BasicSalary->ebsal_basic_salary = $request->ebsal_basic_salary;
        $BasicSalary->salary_component = $request->SalaryComponent;
        $BasicSalary->comments = $request->comment;

        $BasicSalary->save();
        return redirect('/administration/employee-salary')->with('success','Item has been edited successfully');
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
