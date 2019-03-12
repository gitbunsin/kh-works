<?php

namespace App\Http\Controllers\Backend;
use App\Helper\AppHelper;
use App\Helper\MenuHelper;
use App\Http\Controllers\Controller;
use App\Model\LeavePeriodHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use function Sodium\compare;

class LeavePeriodController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->shareMenu();
//        $ListLeavePeriod = DB::table('leave_period_histories')
//                                    ->select(max('id'))->first();
        $ListLeavePeriod = LeavePeriodHistory::whereRaw('id = (select max(`id`) from leave_period_histories)')->first();
//        dd($order);
       // return $this->listLeavePeriod();
        return view('backend.HRIS.Leave.LeavePeriod.create',compact('ListLeavePeriod'));
    }
    public function listLeavePeriod(){
        //dd('hello');


//        $userId = Auth::guard('admins')->user()->id;
//        $FindLeavePeriod = LeavePeriodHistory::where('company_id', '=', $userId)->orderBy('id', 'desc')->first();
//        $checkStatusLeavePeriod = '';
//        if($FindLeavePeriod){
//            $checkStatusLeavePeriod = "true";
//        }
//        else{
//            $checkStatusLeavePeriod = "false";
//        }
//        return view('backend.HRIS.Leave.LeavePeriod.create')->with(['getLastPeriod'=>$FindLeavePeriod, 'status'=> $checkStatusLeavePeriod, 'success'=>'item are successfully added!']);
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
        //
        //dd('hello');
        $this->shareMenu();
        $LeavePeriod = new LeavePeriodHistory();
        $LeavePeriod->leave_period_start_month = input::get('StartDate');
        $LeavePeriod->leave_period_start_day = input::get('EndDate');
        $LeavePeriod->company_id = Auth::guard('admins')->user()->id;

        $LeavePeriod->save();

        return redirect('/administration/define-leave-period')->with('success','Item has been added successfully');
//        $ListLeavePeriod = LeavePeriodHistory::where('id',$LeavePeriod->id)->first();
//        // dd($ListLeavePeriod);
//        return view('backend.HRIS.Leave.LeavePeriod.create',compact('ListLeavePeriod'))->with('success','Item has been added successfully');
//        $p = DB::table('leave_period_histories')->get();

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
