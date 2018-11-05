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
        $JobTitle = JobTitle::all();
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
        //
        $job = new Job();
        $job->job_title=Input::get('job_title');
        $job->job_description=Input::get('job_description');
        $job->note=Input::get('note');
        $job->is_deleted = 1;
        //dd($job);
        $job->save();
        return redirect("/administration/job");
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
        $JobTitle->job_title = $request->name;
        $JobTitle->job_description = $request->description;
        $JobTitle->note = $request->note;
        $JobTitle->save();
        return response()->json($JobTitle);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
//    public function edit($id)
//    {
//        $jobs = Job::where('id',$id)->first();
//        //dd($jobs);
//        return view('backend.HRIS.admin.JobTitle.edit', compact('jobs', 'id'));
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
//    public function update( Request $request , $id)
//    {
//        $job = Job::findOrFail($id);
//        //dd($job);
//        $input = $request->all();
//        $job->fill($input)->save();
//        $request->session()->flash('alert-success', 'New JobCategory has been updated!!!');
//        return redirect('/administration/job');
////        $hello ="i'm so ok";
////        dd($hello);
//    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job $job
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
//        $hello ="I will deleted you from my heart";
//        dd($hello);
        $job = Job::findOrFail($id);
        $job->delete();
        Session::flash('alert-danger', 'JobCategory successfully deleted!');
        return redirect('/administration/job');
        //
    }
}
