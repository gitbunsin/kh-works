<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Model\ReportingMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportingMethodsController extends BackendController
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
        $r = ReportingMethod::all();
        return view('backend.HRIS.PIM.Configuration.ReportingMethods.index',compact('r'));

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
        return view('backend.HRIS.PIM.Configuration.ReportingMethods.create');
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
        $r = new ReportingMethod();
        $r->company_id = Auth::guard('admins')->user()->id;
        $r->name = $request->name;
        $r->description = $request->description;

        $r->save();
        return redirect('/administration/view-reporting-methods');
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
        $r = ReportingMethod::findOrFail($id);
        return view('backend.HRIS.PIM.Configuration.ReportingMethods.edit',compact('r'));
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
        $r = ReportingMethod::findOrFail($id);
        $r->employee_id = Auth::guard('employee')->user()->id;
        $r->name = $request->name;
        $r->description = $request->description;
        $r->save();
        return view('backend.HRIS.PIM.Configuration.ReportingMethods.edit');

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
