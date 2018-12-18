<?php

namespace App\Http\Controllers\Backend;
use App\EmployeeWorkShift;
use App\Http\Controllers\Controller;
use App\WorkShift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class WorkShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $WorkShift = WorkShift::all();
        return view('backend.HRIS.admin.WorkShift.index',compact('WorkShift'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.HRIS.admin.WorkShift.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



//        $input = $request->except('wishlist');
//        dd($input);

        $WorkShift  = new WorkShift();

        $WorkShift->name = $request->name;
        $WorkShift->hours_per_day = $request->hours_per_day;
        $WorkShift->save();
        $Work_shift_id = $WorkShift->id;
        $emp = $request->input('wishlist');
        foreach ($emp as $item){
            $EmployeeWorkShift = new EmployeeWorkShift();
            $EmployeeWorkShift->emp_id = $item;
            $EmployeeWorkShift->work_shift_id = $Work_shift_id;
            $EmployeeWorkShift->save();
        }
        return redirect('/administration/work-shift');
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
        $work_shift = WorkShift::where("id",$id)->first();
//        dd($work_shift);
        return view('backend.HRIS.admin.WorkShift.edit',compact('work_shift'));
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
//        $subjects = Input::get('wishlist');
//        dd(implode(',', Input::get('wishlist')));
        //dd(input::get('wishlist'));
//        dd($request->all());
        $WorkShift  =  WorkShift::findorFail($id);

        $EmployeeWorkShift = EmployeeWorkShift::findorFail($id);
        $WorkShift->name = $request->name;
        $WorkShift->hours_per_day = $request->hours_per_day;
        $WorkShift->save();
        $Work_shift_id = $WorkShift->id;
        $EmployeeWorkShift->work_shift_id = $Work_shift_id;
        $EmployeeWorkShift->emp_id = $request->wishlist_list;
        $EmployeeWorkShift->save();
        return redirect('/administration/work-shift');
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