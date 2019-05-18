<?php

namespace  App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Jobs\SendVerificationEmployeeEmail;
use App\Model\UserEmployee;
use App\OrganizationGenInfo;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class UserController extends BackendController
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        parent::shareMenu();
//        $company_id = Auth::guard('admins')->user()->id;
//        $u = User::where('company_id',$company_id)->get();
         $userEmployee = UserEmployee::with(['role','company','employee'])->get();
       // dd($userEmployee);
        return view('backend.HRIS.admin.UserManagement.User.index',compact('userEmployee'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        parent::shareMenu();
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
        $user = UserEmployee::where('email', '=', Input::get('email'))->first();
        if ($user) {
            // user doesn't exist
            return redirect('/administration/user')->with('warning',"user email already existing");

        }else {
            $UserEmployee = UserEmployee::create($request->all());
            $UserEmployee->email = $request->email;
            $UserEmployee->role()->associate($request->role_id);
            $UserEmployee->employee()->associate($request->employee_name);
            $UserEmployee->company()->associate(Auth::guard('admins')->user()->id);
            $UserEmployee->email_token = base64_encode($request->email);
            $UserEmployee->password = Hash::make($request->password);
            $isVerified = $request->status;
            // dd($isVerified);
            if ($isVerified == "0") {

                $UserEmployee->verified = 0;
            } else {
                $UserEmployee->verified = 1;
            }
            $UserEmployee->save();
            $company = OrganizationGenInfo::findOrFail($UserEmployee->company_id)->first();
//            dd($company);
            event(new Registered($UserEmployee));
            dispatch(new SendVerificationEmployeeEmail($UserEmployee, $company));
            return redirect('/administration/user')->with('success', 'You have successfully registered. An email is sent to you for verification!');
        }
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
        $userEmployee = UserEmployee::findorFail($id);

        return view('backend.HRIS.admin.UserManagement.User.edit',compact('userEmployee'));
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
        $UserEmployee  = UserEmployee::findorFail($id);
        $UserEmployee->email = $request->email;
        $UserEmployee->role()->associate($request->role_id);
        $UserEmployee->employee()->associate($request->employee_name);
        $UserEmployee->company()->associate(Auth::guard('admins')->user()->id);
        $UserEmployee->email_token = base64_encode($request->email);
        $UserEmployee->password = Hash::make($request->password);
        $isVerified = $request->status;
       // dd($isVerified);
        if($isVerified == "0"){

            $UserEmployee->verified = 0;
        }else{
            $UserEmployee->verified = 1;
        }
        $UserEmployee->save();
        //
//        $u = User::findOrFail($id);
//        $u->name = $request->username;
//        $u->email = $request->email;
//        $u->email_token = base64_encode($request->user_email);
//        $u->password = Hash::make($request->password);
//        $u->company_id = Auth::guard('admins')->user()->id;
//        if($request->status == "" ){
//            $u->verified = 1;
//        }else{
//            $u->verified = 0;
//        }
//        $u->save();
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
