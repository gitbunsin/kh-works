<?php

namespace App\Http\Controllers\Backend;
use App\Employee;
use App\EmployeeEmergencyContacts;
use App\EmployeeSkills;
use App\EmployeeWorkExperience;
use App\Http\Controllers\Controller;

use App\Jobs\SendVerificationEmployeeEmail;
use App\Mail\VerifyEmployeeMail;
use App\Organization;
use App\User;
use App\UserEmployee;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Psy\Util\Json;

class EmployeeController extends Controller
{
    public function __construct()
    {
    
        $this->middleware('isAdmin');
    
    }
    protected $redirectTo = '/administration/employee-personal-details';
    public function index()
    {
        if(Auth::guard('admins')->user()){
            $company_id = Auth::guard('admins')->user()->id;
        }else{
            $company_id = Auth::guard('employee')->user()->company_id;

        }
        $employee = DB::table('tbl1_hr_employee as e')
            ->select('e.*')
            ->where('e.company_id',$company_id)
            ->orderBy('e.emp_id','DESC')
            ->get();
//        $employee = Employee::all();
        return view('backend.HRIS.PIM.Employee.index',compact('employee'));
    }
    public function EmployeeInfo(){

        $employee_experience = EmployeeWorkExperience::all();
        $employee_skill = DB::table('tbl_hr_emp_skill as es')
            ->join('tbl_skill as s','es.skill_id','=','s.id')
            ->get();
//        $employee_skill = EmployeeSkills::all();
        return view('backend.HRIS.PIM.Employee.Details.index',compact('employee_experience','employee_skill'));
    }
    public function create()
    {
        return view('backend.HRIS.PIM.Employee.create');
    }
    public function edit($id)
    {
        $employee = Employee::where('id',$id);
        return view('backend.HRIS.PIM.Employee.edit');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Http\Response|string
     */
    public function store(Request $request)
    {
        //dd('hello');
//        dd($request->all());
        if(Auth::guard('admins')->user()){
            $company_id = Auth::guard('admins')->user()->id;
        }else{
            $company_id = Auth::guard('employee')->user()->company_id;

        }
        $employee = new Employee();
        $employee->emp_firstname = $request->emp_firstname;
        $employee->emp_lastname = $request->emp_lastname;
        $employee->emp_middle_name = $request->emp_middle_name;
        $employee->company_id = $company_id;
        $employee->job_title_code = $request->job_title;
        $employee->employee_id = $request->employee_id;
        $employee->company_id = $request->company_id;
        // if ($request->hasFile('photo'))
        // {
        //     $image = $request->file('photo');
        //     $mytime = \Carbon\Carbon::now()->toDateTimeString();
        //     $name = $image->getClientOriginalName();
        //     $size = $image->getClientSize();
        //     $type = $image->getMimeType();
        //     $destinationPath = public_path('/uploaded/EmpPhoto/');
        //     $image->move($destinationPath,$name);
        //     $employee->photo = $name;

        // }
        $employee->save();
        $employee_id = $employee->emp_id;
//        dd($employee_id);
        $check = $request->user_check;
        if ($check == 1) {
//            $emp_log = Employee::findOrFail($employee_id);
            $emp_log  = new UserEmployee();
            $emp_log->email = $request->user_email;
            $emp_log->role_id = $request->role;
            $emp_log->company_id = $request->company_id;
            $emp_log->employee_id = $employee_id;
            $emp_log->email_token = base64_encode($request->user_email);
            $emp_log->password = Hash::make($request->user_password);
            $emp_log->save();
            $company = Organization::findOrFail($request->company_id)->first();
            event(new Registered($emp_log));
            dispatch(new SendVerificationEmployeeEmail($emp_log,$company));
            return view('verification');
        }
        return redirect('/administration/employee')->with('success','Item created successfully!');
    }

    public  function  getJob()
    {
        return view('backend.HRIS.PIM.Employee.Job.index');
    }
    public function  getSalary()
    {


        return view('backend.HRIS.PIM.Employee.Salary.index');
    }
    public function getReport()
    {
        return view('backend.HRIS.PIM.Employee.report');
    }
    /**
     * Handle a registration request for the application.
     *
     * @param $token
     * @return \Illuminate\Http\Response
     * login employee still error
     */
        public function loginEmployee(Request $request,$company_name,$token)
        {

            return view('backend.HRIS.PIM.Employee.login',compact('company_name'));
        }

        public function EmployeeLogin(Request $request)
        {

            $email = Input::get('email');
            $password = Input::get('password');

            $authAdmin = Auth::guard('employee')->attempt(['email' => $email, 'password' => $password]);

            if (!$authAdmin) {
                return Redirect::route('login')->with('global', 'You do not confirm your email yet.');
            }
            return redirect($this->redirectTo);
        }

    public function deleteImage($filename)
    {
        File::delete('uploads/' . $filename);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($employee_id)
    {
        //
        $employee = Employee::where('emp_id',$employee_id)->first();
        return response()->json($employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $emp_id)
    {

//        dd($request->all());
        $employee = Employee::findOrFail($emp_id);
//        dd($employee);
        $check = $request->isPersonalDeatils;
//        dd($check);
        if($check == "1") {
            $employee->emp_lastname = $request->emp_lastname;
            $employee->emp_lastname = $request->emp_lastname;
            $employee->emp_firstname = $request->emp_firstname;
            $employee->employee_id = $request->employee_id;
            $employee->emp_other_id = $request->other_id;
            $employee->emp_dri_lice_num = $request->driver_license_number;
            $employee->emp_dri_lice_exp_date = \Carbon\Carbon::parse($request->emp_dri_lice_exp_date);
            $employee->emp_marital_status = $request->emp_marital_status;
            $employee->nation_code = $request->nationality;
            $employee->nickname = $request->nickname;
            $employee->emp_military_service = $request->military_service;
            $employee->driver_license = $request->driver_license;
            $employee->emp_gender = $request->emp_gender;
            $employee->smoker = $request->smoker;
            $employee->emp_birthday = \Carbon\Carbon::parse($request->date_of_birth);
            $employee->save();
        }
        $isContactDetials = $request->isContactDetails;
        if($isContactDetials == "1"){
            $employee->emp_street1 = $request->emp_street1;
            $employee->emp_street2 = $request->emp_street2;
            $employee->city_code = $request->city_code;
            $employee->provin_code = $request->provin_code;
            $employee->emp_zipcode = $request->emp_zipcode;
            $employee->coun_code = $request->coun_code;
            $employee->emp_hm_telephone = $request->emp_hm_telephone;
            $employee->emp_mobile = $request->emp_mobile;
            $employee->emp_work_telephone = $request->emp_work_telephone;
            $employee->emp_work_email = $request->emp_work_email;
            $employee->emp_oth_email = $request->emp_oth_email;
            $employee->save();
        }

        return response()->json($employee);

    }
//    =======================
    public function EditEmergencyContact(Request $request, $emergency_id){

        $EmergencyContact = EmployeeEmergencyContacts::findOrFail($emergency_id);
        return response()->json($EmergencyContact);
    }
    public  function UpdateEmergencyContact(Request $request , $emergency_id){


        return response()->json(['data'=>'success','ok'=>'data is working']);
    }
    public function addExperience(Request $request){


        return response()->json(['data'=>'ok']);
    }

    public function destroy($employee_id)
    {
        $employee = Employee::where('emp_id',$employee_id)->delete();
        return response()->json($employee);
    }

}
