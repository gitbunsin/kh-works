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
        $WorkShift  = new WorkShift();
        $WorkShift->name = $request->name;
        $WorkShift->hours_per_day = $request->hours_per_day;
        $WorkShift->company_id = Auth::guard('admins')->user()->id;
        $WorkShift->save();
        $Work_shift_id = $WorkShift->id;
        $emp = $request->input('wishlist');
        foreach ($emp as $item){
            $EmployeeWorkShift = new EmployeeWorkShift();
            $EmployeeWorkShift->emp_id = $item;
            $EmployeeWorkShift->work_shift_id = $Work_shift_id;
            $EmployeeWorkShift->save();
            $employee = Employee::findOrFail($item);
            $employee-> status = 1;
            $employee->save();
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
            $EmployeeWorkShift->emp_id = $item;
            $EmployeeWorkShift->work_shift_id = $Work_shift_id;
            $EmployeeWorkShift->save();
            $employee = Employee::findOrFail($item);
            $employee-> status = 1;
            $employee->save();

        }
//        $Work_shift_id = $WorkShift->id;
//        $EmployeeWorkShift->work_shift_id = $Work_shift_id;
//        $EmployeeWorkShift->emp_id = $request->wishlist_list;
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
