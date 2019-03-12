<?php

namespace App\Http\Controllers\Backend;
use App\Helper\AppHelper;
use App\Helper\MenuHelper;
use App\Http\Controllers\Controller;
use App\Model\Country;
use App\Model\LeaveEntitlement;
use App\Model\Location;
use FontLib\Table\Type\loca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LeaveEntitlementController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->shareMenu();
        $country = Country::with('Location')->get();
        //dd($country);
        //$country->Country;
        //dd($country->Country);
//        $categories = Subunit::where('parent_id', '=', 0)->get();
//        $allCategories = Subunit::pluck('title','id')->all();
        return view('backend.HRIS.Leave.Entitlement.index',compact('country'));


    }

    public function viewLeaveEntitlements()
    {
        $this->shareMenu();

        $leave_entitlement = DB::table('leave_entitlements as e')
            ->select('e.*','l.*')
            ->join('leave_entitlement_types as l','e.entitlement_type','=','l.id')
            ->get();
        return view('backend.HRIS.Leave.Entitlement.employee_entitlement',compact('leave_entitlement'));
    }



    /**
     * @return \Illuminate\Http\JsonResponse
     * Step to apply leave
     * 1 . Add Entitlement for leave
     */
    public function addLeaveEntitlement(){

        return response()->json(['Data'=>'successfully']);

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
       // dd('Hello');
        if(Auth::guard('admins')->user()){
            $company_id = Auth::guard('admins')->user()->id;
        }else{
            $company_id = Auth::guard('admins')->user()->company_id;
        }
        $LeaveEntitlement = New LeaveEntitlement();
        $LeaveEntitlement->emp_number = $request->employee_entitlement;
        $LeaveEntitlement->company_id = $company_id;
        $LeaveEntitlement->created_by_name = Auth::guard('admins')->user()->name;
        $LeaveEntitlement->leave_type_id = $request->leave_type;
        $LeaveEntitlement->entitlement_type = 1;
        $LeaveEntitlement->no_of_day = $request->entitlements_day;

        $LeaveEntitlement->save();


        return redirect('/administration/view-leave-entitlements')->with('success','Item has been added successfully');
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
