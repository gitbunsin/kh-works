<?php

namespace App\Http\Controllers\Backend;
use App\Helper\AppHelper;
use App\Helper\MenuHelper;
use App\Http\Controllers\Controller;

use App\Model\Employee;
use App\Model\EmployeeReportto;
use App\Model\ReportingMethod;
use App\Model\ReportingMethods;
use App\ReportingTo;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class EmployeeReportController extends BackendController
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
        $ListEmpSup = ReportingMethod::with('employees')->get();
//        dd($ListEmpSup->employees());

        return view('backend.HRIS.PIM.Employee.ReportingTo.index',compact('ListEmpSup'));
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
        return view('backend.HRIS.PIM.Employee.ReportingTo.create');

    }

    public function displayAttendanceSummaryReport(){


        $this->shareMenu();
        return view('backend.HRIS.PIM.Employee.ReportingTo.summary');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd('hello');

        $Reporting = new EmployeeReportto();
        $Reporting->employee_emp_number = $request->employee_emp_number;
        $Reporting->reporting_method_id = $request->reporting_method_id;

        $Reporting->save();

        return redirect('/administration/view-ReportTo-details')->with('success','Item added Successfully');
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
        $r = EmployeeReportto::find($id);

        return view('backend.HRIS.PIM.Employee.ReportingTo.edit',compact('r'));

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
        $Reporting = EmployeeReportto::findOrFail($id);
        $Reporting->erep_sup_emp_number = $request->supervisor_id;
        $Reporting->company_id = Auth::guard('admins')->user()->id;
        $Reporting->erep_reporting_method = $request->reporting_id;
        $Reporting->save();
        return redirect('/administration/view-ReportTo-details')->with('success','Item added Successfully');
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
