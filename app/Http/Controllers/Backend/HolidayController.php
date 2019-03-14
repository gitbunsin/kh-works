<?php

namespace App\Http\Controllers\Backend;
use App\Model\Holiday;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class HolidayController extends BackendController
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
        $Holiday = Holiday::all();
       // $menus = MenuHelper::getInstance()->getSidebarMenu(AppHelper::getInstance()->getRoleID(), AppHelper::getInstance()->getCompanyId());
        return view('backend.HRIS.Leave.Holiday.index',compact('Holiday'));
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
        return view('backend.HRIS.Leave.Holiday.create');
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
//        dd($request->all());
        if(Auth::guard('admins')->user()){
            $company_id = Auth::guard('admins')->user()->id;
        }else{
            $company_id = Auth::guard('employee')->user()->company_id;
        }
        $Holiday = new Holiday();
        $Holiday->name = $request->name;
        $Holiday->company_id = $company_id;
        $Holiday->operational_country_id = 1;
        //$l->employee_id = Auth::guard('employee')->user()->id;
        $Holiday->date = Carbon::parse($request->date);
        $check = $request->check;
        if($check =="1"){
            $Holiday->recurring = 1;
        }else{
            $Holiday->recurring = 0;
        }
        $Holiday->length = $request->day;
        $Holiday->save();

        return redirect('/administration/define-holiday')->with('success','Item Added successfully');


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
        $h = Holiday::FindOrFail($id);
        return view('backend.HRIS.Leave.Holiday.edit',compact('h'));
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


        $l = Holiday::FindOrFail($id);
        $l->name = $request->name;
        $l->company_id = Auth::guard('admins')->user()->id;
        //$l->employee_id = Auth::guard('employee')->user()->id;
        $l->date = Carbon::parse($request->date);
        $l->length = $request->day;
        $check = $request->check;
        if($check =="1"){
            $l->recurring = 1;
        }else{
            $l->recurring = 0;
        }
        $l->save();
        return redirect('/administration/define-holiday')->with('success','Item Edited successfully');
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
