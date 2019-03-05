<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\PerformanceReview;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PerformanceReviewController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->shareMenu();
        //
        //$p = PerformanceReview::all();
//        $p = DB::table('tbl_hr_performance_review as p')
//            ->select('p.*','e.*')
//            ->join('employees as e','p.employee_id','=','e.emp_id')
//            ->get();
//        dd($p);
//        $menus = MenuHelper::getInstance()->getSidebarMenu(AppHelper::getInstance()->getRoleID(), AppHelper::getInstance()->getCompanyId());
        return view('backend.HRIS.performance.ManageReview.index');
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
        return view('backend.HRIS.performance.ManageReview.create');

    }
    public function getEmployeeTrackerReview($id)
      {


          return response()->json(['data'=>'ok','id'=>$id]);
       }
       public function EvaluatePerformancReview(){


           $this->shareMenu();
           return view('backend.HRIS.performance.ReviewList.index');
       }
        public function getMyReviewPerformance()
        {
            $this->shareMenu();

            return view('backend.HRIS.performance.MyReview.index');

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
        $p = new PerformanceReview();
        $p->employee_id = $request->employee;
        $p->work_period_start = Carbon::parse($request->start_date)->format('Y-m-d');
        $p->work_period_end = Carbon::parse($request->end_date)->format('Y-m-d');$request->end_date;
        $p->due_date = Carbon::parse($request->due_date)->format('Y-m-d');
        $p->save();

        return redirect('administration/employee-performance-review');
        //dd('hello');
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
        return view('backend.HRIS.performance.ManageReview.edit');
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
