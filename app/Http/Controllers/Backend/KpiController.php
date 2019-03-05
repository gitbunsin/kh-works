<?php

namespace App\Http\Controllers\Backend;
use App\Helper\AppHelper;
use App\Helper\MenuHelper;
use App\Http\Controllers\Controller;
use App\Model\Kpi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KpiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::guard('admins')->user()){
            $company_id = Auth::guard('admins')->user()->id;

        }else{
            $company_id = Auth::guard('employee')->user()->company_id;
        }
        //
//        $k = DB::table('kpis as k')
//                ->select('k.*','j.*','k.id as kpi_id')
//                ->join('job_titles as j','k.job_titles_code','=','j.id')
//                ->get();
        $k = Kpi::all();
       // dd($k);
        $menus = MenuHelper::getInstance()->getSidebarMenu(AppHelper::getInstance()->getRoleID(), AppHelper::getInstance()->getCompanyId());
        return view('backend.HRIS.PIM.Configuration.Kpi.index',compact('k','menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.HRIS.PIM.Configuration.Kpi.create');
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
        $k = new Kpi();
        $k->job_titles_code = $request->job_titles_code;
        $k->employee_id = Auth::guard('employee')->user()->id;
        $k->kpi_indicators = $request->performance;
        $k->min_rating	= $request->min_id;
		$k->max_rating = $request->max_id;
		$IsCheck = $request->IsDefault;
		if($IsCheck){
		    $k->default_kpi = 1;
        }else{
		    $k->default_kpi = 0;
        }
		$k->save();
		return redirect('/administration/employee-kpi')->with('success','Item created successfully!');

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
        $k = Kpi::findOrFail($id);
        return view('backend.HRIS.PIM.Configuration.Kpi.edit',compact('k'));
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
        //dd($request->IsDefault_yes);
        $k =  Kpi::findOrFail($id);
        $k->job_titles_code = $request->job_titles_code;
        $k->employee_id = Auth::guard('employee')->user()->id;
        $k->kpi_indicators = $request->performance;
        $k->min_rating	= $request->min_id;
        $k->max_rating = $request->max_id;

        $IsCheck_yes = $request->IsDefault_yes;
        //dd($IsCheck_no);
        if($IsCheck_yes == "1"){
            $k->default_kpi = 1;
        }else{
            $k->default_kpi = 0;
        }
        if($request->IsDefault_no == "1"){
            $k->default_kpi = 1;
        }else{
            $k->default_kpi = 0;
        }
        $k->save();
        return redirect('/administration/employee-kpi')->with('success','Item Edited successfully!');
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
