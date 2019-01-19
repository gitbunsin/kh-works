<?php

namespace App\Http\Controllers\Backend;
use App\Education;
use App\EmployeeEducation;
use App\EmployeeWorkExperience;
use App\Http\Controllers\Controller;

use App\License;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QualificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee_skill = DB::table('tbl_hr_emp_skill as es')
            ->select('es.*','s.*','es.id as employee_skill_id')
            ->join('tbl_skill as s','es.skill_id','=','s.id')
            ->get();
//        dd($employee_skill);\
        $employee_education = EmployeeEducation::all();
//        dd($e);
        $employee_experience = EmployeeWorkExperience::all();
        return view('backend.HRIS.PIM.Employee.qualification'
                ,["employee_skill"=>$employee_skill,"employee_experience"=>$employee_experience
                ,"employee_education"=>$employee_education
                ,"license"=>License::all(),
                "language"=>DB::table('tbl_hr_emp_language as l')->join('tbl_language as lg','l.lang_id',"=","lg.id")->get(),
            ]

        );

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
