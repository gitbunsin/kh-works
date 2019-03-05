<?php

namespace App\Http\Controllers\Backend;
use employeesWorkExperience;
use App\Http\Controllers\Controller;
use App\Model\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LanguageController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->shareMenu();
        $language = Language::all();

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
        $this->shareMenu();
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
        $language = new Language();
        $language->name = $request->name;
        $language->description = $request->description;
        $language->company_id = Auth::guard('admins')->user()->id;
        $language->save();
        return redirect('/administration/language')->with('success','Item created successfully!');
    }
    public function addLanguage(Request $request)
    {

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

        $this->shareMenu();
        $language = Language::where('id',$id)->first();
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
        $language = Language::findorFail($id);
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
        $language = \App\Model\Language::findOrFail( $id );
        $language->delete();
        return  redirect('/administration/language')->with('success','Item success successfully!');
    }
}
