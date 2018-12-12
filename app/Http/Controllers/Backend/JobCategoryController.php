<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\JobCategory;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        return view('backend.HRIS.admin.JobCategory.create');
//        $JobCategory = JobCategory::create($request->all());
//        return response()->json($JobCategory);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $job_category = new JobCategory();
        $job_category->name = $request->name;
        $job_category->description = $request->description;
        $job_category->save();

        return redirect('/administration/jobs-category');
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
        $job_category = JobCategory::findorFail($id);
        return view('backend.HRIS.admin.JobCategory.edit',compact('job_category'));
//        $JobCategory = JobCategory::create($request->all());
//        return response()->json($JobCategory);
    }

    public function update(Request $request, $id)
    {
        $JobCategory = JobCategory::findOrFail($id);
        $JobCategory->name = $request->name;
        $JobCategory->description = $request->description;
        $JobCategory->save();
        return redirect('/administration/jobs-category');
    }



    public function destroy($id)
    {
        $JobCategory = JobCategory::destroy($id);
        return response()->json($JobCategory);
    }
}
