<?php

namespace App\Http\Controllers\Backend;
use App\EmployeeLanguage;
use App\EmployeeWorkExperience;
use App\Http\Controllers\Controller;
use App\language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $language = language::all();
        return view('backend.HRIS.admin.Qualifications.Language.index',compact('language'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.HRIS.admin.Qualifications.Language.create');
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
        $language = new language();
        $language->name = $request->name;
        $language->description = $request->description;
        $language->company_id = Auth::guard('admins')->user()->id;
        $language->save();
        return redirect('/administration/language')->with('success','Item created successfully!');
    }
    public function addLanguage(Request $request)
    {
        $l = new EmployeeLanguage();
        $l->emp_number = Auth::guard('employee')->user()->id;
        $l->lang_id = $request->lang_id;
        $l->fluency = $request->fluency_id;
        $l->competency = $request->competency_id;
        $l->comments = $request->comments;
        $l->save();
        $l = DB::table('tbl_hr_emp_language as es')
            ->join('tbl_language as s','es.lang_id','=','s.id')
            ->where('s.id',$request->lang_id)
            ->first();
        return response()->json($l);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $language = language::where('id',$id)->first();
        return view('backend.HRIS.admin.Qualifications.Language.edit',compact('language'));

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
        $language = language::findorFail($id);
        $language->name = $request->name;
        $language->description = $request->description;
        $language->company_id = Auth::guard('admins')->user()->id;
        $language->save();
        return redirect('/administration/language')->with('success','Item edited successfully!');

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
