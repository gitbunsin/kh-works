<?php

namespace  App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\License;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LicenseController extends Controller
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

        $l = new License();
        $l->emp_number = Auth::guard('employee')->user()->id;
        $l->licenseType_id = $request->licenseType_id;
        $l->license_number = $request->license_number;
        $l->issued_date = \Carbon\Carbon::parse($request->issued_date);
        $l->expiry_date = \Carbon\Carbon::parse($request->expiry_date);

        $l->save();
        $l = DB::table('tbl_hr_license as es')
            ->join('tbl_licenseType as s','es.licenseType_id','=','s.id')
            ->where('s.id',$request->licenseType_id)
            ->first();
        return response()->json($l);
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
