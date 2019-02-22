<?php

namespace App\Http\Controllers\Backend;
use App\AuthClicent;
use App\Customer;
use App\CustomField;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthClientController extends Controller
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
        $Aclient = AuthClicent::where('company_id',$company_id)->get();
        //dd($Aclient);
        return view('backend.HRIS.admin.Configuration.AuthClient.index',compact('Aclient'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.HRIS.admin.Configuration.AuthClient.create');
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
        $AClient = new AuthClicent();
        $AClient->company_id = $company_id;
        $AClient->client_id = $request->ID;
        $AClient->client_secret = $request->Secret;
        $AClient->redirect_uri =  $request->Uri;

        $AClient->save();

        return redirect('/administration/register-auth-client')->with('success','Item has been added successfully');
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
        $AClient = AuthClicent::findOrFail($id);
        return view('backend.HRIS.admin.Configuration.AuthClient.edit',compact('AClient'));
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
        $AClient = AuthClicent::findOrFail($id);
        $AClient->company_id = $company_id;
        $AClient->client_id = $request->ID;
        $AClient->client_secret = $request->Secret;
        $AClient->redirect_uri =  $request->Uri;
        $AClient->save();

        return redirect('/administration/register-auth-client')->with('success','Item has been added successfully');
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
