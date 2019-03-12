<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Model\EmployeeLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeLanguageController extends BackendController
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
        $this->shareMenu();

        return view('backend.HRIS.PIM.Employee.languages.create');
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
        $l = new EmployeeLanguage();
        $l->emp_number = $company_id;
        $l->lang_id = $request->lang_id;
        $l->fluency = $request->fluency_id;
        $l->competency = $request->competency_id;
        $l->comments = $request->comments_id;
        $l->save();
        return redirect('/administration/employee-qualification')->with('success','Item has been added successfully');

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
        $lx = EmployeeLanguage::findOrFail($id);
        return view('backend.HRIS.PIM.Employee.languages.edit',compact('lx'));
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
        //dd('hello');
        if(Auth::guard('admins')->user()){
            $company_id = Auth::guard('admins')->user()->id;
        }else{
            $company_id = Auth::guard('employee')->user()->company_id;
        }
        $l = EmployeeLanguage::findOrFail($id);
        $l->emp_number = $company_id;
        $l->lang_id = $request->lang_id;
        $l->fluency = $request->fluency_id;
        $l->competency = $request->competency_id;
        $l->comments = $request->comments_id;
        $l->save();
        return redirect('/administration/employee-qualification')->with('success','Item has been edited successfully');
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
