<?php

namespace App\Http\Controllers\Backend;
use App\Helper\AppHelper;
use App\Helper\MenuHelper;
use App\Http\Controllers\Controller;
use App\Model\Kpi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KpiController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->shareMenu();
        $k = Kpi::with('jobTitle')->get();
        return view('backend.HRIS.PIM.Configuration.Kpi.index',compact('k'));
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
        //dd('hello');
        //
        $k = Kpi::create($request->all());
        $k->jobTitle()->associate($request->job_titles_code);
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
        $this->shareMenu();
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
//        $k =  Kpi::findOrFail($id);
        $k = Kpi::findOrFail($id);
        $k->jobTitle()->associate($request->job_titles_code);

//        $k->job_title_code = $request->job_titles_code;
//        $k->kpi_indicators = $request->performance;
//        $k->min_rating	= $request->min_id;
//        $k->max_rating = $request->max_id;
//
//        $IsCheck_yes = $request->IsDefault_yes;
//        //dd($IsCheck_no);
//        if($IsCheck_yes == "1"){
//            $k->default_kpi = 1;
//        }else{
//            $k->default_kpi = 0;
//        }
//        if($request->IsDefault_no == "1"){
//            $k->default_kpi = 1;
//        }else{
//            $k->default_kpi = 0;
//        }
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
