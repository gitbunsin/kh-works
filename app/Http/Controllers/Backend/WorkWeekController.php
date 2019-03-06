<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Model\WorkWeek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WorkWeekController extends BackendController
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
        $WorkWeek = DB::table('work_weeks')->first();
        return view('backend.HRIS.Leave.WorkWeek.index',compact('WorkWeek'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        $w = new WorkWeek();
//        $w->mon = $request->mon;
//        $w->employee_id = Auth::guard('employee')->user()->id;
//        $w->tue = $request->tue;
//        $w->wed = $request->wed;
//        $w->thu = $request->thu;
//        $w->fri = $request->fri;
//        $w->sat = $request->sat;
//        $w->sun = $request->sun;
//        $w->save();
//        return response()->json($w);
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

       // dd('hello');
        //dd($request->all());
        //dd($id);
        $w = WorkWeek::FindOrFail($id);
        $w->mon = $request->mon;
        $w->company_id = Auth::guard('admins')->user()->id;
        $w->operational_country_id = 1;
        $w->tue = $request->tue;
        $w->wed = $request->wed;
        $w->thu = $request->thu;
        $w->fri = $request->fri;
        $w->sat = $request->sat;
        $w->sun = $request->sun;
        $w->save();

        return redirect('administration/define-workweek')->with('success','Item has been edited successfully');
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
