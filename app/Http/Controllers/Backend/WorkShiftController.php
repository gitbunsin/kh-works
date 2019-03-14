<?php

namespace App\Http\Controllers\Backend;
use \App\Model\Employee;
use \App\Model\EmployeeWorkShift;
use App\Http\Controllers\Controller;
use App\Model\WorkShift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class WorkShiftController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    public function index()
    {
        //
        $this->shareMenu();
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
        $this->shareMenu();
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
        dd($request->all());
        $WorkShift  = new WorkShift();
        $WorkShift->name = $request->name;

        $hours_per_day = $request->duration;
//        dd($hours_per_day);
        $WorkShift->hours_per_day =  $hours_per_day;
        $WorkShift->start_time = $request->fromDate;
        $WorkShift->end_time = $request->ToDate;
        $WorkShift->save();
        $Work_shift_id = $WorkShift->id;
        $emp = input::get('duallistbox_demo2');
        foreach ($emp as $item){
            $EmployeeWorkShift = new EmployeeWorkShift();
            $EmployeeWorkShift->emp_number = $item;
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
        $this->shareMenu();
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
//        dd($id);
        //
       // $work_shift = WorkShift::finde
//        $subjects = Input::get('wishlist');
//        dd(implode(',', Input::get('wishlist')));
        //dd(input::get('wishlist'));
//        dd($request->all());
         $WorkShift  =  WorkShift::findOrFail($id);
         $WorkShift->name = $request->name;
         $WorkShift->hours_per_day = $request->hours_per_day;
         $WorkShift->save();
        $emp = $request->input('wishlist');
        $Work_shift_id = $WorkShift->id;
        foreach ($emp as $item){
            $EmployeeWorkShift = new EmployeeWorkShift();
            $EmployeeWorkShift->emp_number = $item;
            $EmployeeWorkShift->work_shift_id = $Work_shift_id;
            $EmployeeWorkShift->save();
            $employee = Employee::findOrFail($item);
            $employee-> status = 1;
            $employee->save();

        }
//        $Work_shift_id = $WorkShift->id;
//        $EmployeeWorkShift->work_shift_id = $Work_shift_id;
//        $EmployeeWorkShift->emp_number = $request->wishlist_list;
//        $EmployeeWorkShift->save();
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
