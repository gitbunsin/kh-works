<?php

namespace App\Http\Controllers\Backend;
use App\Helper\AppHelper;
use App\Helper\MenuHelper;
use App\Model\Backend\EmployeeLicense;
use \App\Model\EmployeeEducation;
use App\Model\EmployeeLanguage;
use \App\Model\EmployeeWorkExperience;
use App\Http\Controllers\Controller;

use App\Model\License;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QualificationController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->shareMenu();
        $EmployeeSkill = DB::table('employee_skills as es')
            ->select('es.*','s.*','es.id as employee_skill_id')
            ->join('skills as s','es.skill_id','=','s.id')
            ->get();
//        dd($employee_skill);\
        $EmployeeEducation = DB::table('employee_educations as e')
                                ->join('education as ed','e.education_id','=','ed.id')
                                ->get();
//        dd($e);
        $EmployeeWorkExperience = EmployeeWorkExperience::all();
        $EmployeeLanguage = EmployeeLanguage::with('language')->get();
        $license = EmployeeLicense::with('license')->get();
        return view('backend.HRIS.PIM.Employee.qualification',compact(
            'EmployeeWorkExperience','EmployeeEducation',
            'EmployeeSkill',
            'EmployeeLanguage',
            'license'
        ));

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
