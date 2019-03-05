<?php

namespace  App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;


use App\Model\nation;
use App\Model\Nationality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NationalityController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->shareMenu();
        $n = nationality::where('company_id',Auth::guard('admins')->user()->id)->get();
        return view('backend.HRIS.admin.Nationality.index',compact('n'));
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
        return view('backend.HRIS.admin.Nationality.create');
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
        $n = new nationality();
        $n->name = $request->name;
        $n->company_id = Auth::guard('admins')->user()->id;
        $n->save();
        return redirect('/administration/nationality')->with('success','Item created successfully!');

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
        //
        $this->shareMenu();
        $n = nationality::findOrFail($id);
        return view('backend.HRIS.admin.Nationality.edit',compact('n'));
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
//        dd($request->all());
        $n = nationality::findOrFail($id);
        $n->name = $request->name;
        $n->company_id = Auth::guard('admins')->user()->id;
        $n->save();
        return redirect('/administration/nationality')->with('success','Item edited successfully!');

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
        $license = nationality::findOrFail( $id );
        $license->delete();
        return  redirect('/administration/nationality')->with('success','Item success successfully!');
    }
}
