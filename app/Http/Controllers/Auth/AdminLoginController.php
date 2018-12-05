<?php
namespace App\Http\Controllers\Auth;

use App\Organization;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/administration';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest:admins')->except('logout');
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
        return Organization::create([
            'name' => $data['emp_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


//    public function  HrRegister()
//    {
//            $this->validate(request(), [
//                'com_name' => 'required',
//                'com_email' => 'required|email',
//                'com_password' => 'required|min:3|max:20',
//                'password_confirmation' => 'required|min:3|max:20|same:com_password',
//            ]);
//            $Hr = new Organization();
//            $company = new Company();
//            $Hr->name = input::get('com_name');
//            $Hr->email = input::get('com_email');
//            $Hr->password = Hash::make(input::get('com_password'));
//            $company->name = input::get('com_name');
//            $company->email = input::get('com_email');
//            $company->password = Hash::make(input::get('com_password'));
//            $company->save();
//            $Hr->save();
//            Session::put('user_register', $Hr);
//            return redirect('administration/companyProfile');
//    }
//    public function loginAdmin()
//    {
//        $email = Input::get('email');
//        $password = Input::get('password');
//        $authAdmin = Auth::guard('admins')->attempt(['email' => $email, 'password' => $password]);
//        dd($authAdmin);
//    }
}
