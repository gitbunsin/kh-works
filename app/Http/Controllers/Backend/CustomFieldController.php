<?php

namespace App\Http\Controllers\Backend;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Model\CustomField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomFieldController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::guard('admins')->user()){
            $company_id = Auth::guard('admins')->user()->id;
        }else{
            $company_id = Auth::guard('employee')->user()->company_id;
        }
        $CField = CustomField::where('company_id',$company_id)->get();
        $this->shareMenu();
        return view('backend.HRIS.PIM.Configuration.CustomField.index',compact('CField'));
    }
    public function ConfigurePim()
    {

        return view('backend.HRIS.PIM.Configuration.OptionalField.create');
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
        return view('backend.HRIS.PIM.Configuration.CustomField.create');
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
        $CField = CustomField::findOrFail($id);
        return view('backend.HRIS.PIM.Configuration.CustomField.edit',compact('CField'));
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
