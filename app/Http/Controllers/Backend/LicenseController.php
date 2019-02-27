<?php

namespace  App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Model\Backend\License;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LicenseTypeController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $l = license::all();
        return view('backend.HRIS.admin.Qualifications.LicenseType.index',compact('l'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.HRIS.admin.Qualifications.LicenseType.create');
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
        $l = new license();
        $l->company_id = Auth::guard('admins')->user()->id;
        $l->name = $request->name;
        $l->description = $request->description;
        $l->save();
        return redirect('/administration/license-types')->with('success','Item created successfully!');

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
        $l = license::where('id',$id)->first();
//        dd($skills);
        return view('backend.HRIS.admin.Qualifications.LicenseType.edit',compact('l'));
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
        $l = license::findOrFail($id);
        $l->company_id = Auth::guard('admins')->user()->id;
        $l->name = $request->name;
        $l->description = $request->description;
        $l->save();
        return redirect('/administration/license-types')->with('success','Item edited successfully!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $license = license::findOrFail( $id );
        $license->delete();
        return  redirect('/administration/license-types')->with('success','Item success successfully!'); 
    }
}
