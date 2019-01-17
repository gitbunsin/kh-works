<?php

namespace  App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $e = Education::all();
        return view('backend.HRIS.admin.Qualifications.Education.index',compact('e'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.HRIS.admin.Qualifications.Education.create');
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
        $e = new Education();
        $e->company_id = Auth::guard('admins')->user()->id;
        $e->name = $request->name;
        $e->description = $request->description;
        $e->save();
        return redirect('/administration/education');

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
        $e = Education::where('id',$id)->first();
//        dd($skills);
        return view('backend.HRIS.admin.Qualifications.Education.edit',compact('e'));
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
        $e = Education::findOrFail($id);
        $e->company_id = Auth::guard('admins')->user()->id;
        $e->name = $request->name;
        $e->description = $request->description;
        $e->save();
        return redirect('/administration/education');
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
