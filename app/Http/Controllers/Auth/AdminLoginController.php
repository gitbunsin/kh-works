<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\OrganizationGenInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
     protected $redirectTo = '/administration/companyProfile';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //dd('hello');
        $this->middleware('guest:admins')->except('logout');
        $this->middleware('guest:web')->except('logout');
    }
    protected  function login(Request $request)
    {
        //dd('hello');
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = Input::get('email');
        $password = Input::get('password');
        //dd($email,$password);

        $authAdmin = Auth::guard('admins')->attempt(['email' => $email, 'password' => $password,'verified'=> 1]);

        if (!$authAdmin) {
            return Redirect::route('login')->with('global', 'You do not confirm your email yet.');
        }
        return redirect($this->redirectTo);

//        if (Auth::guard('admins')->attempt(['email' => $email, 'password' => $password ,'verified'=> 1])) {
//            // Authentication passed...
//
//        }else{
//            return Redirect::route('login')->with('global', 'These credentials do not match our records.');
//        }
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
}
