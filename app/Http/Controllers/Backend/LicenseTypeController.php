<?php

namespace  App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\LicenseType;
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
        $l = LicenseType::all();
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
        $l = new LicenseType();
        $l->company_id = Auth::guard('admins')->user()->id;
        $l->name = $request->name;
        $l->description = $request->description;
        $l->save();
        return redirect('/administration/license-types');

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
        $l = LicenseType::where('id',$id)->first();
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
        $l = LicenseType::findOrFail($id);
        $l->company_id = Auth::guard('admins')->user()->id;
        $l->name = $request->name;
        $l->description = $request->description;
        $l->save();
        return redirect('/administration/license-types');
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
