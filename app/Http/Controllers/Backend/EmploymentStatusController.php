<?php
namespace App\Http\Controllers\Backend;
use \App\Model\EmployeeStatus;
use App\Http\Controllers\Controller;
use App\Model\EmploymentStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\EmployementStatus;

class EmploymentStatusController extends BackendController
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
        $employee_status = EmploymentStatus::all();

        return view('backend.HRIS.admin.EmployeeStatus.index',compact('employee_status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->shareMenu();
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
        $EmployeeStatus = new EmploymentStatus();
        $EmployeeStatus->name = $request->name;
        $EmployeeStatus->description = $request->description;
        $EmployeeStatus->company_id = Auth::guard('admins')->user()->id;
        $EmployeeStatus->save();
        return redirect('/administration/employment-status/')->with('success','Item created successfully!');
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
        $employeeStatus = EmploymentStatus::where('id',$id)->first();
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
        $employeeStatus = EmploymentStatus::findOrFail($id);
        $employeeStatus->name = $request->name;
        $employeeStatus->description=$request->description;
        $employeeStatus->company_id = Auth::guard('admins')->user()->id;
        $employeeStatus->save();
        return redirect('/administration/employment-status/')->with('success','Item Edited successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $EmployementStatus= EmploymentStatus::findOrFail( $id );
        $EmployementStatus->delete();
        return  redirect('/administration/employment-status')->with('success','Item success successfully!');

        //
    }
}
