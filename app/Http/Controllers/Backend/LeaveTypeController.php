<?php

namespace App\Http\Controllers\Backend;
use App\Helper\AppHelper;
use App\Helper\MenuHelper;
use App\Http\Controllers\Controller;
use App\Model\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $l = LeaveType::all();
        $this->shareMenu();
        return view('backend.HRIS.Leave.leaveTypes.index',compact('l'));

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
        return view('backend.HRIS.Leave.leaveTypes.create');

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
        $l = new LeaveType();
        $l->name = $request->name;
        $l->description = $request->description;
        $l->save();
        return redirect('/administration/leave-type')->with('success','Item added successfully');
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
        $l = LeaveType::findOrFail($id);
        return view('backend.HRIS.Leave.leaveTypes.edit',compact('l'));
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
        $l = LeaveType::findOrFail($id);
        $l->name = $request->name;
        $l->description = $request->description;
        $l->save();
        return redirect('/administration/leave-type')->with('success','Item Edited successfully');
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
