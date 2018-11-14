<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Job;
use App\JobCategory;
use App\JobTitle;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class JobTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $JobTitle = JobTitle::orderBy('id', 'DESC')->get();
        return view('backend.HRIS.admin.JobTitle.index',compact('JobTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.HRIS.admin.JobTitle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $JobTitle = JobTitle::create($request->all());
        return response()->json($JobTitle);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($Job_id)
    {
        $JobTitle = JobTitle::findOrFail($Job_id);
        return response()->json($JobTitle);
    }

    public function update(Request $request, $Job_id)
    {
        $JobTitle = JobTitle::findOrFail($Job_id);
        $JobTitle->job_title = $request->job_title;
        $JobTitle->job_description = $request->job_description;
        $JobTitle->note = $request->note;
        $JobTitle->save();
        return response()->json($JobTitle);
    }

      public function destroy($id)
        {
            $job_title = JobTitle::destroy($id);
            return response()->json($job_title);
        }

}
