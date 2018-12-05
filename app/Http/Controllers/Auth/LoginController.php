<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admins')->except('logout');
        $this->middleware('guest:web')->except('logout');

    }
    public function showLoginForm()
    {
        return view('auth.login');
    }


    protected  function login(Request $request)
    {
        $email = Input::get('email');
        $password = Input::get('password');

        $authAdmin = Auth::guard('admins')->attempt(['email' => $email, 'password' => $password]);
        $auth = Auth::guard()->attempt(['email' => $email, 'password' => $password]);
        if (!$auth && !$authAdmin) {
            return redirect()->route('login');
        }

        return redirect($this->redirectTo);

     }


//        $organize = new Organization();
//        dd($organize);

//                $rules = array(
//                    'email' => 'required',
//                    'password' => 'required'
//                );
//
//                $validate_admin_login = Validator::make(Input::all(), $rules);
//                if ($validate_admin_login->fails()) {
//                    $messages = $validate_admin_login->messages();
//                    return Redirect('/login')
//                        ->withErrors($messages)
//                        ->withInput(Input::except('password'));
//                } else {
//                    $d = array(
//                        Input::get('email'), Hash::make(Input::get('password'))
//                    );
//                    $user_log = DB::table('users')
//                        ->select('id','name','email', 'password')
//                        ->where('email', Input::get('email'))
//                        ->first();
//                    //dd($user_log);
//                    $db_kh_works = DB::connection('mysql2');
//                    $company_log = $db_kh_works->table('tbl_organization_gen_info')
//                        ->select('id','name', 'email', 'password','phone')
//                        ->where('email', Input::get('email'))
//                        ->first();
//                      //dd($company_log);
//
//                    $CVs = DB::table('users')
//                        ->join('tbl_cvs', 'users.id', '=', 'tbl_cvs.user_id')
//                        ->select('tbl_cvs.user_id', 'users.*')
//                        ->where('email', Input::get('email'))
//                        ->get()
//                        ->first();
//                }
//                Session::put('user_log', $user_log);
//                Session::put('company_log',$company_log);
//                //dd($company_log);
//                if ($company_log && Hash::make(Input::get('password') == $company_log->password))
//                    {
//                      //dd($company_log->name);
//                    return redirect('/administration/companyProfile');
//                }
//                else if ($user_log && Hash::make(Input::get('password') == $user_log->password))
//                {
//                    if ($CVs) {
//                        return Redirect('/kh-works');
//                    } else {
//                        return Redirect('/kh-works/lists');
//                    }
//                }
//                else
//                {
//                    //$request->Session()->flash('message', "User doesn't not exit Please Register !");
//                    return Redirect('/login');
//                }
//    }
    protected function logout(Request $request) {
        // dd(Auth::guard('admins')->logout());
        //Session::flush();
        Auth::guard('admins')->logout();
        Auth::logout();
        return redirect('/login');
    }
}
