<?php

namespace App\Http\Controllers\Auth;
use  App\Model\Backend\Organization;
use App\Model\Frontend\Company;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Zend\Diactoros\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/kh-works/lists';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function showLoginForm(Request $request)
    {
        return view('auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'emp_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
//        dd($data);
        return User::create([
            'name' => $data['emp_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


    public function  HrRegister(){
        $this->validate(request(), [
            'com_name' => 'required',
            'com_email' => 'required|email',
            'com_password' => 'required|min:3|max:20',
            'password_confirmation' => 'required|min:3|max:20|same:com_password',
        ]);
        $Hr = new Organization();
        $company = new Company();
        $Hr->name = input::get('com_name');
        $Hr->email = input::get('com_email');
        $Hr->password = Hash::make(input::get('com_password'));
        $company->name = input::get('com_name');
        $company->email = input::get('com_email');
        $company->password = Hash::make(input::get('com_password'));
        $company->save();
        $Hr->save();
        Session::put('user_register', $Hr);
        return redirect('administration/companyProfile');
    }
}
