<?php

namespace App\Http\Controllers\Backend;
use App\Employee;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Psy\Util\Json;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_id = Auth::guard('admins')->user()->id;
        $employee = DB::table('tbl1_hr_employee as e')
            ->select('e.*','t.*')
            ->join('tbl_job_title as t', 'e.job_title_code', '=', 't.id')
            ->where('e.company_id',$company_id)
            ->orderBy('e.emp_id','DESC')
            ->get();
//        $employee = Employee::all();
        return view('backend.HRIS.PIM.Employee.index',compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
//        dd($request->all());
        $employee = new Employee();
        $employee->emp_lastname = $request->emp_firstname;
        $employee->emp_lastname = $request->emp_middle_name;
        $employee->emp_middle_name = $request->emp_lastname;
        $employee->job_title_code = $request->job_title;
        $employee->employee_id = $request->employee_id;
        $employee->company_id = $request->company_id;


        if ($request->hasFile('photo'))
        {

            $image = $request->file('photo');
            $mytime = \Carbon\Carbon::now()->toDateTimeString();
            $name = $image->getClientOriginalName();
            $size = $image->getClientSize();
            $type = $image->getMimeType();
            $destinationPath = public_path('/uploaded/EmpPhoto/');
            $image->move($destinationPath,$name);
            $employee->photo = $name;

        }
        $employee->save();
        $check = $request->user_check;
        if ($check == 1) {
            $user = new User();
            $user->name = $request->user_name;
            $user->email = $request->user_email;
            $user->password = Hash::make($request->user_password);
            $user->save();
        }

        return redirect('administration/employee');
    }
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
//            if ($request->hasFile('file')) {
//                $image = $request->file('file');
//                $extension = $image->getClientOriginalName();
//                $dir = 'uploads/';
//                $filename = uniqid() . '_' . time() . '.' . $extension;
//                $request->file('file')->move($dir, $filename);
//                return $filename;
//            }
//        }
//
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
