<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Model\Backend\Organization;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//      $CompanyProfiles = DB::table('tbl_organization_gen_info')->get()->first();
        return view('backend.HRIS.admin.Company.index');
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\organization  $company
     * @return \Illuminate\Http\Response
     */
    public function show(organization $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\organization  $company
     * @return \Illuminate\Http\Response
     */
//    public function edit($id)
//    {
//        //
//        dd($id);
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\organization  $company
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

//        dd('hello');
//        $company_id = input::get('company_id');
        $company = Organization::findOrFail($id);
        $company->save();
        return redirect('/administration');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\organization  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(organization $company)
    {
        //
    }
}
