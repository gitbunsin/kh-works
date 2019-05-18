<?php

namespace App\Http\Controllers\Backend;

use App\Model\Employee;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PayrollController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->shareMenu();
        $employee_id = input::get('employee_payroll');
        if($employee_id){
            $SearchEmployee = Employee::where('emp_number',$employee_id)->first();

        }else{
            $SearchEmployee = "";
        }

        return view('backend.HRIS.Payroll.index',compact('SearchEmployee'));

    }
    public function getPdf($id)
    {
//        $invoice = PDF::loadView('pdf.pdf_bill',array('name'=>$id));
//        return $invoice->stream();
        $paySleep = Employee::where('emp_number',$id)->first();
        if($paySleep){
            $paySleep = Employee::where('emp_number',$id)->first();
        }else{
            $paySleep ="";
        }
        return $this->index();
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
        //dd("hello");

        $employee_id = input::get('employee_payroll');
        if($employee_id){
            $SearchEmployee = Employee::where('emp_number',$employee_id)->first();

        }else{
            $SearchEmployee = "";
        }

        return $this->index();
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SearchEmpPayroll(){
        $this->shareMenu();
        $employee_id = input::get('employee_payroll');
        $SearchEmployee = Employee::where('emp_number',$employee_id)->first();

        return view('backend.HRIS.Payroll.index',compact('SearchEmployee'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //dd('hello');
        $paySleep = Employee::where('emp_number',$id)->first();
        if($paySleep){
            $paySleep = Employee::where('emp_number',$id)->first();
        }else{
            $paySleep ="";
        }
        return $this->index(compact('paySleep'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd('hello');
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
