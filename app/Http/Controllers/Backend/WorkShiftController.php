<?php

namespace App\Http\Controllers\Backend;
use \App\Model\Employee;
use \App\Model\EmployeeWorkShift;
use App\Http\Controllers\Controller;
use App\Model\WorkShift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $this->shareMenu();
//        $workshift = DB::table('employees as e')
//                        ->join('employee_work_shift as ew','e.emp_number','=','ew.employee_emp_number')
//                        ->get();
        $workshift = Employee::all();
        return view('backend.HRIS.admin.WorkShift.create',compact('workshift'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request);
        $WorkShift = WorkShift::create($request->all());
//        $WorkShift->company()->associate(Auth::guard('admins')->user()->id);
//        dd($request->duallistbox_demo2);
        $employeeID = Employee::find($request->duallistbox_demo2);
        $WorkShift->Employees()->attach($employeeID);
        $WorkShift->save();

        return redirect('/administration/work-shift')->with('success','WorkShift has been created');
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
        $workShift = WorkShift::with('Employees')->where('id',$id)->first();
        $employees = $workShift->employees;
        //return response()->json($employees);
      //  dd($employees);
        $arrIDEmployee = [];
        foreach($employees as $value) {
            array_push($arrIDEmployee, $value->emp_number);
        }
//        dd($arrIDEmployee);
        $emp = Employee::select('*')->whereNotIn('emp_number', $arrIDEmployee)->get();
//        dd($emp);
//        $EmployeeWorkShiftReview = DB::table('employees as e')
//                                ->join('employee_work_shift as ew','e.emp_number','!=','ew.employee_emp_number')
//                                ->get();
//        dd($EmployeeWorkShift);
        return view('backend.HRIS.admin.WorkShift.edit',compact('workShift','emp'));
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
        $Workshift = WorkShift::findOrFail($id);
        $Workshift->update($request->all());
//        dd($request->duallistbox_demo2);
        $EmployeeWorkshift_ID = Employee::find($request->duallistbox_demo2);
        $Workshift->Employees()->sync($EmployeeWorkshift_ID);

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
