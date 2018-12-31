<?php
namespace App\Http\Controllers\Backend;
use App\EmployeeStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmploymentStatusController extends Controller
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
        $employee_status = EmployeeStatus::all();
        return view('backend.HRIS.admin.EmployeeStatus.index',compact('employee_status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.HRIS.admin.EmployeeStatus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $EmployeeStatus = new EmployeeStatus();
        $EmployeeStatus->name = $request->name;
        $EmployeeStatus->company_id = Auth::guard('admins')->user()->id;
        $EmployeeStatus->save();
        return redirect('/administration/employment-status/');
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
        $employeeStatus = EmployeeStatus::where('id',$id)->first();
        return view('backend.HRIS.admin.EmployeeStatus.edit',compact('employeeStatus'));
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
        $employeeStatus = EmployeeStatus::findOrFail($id);
        $employeeStatus->name = $request->name;
        $employeeStatus->company_id = Auth::guard('admins')->user()->id;
        $employeeStatus->save();
        return redirect('/administration/employment-status/');

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
