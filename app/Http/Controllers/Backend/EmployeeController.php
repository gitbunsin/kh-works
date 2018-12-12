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
        $employee = DB::table('tbl1_hr_employee')
            ->join('tbl_job_title', 'tbl1_hr_employee.job_title_code', '=', 'tbl_job_title.id')
            ->select('tbl1_hr_employee.*','tbl_job_title.*')
            ->orderBy('tbl1_hr_employee.emp_id','DESC')
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
        $employee = new Employee();
        $employee->emp_lastname = $request->emp_firstname;
        $employee->emp_lastname = $request->emp_middle_name;
        $employee->emp_middle_name = $request->emp_lastname;
        $employee->job_title_code = $request->job_title;
        $employee->employee_id = $request->employee_id;
        dd($request->file('files'));
//        dd($request->file('file'));
//        if ($request->hasFile('file')) {
//            $image = $request->file('file');
//            $mytime = \Carbon\Carbon::now()->toDateTimeString();
//            $name = $image->getClientOriginalName();
//            $size = $image->getClientSize();
//            $type = $image->getMimeType();
//            $destinationPath = public_path('/uploads');
//            $image->move($destinationPath,$name);
//        }
        $employee->save();
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
