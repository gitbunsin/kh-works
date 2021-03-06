<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Model\TerminationReason;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TerminationReasonController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // dd('hello');
        $this->shareMenu();
        $t = TerminationReason::all();
        return view('backend.HRIS.PIM.Configuration.TerminationReason.index',compact('t'));
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
        return view('backend.HRIS.PIM.Configuration.TerminationReason.create');
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
        $t = new TerminationReason();
        $t->name = $request->name;
        $t->company_id = Auth::guard('admins')->user()->id;
        $t->description = $request->description;
        $t->save();
        return redirect('/administration/termination-reason')->with('success','Item created successfully!');
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
        $t = TerminationReason::findOrFail($id);
        return view('backend.HRIS.PIM.Configuration.TerminationReason.edit',compact('t'));
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
        $t = TerminationReason::findOrFail($id);
        $t->name = $request->name;
        $t->company_id = Auth::guard('admins')->user()->id;
        $t->description = $request->description;
        $t->save();
        return redirect('/administration/termination-reason')->with('success','Item edited successfully!');
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
