<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use App\Organization;
use App\Http\Requests\AuthAmdinRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminRegister extends Controller
{

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/administration/companyProfile';

    protected  $rule;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->rule = new AuthAmdinRequest();
    }

    protected function guard(){
        return Auth::guard('admins');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function showLoginForm()
    {
        return view('auth.register');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param Request $request
     * @return \App\User
     * @internal param array $data
     */
    protected function create(Request $request)

    {
        //dd($request);
        $validator = Validator::make($request->all(), $this->rule->registerAdminRules());
        $validator->validate();
        $organizeModel = new Organization();
        $organizeModel->email = $request['com_email'];
        $organizeModel->name = $request['com_name'];
        $organizeModel->password = Hash::make($request['com_password']);
        $organizeModel->save();
        $this->guard()->login($organizeModel);
//        dd($this->guard()->name);
        return redirect($this->redirectTo);
    }

    //
}
