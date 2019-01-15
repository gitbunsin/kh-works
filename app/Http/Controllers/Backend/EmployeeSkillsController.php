<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\EmployeeSkills;
use App\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class EmployeeSkillsController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = new EmployeeSkills();
        $data->skill_id = $request->skill_id;
        $data->years_of_exp = $request->years_of_exp;
        $data->comments = $request->comments;
        $data->save();
        $data = DB::table('tbl_hr_emp_skill as es')
            ->join('tbl_skill as s','es.skill_id','=','s.id')
            ->where('s.id',$request->skill_id)
            ->first();
        return response()->json($data);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($emp_skill_id)
    {

        $EmployeeSkill = EmployeeSkills::findOrFail($emp_skill_id);
        return response()->json($EmployeeSkill);

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
    public function update(Request $request, $emp_skill_id)
    {
//        $EmployeeSkill = EmployeeSkills::findOrFail($emp_skill_id);
        $EmployeeSkill = DB::table('tbl_hr_emp_skill as es')
            ->join('tbl_skill as s','es.skill_id','=','s.id')
            ->where('es.id',$emp_skill_id)
            ->get();
//        dd($EmployeeSkill);
        $EmployeeSkill->skill_id = $request->skill_id;
        $EmployeeSkill->years_of_exp = $request->years_of_exp;
        $EmployeeSkill->emp_number = Auth::guard('employee')->user()->id;
        $EmployeeSkill->comments = $request->comments;
        $EmployeeSkill->save();

        return response()->json($EmployeeSkill);
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
