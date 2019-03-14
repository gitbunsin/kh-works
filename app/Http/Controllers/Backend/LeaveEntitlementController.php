<?php

namespace App\Http\Controllers\Backend;
use App\Helper\AppHelper;
use App\Helper\MenuHelper;
use App\Http\Controllers\Controller;
use App\Model\Country;
use App\Model\Employee;
use App\Model\EmploymentStatus;
use App\Model\LeaveEntitlement;
use App\Model\LeavePeriodHistory;
use App\Model\Location;
use App\Model\SubUnit;
use FontLib\Table\Type\loca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

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
        $categories = SubUnit::where('parent_id', '=', 0)->get();
        $allCategories = SubUnit::pluck('title','id')->all();
      //  dd($categories);
        //dd($country);
        //$country->Country;
        //dd($country->Country);
//        $categories = Subunit::where('parent_id', '=', 0)->get();
//        $allCategories = Subunit::pluck('title','id')->all();
        return view('backend.HRIS.Leave.Entitlement.index',compact('country','categories','allCategories'));


    }

    public function viewLeaveEntitlements()
    {
        $this->shareMenu();

        $leave_entitlement = DB::table('leave_entitlements as e')
            ->select('e.*','l.*')
            ->join('leave_entitlement_types as l','e.entitlement_type','=','l.id')
            ->get();
        //dd($leave_entitlement);
        return view('backend.HRIS.Leave.Entitlement.employee_entitlement',compact('leave_entitlement'));
    }

    public function viewMyLeaveEntitlements()
    {
        $this->shareMenu();
        $leave_entitlement = DB::table('leave_entitlements as e')
            ->select('e.*','l.*','ls.*','l.name as entitlement_type_name')
            ->join('leave_entitlement_types as l','e.entitlement_type','=','l.id')
            ->join('leave_types as ls','e.leave_type_id','=','ls.id')
            ->get();
        //dd($leave_entitlement);
        return view('backend.HRIS.Leave.Entitlement.my_entitlement', compact('leave_entitlement'));
    }



    /**
     * @return \Illuminate\Http\JsonResponse
     * Step to apply leave
     * 1 . Add Entitlement for leave
     */
    public function addEmployeeLeaveEntitlment(){


//        $AllEmp =  DB::table('employees')->count();
//        $AllEmp = Employee::count();
        $total = DB::table('employees')
            ->select('*', DB::raw('COUNT(*) as review_count'))
            ->groupBy('emp_number')
            ->having('emp_number', '>' , 0)
            ->get();

        return response()->json($total);

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


        $isCheck = $request->CheckEmployee;
       if($isCheck == "1"){
           $TotalEmp = $request->EmpNumber;
//        dd($TotalEmp)
           if(is_array($TotalEmp)) {
               foreach ($TotalEmp as $item) {
//            echo  $item;
                   if (Auth::guard('admins')->user()) {
                       $company_id = Auth::guard('admins')->user()->id;
                   } else {
                       $company_id = Auth::guard('admins')->user()->company_id;
                   }
                   $LeaveEntitlement = New LeaveEntitlement();
                   $LeaveEntitlement->emp_number = $item;
                   $LeaveEntitlement->company_id = $company_id;
                   $LeaveEntitlement->created_by_name = Auth::guard('admins')->user()->name;
                   $LeaveEntitlement->leave_type_id = $request->leave_type;
                   $LeaveEntitlement->entitlement_type = 1;
                   $LeaveEntitlement->no_of_day = $request->entitlements_day;
                   //check Leave period History
                   $LeavePeriod = LeavePeriodHistory::where('id', $request->leave_period)->first();
                   $LeaveEntitlement->from_date = $LeavePeriod->leave_period_start_month;
                   $LeaveEntitlement->to_date = $LeavePeriod->leave_period_start_day;

                   $LeaveEntitlement->save();
               }
           }
       }else{

           if (Auth::guard('admins')->user()) {
               $company_id = Auth::guard('admins')->user()->id;
           } else {
               $company_id = Auth::guard('admins')->user()->company_id;
           }
           $LeaveEntitlement = New LeaveEntitlement();
           $LeaveEntitlement->emp_number = $request->EmployeeEntitlement;
           $LeaveEntitlement->company_id = $company_id;
           $LeaveEntitlement->created_by_name = Auth::guard('admins')->user()->name;
           $LeaveEntitlement->leave_type_id = $request->leave_type;
           $LeaveEntitlement->entitlement_type = 1;
           $LeaveEntitlement->no_of_day = $request->entitlements_day;
           //check Leave period History
           $LeavePeriod = LeavePeriodHistory::where('id', $request->leave_period)->first();
           $LeaveEntitlement->from_date = $LeavePeriod->leave_period_start_month;
           $LeaveEntitlement->to_date = $LeavePeriod->leave_period_start_day;

           $LeaveEntitlement->save();

       }
//        dd($request->all());
//        dd(input::get('EmpNumber'));

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
