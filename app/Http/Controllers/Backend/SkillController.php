<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $skill = Skill::all();
        return view('backend.HRIS.admin.Qualifications.Skills.index',compact('skill'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.HRIS.admin.Qualifications.Skills.create');
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
//        dd($request->all());
        $skill = new Skill();
        $skill->company_id = Auth::guard('admins')->user()->id;
        $skill->name = $request->name;
        $skill->description = $request->description;
        $skill->save();
        return redirect('/administration/skills');

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
        $skills = Skill::where('id',$id)->first();
//        dd($skills);
        return view('backend.HRIS.admin.Qualifications.Skills.edit',compact('skills'));
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
        $skill = Skill::findOrFail($id);
        $skill->company_id = Auth::guard('admins')->user()->id;
        $skill->name = $request->name;
        $skill->description = $request->description;
        $skill->save();
        return redirect('/administration/skills');

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
