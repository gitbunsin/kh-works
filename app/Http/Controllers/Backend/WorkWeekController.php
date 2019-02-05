<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\WorkWeek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkWeekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('backend.HRIS.Leave.WorkWeek.index');

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

        $w = new WorkWeek();
        $w->mon = $request->mon;
        $w->employee_id = Auth::guard('employee')->user()->id;
        $w->tue = $request->tue;
        $w->wed = $request->wed;
        $w->thu = $request->thu;
        $w->fri = $request->fri;
        $w->sat = $request->sat;
        $w->sun = $request->sun;
        $w->save();
        return response()->json($w);
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
        //
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