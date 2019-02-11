<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\ReportingMethods;
use App\ReportingTo;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class ReportingToController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reporting = DB::table('tbl_hr_emp_reportto as r')
                    ->select('r.*','m.*','e.*','r.id as reporting_id','e.emp_id as employee_id','m.id as method_id')
                    ->join('tbl_hr_reporting_method as m','r.erep_reporting_method','=','m.id')
                    ->join('tbl1_hr_employee as e','r.erep_sup_emp_number','=','e.emp_id')
                    ->get();
                    //dd($reporting);
        return view('backend.HRIS.PIM.Employee.ReportingTo.index',compact('reporting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.HRIS.PIM.Employee.ReportingTo.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd('hell0');

        $Reporting = new ReportingTo();
        $Reporting->erep_sup_emp_number = $request->supervisor_id;
       // $Reporting->erep_sub_emp_number  = Auth::guard('admins')->user()->id;
        $Reporting->company_id = Auth::guard('admins')->user()->id;
        $Reporting->erep_reporting_method = $request->reporting_id;
        $Reporting->save();
//        $Reporting = DB::table('tbl_hr_emp_reportto as r')
//            ->select('r.*','m.*','e.*','r.id as reporting_id')
//            ->join('tbl_hr_reporting_method as m','r.erep_reporting_method','=','m.id')
//            ->join('tbl1_hr_employee as e','r.erep_sup_emp_number','=','e.emp_id')
//            ->where('m.id',$request->reporting_id)
//            ->where('e.emp_id',$request->supervisor_id)
//            ->first();
//        return response()->json($Reporting);

        return redirect('/administration/view-ReportTo-details')->with('success','Item added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ShowEmployeeReport($reporting_id,$method_id,$employee_id)
    {


        $data['all_report'] = DB::table('tbl_hr_emp_reportto as r')
            ->join('tbl1_hr_employee as e','r.erep_sup_emp_number','=','e.emp_id')
            ->where('r.id',$reporting_id)
            ->where('e.emp_id',$employee_id)
            ->get();

        $data['all_method'] = ReportingMethods::where('id',$method_id)->get();
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function show($reporting_id)
//    {
//        //
//        $Reporting = DB::table('tbl_hr_emp_reportto as r')
//            ->select('r.*','m.*','e.*','r.id as reporting_id')
//            ->join('tbl_hr_reporting_method as m','r.erep_reporting_method','=','m.id')
//            ->join('tbl1_hr_employee as e','r.erep_sup_emp_number','=','e.emp_id')
//            ->where('r.id',$reporting_id)
//            ->where('e.emp_id',$request->supervisor_id)
//            ->first();
//        return response()->json($data);
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $r = DB::table('tbl_hr_emp_reportto as r')
            ->select('r.*','m.*','e.*','r.id as reporting_id','e.emp_id as employee_id')
            ->join('tbl_hr_reporting_method as m','r.erep_reporting_method','=','m.id')
            ->join('tbl1_hr_employee as e','r.erep_sup_emp_number','=','e.emp_id')
            ->where('r.id',$id)
            ->first();
        //dd($r);

        return view('backend.HRIS.PIM.Employee.ReportingTo.edit',compact('r'));

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
        $Reporting = ReportingTo::findOrFail($id);
        $Reporting->erep_sup_emp_number = $request->supervisor_id;
        // $Reporting->erep_sub_emp_number  = Auth::guard('admins')->user()->id;
        $Reporting->company_id = Auth::guard('admins')->user()->id;
        $Reporting->erep_reporting_method = $request->reporting_id;
        $Reporting->save();
        return redirect('/administration/view-ReportTo-details')->with('success','Item added Successfully');
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
