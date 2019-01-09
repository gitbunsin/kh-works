<?php

namespace App\Http\Controllers\Backend;
use App\EmployeeWorkExperience;
use App\Http\Controllers\Controller;
use App\language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return redirect('/administration/language');
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
        return redirect('/administration/language');

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
