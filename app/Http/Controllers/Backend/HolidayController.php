<?php

namespace App\Http\Controllers\Backend;
use App\Holiday;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $h = Holiday::all();
        return view('backend.HRIS.Leave.Holiday.index',compact('h'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.HRIS.Leave.Holiday.create');
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
        //dd($request->all());

        $l = new Holiday();
        $l->name = $request->name;
        $l->company_id = Auth::guard('admins')->user()->id;
        //$l->employee_id = Auth::guard('employee')->user()->id;
        $l->date = Carbon::parse($request->date);
        $l->recurring = $request->IsDefault;
        $l->length = $request->day;
        $l->save();
        return redirect('/administration/define-holiday')->with('success','Item Added successfully');


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
        $h = Holiday::FindOrFail($id);
        return view('backend.HRIS.Leave.Holiday.edit',compact('h'));
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


        $l = Holiday::FindOrFail($id);
        $l->name = $request->name;
        $l->company_id = Auth::guard('admins')->user()->id;
        //$l->employee_id = Auth::guard('employee')->user()->id;
        $l->date = Carbon::parse($request->date);
        $length = $request->IsDefault;
        if($length){
            $l->recurring = $length;
        }
        $length1 = $request->IsDefault1;
        if($length1){
            $l->recurring = $length1;
        }
        $l->length = $request->day;
        $l->save();
        return redirect('/administration/define-holiday')->with('success','Item Edited successfully');
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
