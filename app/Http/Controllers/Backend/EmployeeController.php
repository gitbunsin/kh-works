<?php

namespace App\Http\Controllers\Backend;
use App\Employee;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $db_ext = DB::connection('mysql2');
        $employee = $db_ext->table('tbl1_hr_employee')
            ->join('kh-works.tbl_job_title', 'tbl1_hr_employee.job_title_code', '=', 'kh-works.tbl_job_title.id')
            ->select('hris.tbl1_hr_employee.*','kh-works.tbl_job_title.*')
            ->orderBy('tbl1_hr_employee.emp_id','DESC')
            ->get();
        return view('backend.HRIS.PIM.Employee.index',compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function create()
//    {
//        //
//        return view('backend.HRIS.PIM.Employee.create');
//    }

    public function store(Request $request)
    {
        $employee = Employee::create($request->all());
        return response()->json($employee);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public function store(Request $request)
//    {
//        $db_ext = DB::connection('mysql2');
//        $employee = new Employee();
//        $employee->emp_lastname = input::get('first_name');
//        $employee->emp_lastname = input::get('last_name');
//        $employee->emp_middle_name = input::get('middle_name');
//        $employee->job_title_code = input::get('job_title');
//        $employee->employee_id = input::get('emp_id');
//        $create_user = new User();
//        $create_user->name = input::get('user_name');
//        $create_user->email = input::get('user_email');
//        $create_user->password = Hash::make(input::get('user_password'));
//        $create_user->save();
//        $employee->save();
//        return redirect('/administration/employee');
//    }
//    public function ajaxImage(Request $request)
//    {
//        if ($request->isMethod('get'))
//            return view('ajax_image_upload');
//        else {
//            $validator = Validator::make($request->all(),
//                [
//                    'file' => 'image',
//                ],
//                [
//                    'file.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg)'
//                ]);
//            if ($validator->fails())
//                return array(
//                    'fail' => true,
//                    'errors' => $validator->errors()
//                );
//            $extension = $request->file('file')->getClientOriginalExtension();
//            $dir = 'uploads/';
//            $filename = uniqid() . '_' . time() . '.' . $extension;
//            $request->file('file')->move($dir, $filename);
//            return $filename;
//        }
//    }

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
    public function update(Request $request, $employee_id)
    {
        $employee = Employee::where('emp_id', $employee_id)->firstOrFail();
        $employee->emp_lastname = $request->emp_lastname;
        $employee->emp_lastname = $request->emp_lastname;
        $employee->emp_firstname = $request->emp_firstname;
        $employee->employee_id = $request->employee_id;
        $employee->save();
        return response()->json($employee);
    }

    public function destroy($employee_id)
    {
        $employee = Employee::where('emp_id',$employee_id)->delete();
        return response()->json($employee);
    }

}
