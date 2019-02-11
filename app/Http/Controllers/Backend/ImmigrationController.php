<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Immigration;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ImmigrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $m = DB::table('tbl_hr_emp_passport as p')
                ->select('p.*','n.*','p.id as passport_id')
                ->join('tbl_nationality as n','p.ep_passport_type_flg','=','n.id')
                ->get();
        //dd($m);
        return view('backend.HRIS.PIM.Employee.immigration.index',compact('m'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('backend.HRIS.PIM.Employee.immigration.create');
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
        //dd($request->document);
        $migration = new Immigration();
        $migration->ep_seqno = $request->document;
        $migration->company_id = Auth::guard('admins')->user()->id;
        $migration->ep_passport_num = $request->passport_number;
        $migration->ep_passportissueddate = carbon::parse($request->issued_date);
        $migration->ep_passportexpiredate = carbon::parse($request->expiry_date);
        $migration->ep_comment = $request->comments;
        $migration->ep_passport_type_flg = $request->Issued_By;
        $migration->ep_i9_status = $request->status;
        $migration->ep_i9_review_date = carbon::parse($request->review_date);
        $migration->save();
        //$migration->cou_code =

        return redirect('/administration/view-immigration')->with('success','Item has been added succesfully');
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
        $m = DB::table('tbl_hr_emp_passport as p')
            ->select('p.*','n.*','p.id as passport_id')
            ->join('tbl_nationality as n','p.ep_passport_type_flg','=','n.id')
            ->where('p.id',$id)
            ->first();
        return view('backend.HRIS.PIM.Employee.immigration.edit',compact('m'));
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
        $migration = Immigration::findOrFail($id);
        $migration->ep_seqno = $request->document;
        $migration->company_id = Auth::guard('admins')->user()->id;
        $migration->ep_passport_num = $request->passport_number;
        $migration->ep_passportissueddate = carbon::parse($request->issued_date);
        $migration->ep_passportexpiredate = carbon::parse($request->expiry_date);
        $migration->ep_comment = $request->comments;
        $migration->ep_passport_type_flg = $request->Issued_By;
        $migration->ep_i9_status = $request->status;
        $migration->ep_i9_review_date = carbon::parse($request->review_date);
        $migration->save();
        //$migration->cou_code =

        return redirect('/administration/view-immigration')->with('success','Item has been added succesfully');
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
