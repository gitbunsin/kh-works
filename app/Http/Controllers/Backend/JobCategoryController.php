<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Model\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobCategoryController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    public function index()
    {
        $this->shareMenu();
        $JobCategory = JobCategory::all();
        return view('backend.HRIS.admin.JobCategory.index',compact('JobCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->shareMenu();
        return view('backend.HRIS.admin.JobCategory.create');
//        $JobCategory = JobCategory::create($request->all());
//        return response()->json($JobCategory);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        if(Auth::guard('admins')->user()){

                $company_id =Auth::guard('admins')->user()->id;
        }else{
            $company_id =Auth::guard('employee')->user()->company_id;
        }
        $job_category = new JobCategory();
        $job_category->company_id = $company_id;
        $job_category->name = $request->name;
        $job_category->description = $request->description;
        $job_category->save();

        return redirect('/administration/jobs-category')->with('success','Item created successfully!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
//    public function show($Job_id)
//    {
//        $JobCategory = JobCategory::findOrFail($Job_id);
//        return response()->json($JobCategory);
//    }
    public function edit($id)
    {
//        dd('hello');
        $this->shareMenu();
        $job_category = JobCategory::findorFail($id);
        return view('backend.HRIS.admin.JobCategory.edit',compact('job_category'));
//        $JobCategory = JobCategory::create($request->all());
//        return response()->json($JobCategory);
    }

    public function update(Request $request, $id)
    {
        if(Auth::guard('admins')->user()){

            $company_id =Auth::guard('admins')->user()->id;
            }else{
                $company_id =Auth::guard('employee')->user()->company_id;
            }
        $JobCategory = JobCategory::findOrFail($id);
        $JobCategory->name = $request->name;
        $JobCategory->company_id = $company_id;
        $JobCategory->description = $request->description;
        $JobCategory->save();
        return redirect('/administration/jobs-category')->with('success','Item edited successfully!');
    }
    public function destroy($id)
    {

        $job_titles = JobCategory::findOrFail( $id );
        $job_titles->delete();
        return  redirect('/administration/jobs-category')->with('success','Item success successfully!');

    }
}
