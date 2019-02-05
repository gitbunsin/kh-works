<?php

namespace App\Http\Controllers\Backend;
use App\Dependents;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DependentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $d = DB::table('tbl_hr_emp_dependents as d')
                ->join('tbl_relationship as r','d.relationship_id','=','r.id')
                ->get();
        return view('backend.HRIS.PIM.Employee.dependents.index',compact('d'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.HRIS.PIM.Employee.dependents.create');

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
        $d = new Dependents();
        $d->emp_number = Auth::guard('employee')->user()->id;
        $d->ed_name = $request->name;
        $d->relationship_id = $request->relationship_id;
        $d->ed_date_of_birth = Carbon::parse($request->date_of_birth)->format('Y-m-d');
        $d->save();
        return redirect('/administration/view-dependents')->with('success','Item added successfully');
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
        $d = Dependents::findOrFail($id);
//        dd($d);
        return view('backend.HRIS.PIM.Employee.dependents.edit',compact('d'));

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
        $d =  Dependents::findOrFail($id);
        $d->emp_number = Auth::guard('employee')->user()->id;
        $d->ed_name = $request->name;
        $d->relationship_id = $request->relationship_id;
        $d->ed_date_of_birth = Carbon::parse($request->date_of_birth)->format('Y-m-d');
        $d->save();
        return redirect('/administration/view-dependents')->with('success','Item added successfully');
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
