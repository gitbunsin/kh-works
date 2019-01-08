<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\EmployeeWorkExperience;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $employeeExperience = EmployeeWorkExperience::all();
//        dd($employeeExperience);
        return view('backend.HRIS.PIM.Employee.details',compact('employeeExperience'));

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
        $emp_experience = new EmployeeWorkExperience();
        $emp_experience->eexp_employer = $request->eexp_employer;
        $emp_experience->eexp_jobtit = $request->eexp_jobtit;
        $emp_experience->eexp_from_date =\Carbon\Carbon::parse($request->eexp_from_date)->format('Y-m-d');
        $emp_experience->eexp_to_date = \Carbon\Carbon::parse($request->eexp_to_date)->format('Y-m-d');
        $emp_experience->eexp_comments = $request->eexp_comments;

        $emp_experience->save();

        return response()->json($emp_experience);
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $emp_work_id)
    {
        //
//        dd($request->all());
        $emp_experience = EmployeeWorkExperience::findOrFail($emp_work_id);
        $emp_experience->eexp_employer = $request->eexp_employer;
        $emp_experience->eexp_jobtit = $request->eexp_jobtit;
        $emp_experience->eexp_from_date =\Carbon\Carbon::parse($request->eexp_from_date);
        $emp_experience->eexp_to_date = \Carbon\Carbon::parse($request->eexp_to_date);

        $emp_experience->eexp_comments = $request->eexp_comments;

        $emp_experience->save();

        return response()->json($emp_experience);

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
