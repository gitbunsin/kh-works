<?php
namespace App\Http\Controllers\Backend;
use App\Helper\AppHelper;
use App\Helper\MenuHelper;
use App\Http\Controllers\Controller;

use App\Immigration;
use App\Model\Employee;
use App\Model\EmployeePassport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ImmigrationController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->shareMenu();
      //  $m = DB::table('employee_passports')->get();
        $ListEmployeeEmergencyContact = DB::table('employee_passports as ec')
            ->join('employees as e','ec.emp_number','=','e.emp_number')
            ->get();

        return view('backend.HRIS.PIM.Employee.immigration.index',compact('ListEmployeeEmergencyContact'));
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

        return view('backend.HRIS.PIM.Employee.immigration.create');
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
        //dd($request->document);
        $EmployeePassport= new EmployeePassport();
        $EmployeePassport->eq_seqno = $request->document;
        $EmployeePassport->emp_number = Auth::guard('admins')->user()->id;
        $EmployeePassport->eq_passport_num = $request->passport_number;
        $EmployeePassport->ep_passportissueddate = carbon::parse($request->issued_date);
        $EmployeePassport->ep_passportexpiredate = carbon::parse($request->expiry_date);
        $EmployeePassport->ep_comments = $request->comments;
        $EmployeePassport->ep_passport_type_flg = $request->Issued_By;
        $EmployeePassport->ep_i9_status = $request->status;
        $EmployeePassport->ep_i9_review_date = carbon::parse($request->review_date);
        $EmployeePassport->save();
        //$migration->cou_code =

        return redirect('/administration/view-immigration')->with('success','Item has been added succesfully');
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
        $this->shareMenu();
        $m = EmployeePassport::findOrFail($id);
        return view('backend.HRIS.PIM.Employee.immigration.edit',compact('m'));
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
        $migration = EmployeePassport::findOrFail($id);
        $migration->eq_seqno = $request->document;
        $migration->eq_passport_num = $request->passport_number;
        $migration->ep_passportissueddate = carbon::parse($request->issued_date);
        $migration->ep_passportexpiredate = carbon::parse($request->expiry_date);
        $migration->ep_comments = $request->comments;
        $migration->ep_passport_type_flg = $request->Issued_By;
        $migration->ep_i9_status = $request->status;
        $migration->ep_i9_review_date = carbon::parse($request->review_date);
        $migration->save();
        //$migration->cou_code =

        return redirect('/administration/view-immigration')->with('success','Item has been added succesfully');
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
