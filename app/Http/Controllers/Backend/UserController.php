<?php

namespace  App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_id = Auth::guard('admins')->user()->id;
        $u = User::where('company_id',$company_id)->get();
        return view('backend.HRIS.admin.UserManagement.User.index',compact('u'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.HRIS.admin.UserManagement.User.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $u = new User();
        $u->name = $request->username;
        $u->email = $request->email;
        $u->email_token = base64_encode($request->user_email);
        $u->password = Hash::make($request->password);
        $u->company_id = Auth::guard('admins')->user()->id;
        if($request->status == "1"){
            $u->verified = 1;
        }else{
            $u->verified = 0;
        }
        $u->save();
        return redirect('/administration/user')->with('success','Item created successfully!');
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
        $company_id = Auth::guard('admins')->user()->id;
        $u = DB::table('users as u')
            ->select('u.*')
            ->where('id',$id)
            ->where('company_id',$company_id)
            ->first();
//        dd($u);
        return view('backend.HRIS.admin.UserManagement.User.edit',compact('u'));
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
        $u = User::findOrFail($id);
        $u->name = $request->username;
        $u->email = $request->email;
        $u->email_token = base64_encode($request->user_email);
        $u->password = Hash::make($request->password);
        $u->company_id = Auth::guard('admins')->user()->id;
        if($request->status == "1"){
            $u->verified = 1;
        }else{
            $u->verified = 0;
        }
        $u->save();
        return redirect('/administration/user')->with('success','Item edited successfully!');
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
