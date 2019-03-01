<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use \App\Model\EmployeeWorkExperience;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeWorkExperienceController extends Controller
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
            $company_id = Auth::guard('admins')->user()->id;
        }else{
            $company_id = Auth::guard('employee')->user()->company_id;
        }
        $employeeExperience = EmployeeWorkExperience::where('id',$company_id);
//        dd($employeeExperience);
        return view('backend.HRIS.PIM.Employee.qualification',compact('employeeExperience'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.HRIS.PIM.Employee.WorkExperiense.create');

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
        if(Auth::guard('admins')->user()){
            $company_id = Auth::guard('admins')->user()->id;
        }else{
            $company_id = Auth::guard('employee')->user()->company_id;
        }
        $emp_experience = new EmployeeWorkExperience();
        $emp_experience->eexp_employer = $request->company;
        $emp_experience->company_id = $company_id;
        $emp_experience->eexp_jobtit = $request->job_titles;
        $emp_experience->eexp_from_date =\Carbon\Carbon::parse($request->from_date)->format('Y-m-d');
        $emp_experience->eexp_to_date = \Carbon\Carbon::parse($request->to_date)->format('Y-m-d');
        $emp_experience->eexp_comments = $request->comment;

        $emp_experience->save();
        return redirect('/administration/employee-qualification')->with('success','Item has been added successfully');

//        return response()->json($emp_experience);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($emp_work_id)
    {
        //
        $EmergencyContact = EmployeeWorkExperience::findOrFail($emp_work_id);
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
        $w = EmployeeWorkExperience::findOrFail($id);
        return view('backend.HRIS.PIM.Employee.WorkExperiense.edit',compact('w'));
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
        $emp_experience = EmployeeWorkExperience::findOrFail($id);
        $emp_experience->eexp_employer = $request->company;
        $emp_experience->company_id = $company_id;
        $emp_experience->eexp_jobtit = $request->job_titles;
        $emp_experience->eexp_from_date =\Carbon\Carbon::parse($request->from_date)->format('Y-m-d');
        $emp_experience->eexp_to_date = \Carbon\Carbon::parse($request->to_date)->format('Y-m-d');
        $emp_experience->eexp_comments = $request->comment;

        $emp_experience->save();
        return redirect('/administration/employee-qualification')->with('success','Item has been edited successfully');

        //return response()->json($emp_experience);

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
