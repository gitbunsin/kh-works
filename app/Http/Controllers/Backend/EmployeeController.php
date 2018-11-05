<?php

namespace App\Http\Controllers\Backend;
use App\Employee;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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
        $db_ext2 = DB::connection('mysql');
        $employee = $db_ext->table('tbl1_hr_employee')
            ->join('kh-works-cloud.tbl_job_title', 'tbl1_hr_employee.job_title_code', '=', 'kh-works-cloud.tbl_job_title.id')
            ->select('kh-works.tbl1_hr_employee.*','kh-works-cloud.tbl_job_title.*')
            ->get();
     //dd($employee);
        return view('backend.HRIS.PIM.Employee.index',compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.HRIS.PIM.Employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $db_ext = DB::connection('mysql2');
        $employee = new Employee();
        $employee->emp_lastname = input::get('first_name');
        $employee->emp_lastname = input::get('last_name');
        $employee->emp_middle_name = input::get('middle_name');
        $employee->employee_id = input::get('emp_id');
        $employee->save();
        return redirect('/administration/employee');
    }
    public function ajaxImage(Request $request)
    {
        if ($request->isMethod('get'))
            return view('ajax_image_upload');
        else {
            $validator = Validator::make($request->all(),
                [
                    'file' => 'image',
                ],
                [
                    'file.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg)'
                ]);
            if ($validator->fails())
                return array(
                    'fail' => true,
                    'errors' => $validator->errors()
                );
            $extension = $request->file('file')->getClientOriginalExtension();
            $dir = 'uploads/';
            $filename = uniqid() . '_' . time() . '.' . $extension;
            $request->file('file')->move($dir, $filename);
            return $filename;
        }
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
