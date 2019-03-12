<?php

namespace App\Http\Controllers\Backend;

use App\Helper\AppHelper;
use App\Model\Country;
use App\Model\Employee;
use \App\Model\EmployeeEmergencyContacts;
use App\Model\EmployeeLanguage;
use App\Model\EmployeeLocation;
use \App\Model\EmployeeSkills;
use \App\Model\EmployeeWorkExperience;
use App\Http\Controllers\Controller;
use App\Jobs\SendVerificationEmployeeEmail;
use App\Model\EmployementStatus;
use App\Model\JobTitle;
use App\Model\Location;
use App\Model\UserEmployee;
use App\OrganizationGenInfo;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends BackendController
{
    protected $redirectTo = '/administration/employee-personal-details';

    public function __construct()
    {
        $this->middleware('isEmployee')->only('loginEmployee');
        $this->middleware('isAdmin')->except(['loginEmployee','EmployeeLogin']);
//        $this->middleware('isAdmin');
    }

    public function index()
    {
        $this->shareMenu();

//        $employee = Employee::find(1)->JobTitle->name;
//        dd($employee);
        if(Auth::guard('admins')->user()){
            $company_id = Auth::guard('admins')->user()->id;
        }else{
            $company_id = Auth::guard('employee')->user()->company_id;

        }
//        $employee = DB::table('employees as e')
//            ->select('e.*','j.*')
//            ->join('job_titles as j','e.job_title_code','=','j.id')
//            ->orderBy('e.emp_number','DESC')
//            ->get();
        $JobTitle = JobTitle::with('Employee')->get();

        //dd($employee->Employee->emp_lastname);
//        foreach ($employee->Employee as $e){
//           echo $e->company_id;
//        }
//        $employee = Employee::all();
        return view('backend.HRIS.PIM.Employee.index',compact('JobTitle'));
    }

    public function EmployeeInfo(){
        $this->shareMenu();
        $employee_experience = EmployeeWorkExperience::all();
        $employee_skill = DB::table('employee_skills as es')
            ->join('skills as s','es.skill_id','=','s.id')
            ->get();

        if(Auth::guard('employee')->user())
        {
            $EmployeeID = Auth::guard('employee')->user()->id;
        }else{

            $listCompanyEmployee = Employee::where('emp_number',Auth::guard('admins')->user()->id)->first();
            $EmployeeID = $listCompanyEmployee->emp_number;

        }
        $EmployeeDetailsInfo = Employee::where('emp_number',$EmployeeID)->first();
        //dd($EmployeeID);
        return view('backend.HRIS.PIM.Employee.Details.index',
            compact('employee_experience',
                'employee_skill',
                'EmployeeDetailsInfo'));
    }

    public function create()
    {
        $this->shareMenu();
        return view('backend.HRIS.PIM.Employee.create');
    }

    public function edit($id)
    {
        $this->shareMenu();
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
        //dd($request->all());
        //dd('hello');
//        dd($request->all());
//        if(Auth::guard('admins')->user()){
//            $company_id = Auth::guard('admins')->user()->id;
//        }else{
//            $company_id = Auth::guard('employee')->user()->company_id;
//
//        }
        $employee = new Employee();
        $employee->emp_firstname = $request->emp_firstname;
        $employee->emp_lastname = $request->emp_lastname;
        $employee->emp_middle_name = $request->emp_middle_name;
        $employee->company_id = Auth::guard('admins')->user()->id;
//        $employee->job_titles_code = $request->job_titles;
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
        $employee_id = $employee->emp_number;
//        dd($employee_id);
        $check = $request->user_check;
        if ($check == 1) {
            //dd('hello');
//            $emp_log = Employee::findOrFail($employee_id);
            $emp_log  = new UserEmployee();
            $emp_log->email = $request->user_email;
            $emp_log->role_id = 2;
            $emp_log->company_id = Auth::guard('admins')->user()->id;
//            $emp_log->employee_id = $employee_id;
            $emp_log->email_token = base64_encode($request->user_email);
            $emp_log->password = Hash::make($request->user_password);
            $emp_log->save();
           // dd($emp_log);
            //dd($emp_log->company_id);
            $company = OrganizationGenInfo::findOrFail($emp_log->company_id)->first();
           // dd($company);
            event(new Registered($emp_log));
            dispatch(new SendVerificationEmployeeEmail($emp_log,$company));
            return view('verification');
        }
        return redirect('/administration/employee')->with('success','Item created successfully!');
    }

    public  function  GetJob()
    {

        $this->shareMenu();
        if(Auth::guard('employee')->user())
        {
            $EmployeeID = Auth::guard('employee')->user()->id;
        }else{

            $listCompanyEmployee = Employee::where('emp_number',Auth::guard('admins')->user()->id)->first();
            $EmployeeID = $listCompanyEmployee->emp_number;
        }

        $EmployeeDetailsJob= Employee::where('emp_number',$EmployeeID)->first();

      //  $EmployeeLocation = Employee::with('location')->get();
        //dd($EmployeeLocation);
//        dd($EmployeeDetailsJob);
        return view('backend.HRIS.PIM.Employee.Job.index',compact('EmployeeDetailsJob'));
    }
//    public function  getSalary()
//    {
//        $this->shareMenu();
//        return view('backend.HRIS.PIM.Employee.Salary.index');
//    }
    public function getReport()
    {
        $this->shareMenu();
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

//            $this->shareMenu();
            return view('backend.HRIS.PIM.Employee.login',compact('company_name'));
        }

        public function EmployeeLogin(Request $request)
        {

            //dd("hello");

            $email = Input::get('email');
            $password = Input::get('password');
           // dd($email);
            $authAdmin = Auth::guard('employee')->attempt(['email' => $email, 'password' => $password]);
//            dd($authAdmin);
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
        $employee = Employee::where('emp_number',$employee_id)->first();
        return response()->json($employee);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //dd('hello');
//        dd($request->all());
        //dd($request->gender);
            $employee = Employee::findOrFail($id);

            $checkEmployee = $request->emp_lastname;
            if($checkEmployee){

                $employee->emp_lastname = $request->emp_lastname;
                $employee->emp_lastname = $request->emp_lastname;
                $employee->emp_firstname = $request->emp_firstname;
                $employee->employee_id = $request->employee_id;
                $employee->emp_other_id = $request->other_id;
                $employee->emp_dri_lice_num = $request->driver_license_number;
                $employee->emp_dri_lice_exp_date = \Carbon\Carbon::parse($request->emp_dri_lice_exp_date);
                $employee->emp_marital_status = $request->emp_marital_status;
                $gender = (int) $request->gender;
                // dd($gender);
                $employee->emp_gender = 1;
                // $employee->nation_code = $request->nationality;
                $employee->emp_nick_name = $request->nickname;
                $employee->emp_military_service = $request->military_service;
                $employee->emp_dri_lice_num = $request->driver_license;
                $employee->emp_gender = $request->emp_gender;
                $employee->emp_smoker = $request->smoker;
                $employee->emp_birthday = \Carbon\Carbon::parse($request->date_of_birth);
                $employee->save();


            }


            //Job

            $JobTitles = $request->JobTitleCode;
             if($JobTitles)
             {
//                 dd($JobTitles);
                 $employee->job_title_code = $request->JobTitleCode;
                 $employee->eeo_cat_code = $request->JobCategory;
                 $employee->joined_date = $request->JoinDate;
                 $employee->emp_status = $request->EmploymentStatus;
                 $employee->work_station = $request->SubUnit;
                 $employee->save();
                 return redirect('/administration/employee-job')->with('success','Item has been edit successfully');

             }
             $location = $request->location;
             if($location){
                 if(Auth::guard('employee')->user())
                 {
                     $EmployeeID = Auth::guard('employee')->user()->id;
                 }else{

                     $listCompanyEmployee = Employee::where('emp_number',Auth::guard('admins')->user()->id)->first();
                     $EmployeeID = $listCompanyEmployee->emp_number;
                 }
                 $EmployeeLocation = new EmployeeLocation();
                 $EmployeeLocation->emp_number = $EmployeeID;
                 $EmployeeLocation->location_id = $request->location;
                 $EmployeeLocation->save();


             }


        return redirect('/administration/employee-personal-details')->with('success','Item has been edit successfully');

       // return response()->json($employee);

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
        $employee = Employee::where('em_number',$employee_id)->delete();
        return response()->json($employee);
    }

}
