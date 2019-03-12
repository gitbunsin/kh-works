<?php

namespace App\Http\Controllers\Backend;
use App\Helper\AppHelper;
use App\Helper\MenuHelper;
use App\Http\Controllers\Controller;
use App\Job;
use App\Model\JobTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class JobTitleController extends BackendController
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
        $JobTitle = JobTitle::all();
        //$menus = MenuHelper::getInstance()->getSidebarMenu(AppHelper::getInstance()->getRoleID(), AppHelper::getInstance()->getCompanyId());
        return view('backend.HRIS.admin.JobTitle.index',compact('JobTitle'));
    }

    public function edit($id)
    {
        $this->shareMenu();
        $job_titles = JobTitle::findOrFail($id);
//        dd($job_titles);
        return view('backend.HRIS.admin.JobTitle.edit',compact('job_titles'));
    }

    public function update(Request $request,$id)
    {
        
        $job_titles = JobTitle::findOrFail($id);
        $job_titles->name = $request->job_titles;
        $job_titles->description = $request->job_description;
        $job_titles->is_deleted = 0;
        $job_titles->save();


        // dd($job_titles);
        return  redirect('/administration/jobs-title')->with('success','Item Edited successfully!');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->shareMenu();
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
        $j->name = input::get('job_titles');
        $j->description = input::get('job_description');
        $j->is_deleted = 0;
        $j->company_id = Auth::guard('admins')->user()->id;
        $j->save();
        session()->flash('success', 'Task was successful!');
        return redirect('/administration/jobs-title')->with('success','Item created successfully!');
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
//        $JobTitle->job_titles = $request->job_titles;
//        $JobTitle->job_description = $request->job_description;
//        $JobTitle->note = $request->note;
//        $JobTitle->save();
//        return response()->json($JobTitle);
//    }

    public function destroy( $id, Request $request )
    {
        $job_titles = JobTitle::findOrFail( $id );
        $job_titles->delete();
        return  redirect('/administration/jobs-title')->with('success','Item success successfully!');
    }

}
