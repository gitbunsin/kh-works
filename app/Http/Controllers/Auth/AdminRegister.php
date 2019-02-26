<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use App\Jobs\SendVerificationAdminEmail;
use App\Jobs\SendVerificationEmail;
use App\OrganizationGenInfo;
use App\Http\Requests\AuthAmdinRequest;
use Illuminate\Auth\Events\Registered;
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
//    protected $redirectTo = '/administration/companyProfile';

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
        $organizeModel = new OrganizationGenInfo();
        $organizeModel->email = $request['com_email'];
        $OrganizeModel->role_id = 1;
        $organizeModel->name = $request['com_name'];
        $organizeModel->password = Hash::make($request['com_password']);
        $organizeModel->email_token =  base64_encode($request['com_email']);
//        dd( base64_encode($request['com_email']));
        $organizeModel->save();
        event(new Registered($organizeModel));
        dispatch(new SendVerificationAdminEmail($organizeModel));
//        $this->guard()->login($organizeModel);
        return view('verificationAdmin');

//        dd($this->guard()->name);
//        return redirect($this->redirectTo);
    }

//    public function register(Request $request)
//    {
////        dd($request);
//        $this->validator($request->all())->validate();
//        event(new Registered($user = $this->create($request->all())));
//
//        dispatch(new SendVerificationEmail($user));
//
//        return view('verification');
//    }

    /**
     * Handle a registration request for the application.
     *
     * @param $token
     * @return \Illuminate\Http\Response
     */
    public function verify($token)
    {
        $organization = OrganizationGenInfo::where('email_token', $token)->first();
        $organization->verified = 1;

        if($organization->save()){
            return view('emailconfirm', ['organization' => $organization]);
        }
    }
}
