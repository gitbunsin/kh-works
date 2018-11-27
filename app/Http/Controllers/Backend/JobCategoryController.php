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
    public function store(Request $request)
    {
        $JobCategory = JobCategory::create($request->all());
        return response()->json($JobCategory);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($Job_id)
    {
        $JobCategory = JobCategory::findOrFail($Job_id);
        return response()->json($JobCategory);
    }

    public function update(Request $request, $Job_id)
    {
        $JobCategory = JobCategory::findOrFail($Job_id);
        $JobCategory->name = $request->name;
        $JobCategory->description = $request->description;
        $JobCategory->save();
        return response()->json($JobCategory);
    }

    public function destroy($id)
    {
        $JobCategory = JobCategory::destroy($id);
        return response()->json($JobCategory);
    }
}
