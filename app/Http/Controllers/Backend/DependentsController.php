<?php

namespace App\Http\Controllers\Backend;
use App\Helper\AppHelper;
use App\Helper\MenuHelper;
use App\Http\Controllers\Controller;

use App\Model\EmployeeDependent;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DependentsController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->shareMenu();
        $ListEmployeeEmergencyDependent = DB::table('employee_dependents as ec')
            ->join('employees as e','ec.emp_number','=','e.emp_number')
            ->get();
        return view('backend.HRIS.PIM.Employee.dependents.index',compact('ListEmployeeEmergencyDependent'));

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
        if(Auth::guard('admins')->user()){
            $employeeID =  Auth::guard('admins')->user()->id;
        }else{

            $employeeID = Auth::guard('employee')->user()->company_id;
        }
        $d = new EmployeeDependent();
        $d->ed_name = $request->name;
        $d->emp_number = $employeeID;
        $d->ed_relationship = $request->relationship_id;
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
        $this->shareMenu();
        $d = EmployeeDependent::findOrFail($id);
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
        if(Auth::guard('admins')->user()){
            $employeeID =  Auth::guard('admins')->user()->id;
        }else{

            $employeeID = Auth::guard('employee')->user()->company_id;
        }
        $d =  EmployeeDependent::findOrFail($id);
        $d->ed_name = $request->name;
        $d->emp_number = $employeeID;
        $d->ed_relationship = $request->relationship_id;
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
