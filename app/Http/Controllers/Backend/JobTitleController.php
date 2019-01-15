<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Job;
use App\JobCategory;
use App\JobTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class JobTitleController extends Controller
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
        $JobTitle = JobTitle::orderBy('id', 'DESC')->where('is_deleted',0)->get();
        return view('backend.HRIS.admin.JobTitle.index',compact('JobTitle'));
    }

    public function edit($id)
    {

        $job_title = JobTitle::findOrFail($id);
//        dd($job_title);
        return view('backend.HRIS.admin.JobTitle.edit',compact('job_title'));
    }

    public function update(Request $request,$id)
    {
//        dd($request->all());

        $job_title = JobTitle::findOrFail($id);
        $job_title->job_title = $request->job_title;
        $job_title->job_description = $request->job_description;
        $job_title->note = $request->note;
        $job_title->is_deleted = 0;
        $job_title->save();
//        dd($job_title);
        return  redirect('/administration/jobs-title');
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
        //$JobTitle = JobTitle::create($request->all());
        $j = new JobTitle();
        $user_id = input::get('user_id');
        $j->job_title = input::get('job_title');
        $j->job_description = input::get('job_description');
        $j->note = input::get('note');
        $j->is_deleted = 0;
        $j->created_by = $user_id;
        $j->company_id = Auth::guard('admins')->user()->id;
        $j->fd = \Carbon\Carbon::now();
        $j->td = \Carbon\Carbon::now();
        $j->save();
        session()->flash('success', 'Task was successful!');
        return redirect('/administration/jobs-title');
//        return response()->json($JobTitle);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
//    public function show($Job_id)
//    {
//        $JobTitle = JobTitle::findOrFail($Job_id);
//        return response()->json($JobTitle);
//    }

//    public function update(Request $request, $Job_id)
//    {
//        $JobTitle = JobTitle::findOrFail($Job_id);
//        $JobTitle->job_title = $request->job_title;
//        $JobTitle->job_description = $request->job_description;
//        $JobTitle->note = $request->note;
//        $JobTitle->save();
//        return response()->json($JobTitle);
//    }

//      public function destroy($id)
//        {
//            $job_title = JobTitle::destroy($id);
//            return response()->json($job_title);
//        }

}
