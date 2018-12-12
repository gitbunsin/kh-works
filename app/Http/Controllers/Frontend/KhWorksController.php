<?php

namespace App\Http\Controllers\Frontend;
use App\Employee;
use App\Exports\UsersExport;
use App\Job;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
// use Illuminate\Support\Facades\Input;
// use Illuminate\Support\Facades\DB;
use App\Candidate;
use App\CandidateAttachment;
use App\CandidateVacancy;
use App\JobCategory;
use App\Vacancy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Psy\Util\Json;

class KhWorksController extends Controller
{


    public function __construct()
    {

        $this->middleware('isClient');
//        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        $Job = DB::table('kh_job_vacancy as j')
            ->select('j.*')
            ->where('job_title', 'like', '%' .$searchTerm. '%')
            ->orWhere('description', 'like', '%' .$searchTerm. '%')
            ->paginate(3);
        $JobCategory = JobCategory::all();
        return view('frontend.Kh-Works.layouts.ui-main',compact('Job'));

//        return redirect('/kh-works')->with(compact('JobTitle','JobCategory'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  function posts()
    {
        return view('frontend.Kh-Works.pages.postjob');
    }

//    public function job()
//    {
//        return view('frontend.pages.Jobs');
//    }
    public  function lists()
    {
        return view('frontend.Kh-Works.pages.list');
    }
    public  function policy()
    {
        return view('frontend.Kh-Works.pages.policy');
    }
    public  function singin(){

        return view('frontend.Kh-works.pages.signing');
    }
    /**
     * function Candidate apply JobCategory.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        return view('frontend.pages.Jobs');

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
