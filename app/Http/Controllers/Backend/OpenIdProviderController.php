<?php

namespace App\Http\Controllers\Backend;
use App\Customer;
use App\CustomField;
use App\Http\Controllers\Controller;

use App\Model\OpenidProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OpenIdProviderController extends Controller
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

        $OProvoider = OpenIdProvider::where('company_id',$company_id)->get();
        return view('backend.HRIS.admin.Configuration.OpenIDProvider.index',compact('OProvoider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.HRIS.admin.Configuration.OpenIDProvider.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::guard('admins')->user()){
            $company_id = Auth::guard('admins')->user()->id;
        }else{
            $company_id = Auth::guard('employee')->user()->company_id;
        }

        $OpenID = new OpenIdProvider();
        $OpenID->company_id = $company_id;
        $OpenID->provider_name = $request->Name;
        $OpenID->provider_url = $request->Uri;
        $OpenID->status = 1;
        $OpenID->save();
        return redirect('/administration/open-id-provider')->with('success',"Item has been added successfully");
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

        $OpenIDProvider = OpenIdProvider::findOrFail($id);
        return view('backend.HRIS.admin.Configuration.OpenIDProvider.edit',compact('OpenIDProvider'));

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
        if(Auth::guard('admins')->user()){
            $company_id = Auth::guard('admins')->user()->id;
        }else{
            $company_id = Auth::guard('employee')->user()->company_id;
        }

        $OpenID = OpenIdProvider::findOrFail($id);
        $OpenID->company_id = $company_id;
        $OpenID->provider_name = $request->Name;
        $OpenID->provider_url = $request->Uri;
        $OpenID->status = 1;
        $OpenID->save();
        return redirect('/administration/open-id-provider')->with('success',"Item has been Updated successfully");
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
