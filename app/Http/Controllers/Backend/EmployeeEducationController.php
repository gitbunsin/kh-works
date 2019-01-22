<?php

namespace App\Http\Controllers\Backend;
use App\EmployeeEducation;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $E = new EmployeeEducation();
        $E->emp_number = Auth::guard('employee')->user()->id;
        $E->education_id = $request->education_id;
        $E->institute= $request->institute;
        $E->major = $request->major;
        $E->year = $request->year;
        $E->score = $request->score;
        $E->start_date = \Carbon\Carbon::parse($request->start_date);
        $E->end_date = \Carbon\Carbon::parse($request->end_date);
        $E->save();
        $E = DB::table('tbl_hr_education as es')
            ->join('tbl_education as s','es.education_id','=','s.id')
            ->where('s.id',$request->education_id)
            ->first();
        return response()->json($E);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($education_id)
    {
        //
        $e = EmployeeEducation::findOrFail($education_id);
        $e = DB::table('tbl_hr_education as es')
            ->join('tbl_education as s','es.education_id','=','s.id')
            ->where('s.id',$education_id)
            ->first();
        return response()->json($e);

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
