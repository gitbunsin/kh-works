<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Job;
use Illuminate\Http\Request;
use App\Vacancy;
use App\JobTitle;
use App\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class VacanciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacancy = DB::table('tbl_job_vacancy')
            ->join('kh-works.tbl_job_title', 'hris.tbl_job_vacancy.job_title_code', '=', 'kh-works.tbl_job_title.id')
            ->join('hris.tbl1_hr_employee','hris.tbl_job_vacancy.hiring_manager_id','=','hris.tbl1_hr_employee.emp_id')
            ->select('hris.tbl_job_vacancy.*', 'kh-works.tbl_job_title.job_title','hris.tbl1_hr_employee.*')
            ->OrderBy('hris.tbl_job_vacancy.id','DESC')
            ->get();
        //dd($vacancy);
        return view('backend.HRIS.Recruitment.Vacancy.index',compact('vacancy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Job::all();
        return view('backend.HRIS.Recruitment.Vacancy.create',compact('items'));
    }

    public function store(Request $request)
    {
            //dd($request->all());
            $vacancy = new Vacancy();
            $vacancy->job_title_code = $request->Job_title;
            $vacancy->name = $request->name;
            $vacancy->hiring_manager_id = $request->hiring_manager_id;
            $vacancy->description = $request->description;
            $vacancy->save();
            return redirect('/administration/vacancy');

    }
    public function edit(Request $request , $id)
    {
        $vacancy = Vacancy::where('id',$id)->first();
        return view('backend.HRIS.Recruitment.Vacancy.edit',compact('vacancy'));
    }

//    public function store(Request $request)
//    {
//       //dd($request->all());
//        $JobTitle = Vacancy::create($request->all());
//        return response()->json($JobTitle);
//    }

//    public function show($vacancy_id)
//    {
//        $JobTitle = Vacancy::findOrFail($vacancy_id);
//        return response()->json($JobTitle);
//    }

    public function update(Request $request, $vacancy_id)
    {
        $vacancy = Vacancy::findOrFail($vacancy_id);
        $vacancy->name = $request->name;
        $vacancy->job_title_code = $request->job_title_code;
        $vacancy->description = $request->job_description;
        $vacancy->hiring_manager_id = $request->hiring_manager_id;
        $vacancy->save();
        return response()->json($vacancy);
    }

    public function destroy($vacancy_id)
    {
        $job_title = Vacancy::destroy($vacancy_id);
        return response()->json($job_title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public function store(Request $request)
//    {
//        $vacancy = new Vacancy();
//        $vacancy->job_title_code = 1;
//        $vacancy->hiring_manager_id = 1;
//        $vacancy->name=Input::get('name');
//        $vacancy->description=Input::get('description');
//        $vacancy->no_of_positions=1;
//        $vacancy->status = 1;
//        $vacancy->published_in_feed = 1;
//        $vacancy->defined_time = '2018-10-04';
//        $vacancy->updated_time = '2018-10-04';
//        //dd($vacancy);
//        $vacancy->save();
//        return redirect("/administration/vacancy");
//    }

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function edit($id)
//    {
//        //
//        $vacancy = Vacancy::FindorFail($id);
//        return view('backend.HRIS.Recruitment.Vacancy.edit',compact('vacancy','id'));
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function update(Request $request, $id)
//    {
//
//        $vacancy = Vacancy::findOrFail($id);
////        dd($candidate);
//        $input = $request->all();
//        $vacancy->fill($input)->save();
//        $request->session()->flash('alert-success', 'New Candidate has been updated!!!');
//        return redirect('/administration/vacancy');
//        //
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function destroy($id)
//    {
//
//        $vacancy = Vacancy::findOrFail($id);
//        $vacancy->delete();
//        Session::flash('alert-danger', 'JobCategory successfully deleted!');
//        return redirect('/administration/vacancy');
//
//    }
}
