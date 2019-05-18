<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Model\EmployeeSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class EmployeeSkillsController extends BackendController
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

        $this->shareMenu();
        return view('backend.HRIS.PIM.Employee.skill.create');
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
            $company_id = Auth::guard('admins')->user()->id;
        }else{
            $company_id = Auth::guard('employee')->user()->company_id;
        }
        $data = new EmployeeSkill();
        $data->skill_id = $request->skills;
        $data->years_of_exp = $request->year_of_experience;
        $data->comments = $request->comments;
        $data->save();
//        $data = DB::table('tbl_hr_emp_skill as es')
//            ->join('tbl_skill as s','es.skill_id','=','s.id')
//            ->where('s.id',$request->skill_id)
//            ->first();
        //return response()->json($data);
        //
        return redirect('/administration/employee-qualification')->with('success','Item has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($skill_id)
    {

        $data = EmployeeSkill::findOrFail($skill_id);
        return response()->json($data);
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
        $s = EmployeeSkill::findOrFail($id);
        return view('backend.HRIS.PIM.Employee.skill.edit',compact('s'));
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
        //dd($request->all());

        if(Auth::guard('admins')->user()){
            $company_id = Auth::guard('admins')->user()->id;
        }else{
            $company_id = Auth::guard('employee')->user()->company_id;
        }
        $data = EmployeeSkill::findOrFail($id);
        $data->skill_id = $request->skills;
        $data->years_of_exp = $request->year_of_experience;
        $data->comments = $request->comments;
        $data->save();
//        $data = DB::table('tbl_hr_emp_skill as es')
//            ->join('tbl_skill as s','es.skill_id','=','s.id')
//            ->where('s.id',$request->skill_id)
//            ->first();
        //return response()->json($data);
        //
        return redirect('/administration/employee-qualification')->with('success','Item has been edited successfully');
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
