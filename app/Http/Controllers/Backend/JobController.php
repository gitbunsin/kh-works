<?php

namespace App\Http\Controllers\Backend;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Job;
use App\Vacancy;
use App\VacancyAttachment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job = Job::orderBy('id','DESC')->get();
        return view('backend.HRIS.Recruitment.Job.index',compact('job'));
        //
    }
//    public function store(Request $request)
//    {
//        $job = Job::create($request->all());
//        return response()->json($job);
//    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($job_id)
    {
        $job = Job::findOrFail($job_id);
        return response()->json($job);
    }

//    public function update(Request $request, $job_id)
//    {
//        $job = Job::findOrFail($job_id);
//        $job->job_title = $request->job_title;
//        $job->job_description = $request->job_description;
//        $job->note = $request->note;
//        $job->save();
//        return response()->json($job);
//    }

    public function destroy($id)
    {
        $job = Job::destroy($id);
        return response()->json($job);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.HRIS.Recruitment.Job.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        //Insert Vacancy
        $vacancy = new Vacancy();
            $vacancy->job_title_code = $request->job_title_code;
            $vacancy->hiring_manager_id = $request->hiring_manager;
            $vacancy->name = $request->name;
            $vacancy->status = 1;
            $vacancy->save();
            $vacancy_id = $vacancy->id;
            //dd($vacancy_id);
        //new job attachment
        $vacancy_attachment = new VacancyAttachment();
        if ($request->hasFile('resume')) {
            $image = $request->file('resume');
            $mytime = \Carbon\Carbon::now()->toDateTimeString();
            $name = $image->getClientOriginalName();
            $size = $image->getClientSize();
            $type = $image->getMimeType();
            $destinationPath = public_path('/uploaded');
            $image->move($destinationPath,$name);
            $vacancy_attachment->vacancy_id = $vacancy_id;
            $vacancy_attachment->file_name = $name;
            $vacancy_attachment->file_size = $size;
            $vacancy_attachment->file_type = $type;
            $vacancy_attachment->attachment_type =
            $vacancy_attachment->comment =
            $vacancy_attachment->save();
        }
         //adding new job
        $job = new Job();
            $job->CompanyName = $request->CompanyName;
            $job->contactName = $request->ContactName;
            $job->email = $request->email;
            $job->alt_email = $request->mobile;
            $job->job_title = $request->job_title;
            //dd($request->job_title_code);
            $date_posting = Carbon::parse(Input::get('postingDate'))->format('Y-m-d');
            $date_closing = Carbon::parse(Input::get('closing_date'))->format('Y-m-d');
            //dd($date_closing);
            $job->postingDate = $date_posting;
            $job->ClosingDate = $date_closing;
            $job->JobResponsible =
            $job->jobdesc = $request->job_description;
            $job->jobreqired =$request->job_required;
            //$job->city =
            $job->phone = $request->mobile;
//            $job->fax  =
            $job->mobile = $request->mobile;
            $job->tel = $request->mobile;
//            $job->date_upload =
//            $job_job_type =
           //$job->job_type_full =
            $job->save();
        return redirect('/administration/post-jobs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
    public function edit($id)
    {

        $job = Job::where('id',$id)->first();
        $vacancy = Vacancy::where('id',$id)->first();
        //$vacancyAttachment = VacancyAttachment::where('id',$id)->first();
        return view('backend.HRIS.Recruitment.Job.edit',compact('job','vacancy'));
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
        //dd($request->all());

        $job = Job::findOrFail($id);
        $job->CompanyName = $request->CompanyName;
        $job->contactName = $request->ContactName;
        $job->email = $request->email;
        $job->alt_email = $request->mobile;
        $job->job_title = $request->name;
        $date_posting = Carbon::parse(Input::get('postingDate'))->format('Y-m-d');
        $date_closing = Carbon::parse(Input::get('closing_date'))->format('Y-m-d');
        $job->postingDate = $date_posting;
        $job->ClosingDate = $date_closing;
        $job->JobResponsible =
        $job->jobdesc = $request->job_description;
        $job->jobreqired =$request->job_required;
        $job->phone = $request->mobile;
        $job->mobile = $request->mobile;
        $job->tel = $request->mobile;
        $job->save();

        return redirect('administration/post-jobs');

    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        //
//    }
}
