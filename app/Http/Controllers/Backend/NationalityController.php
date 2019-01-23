<?php

namespace  App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;


use App\nation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NationalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $n = nation::where('company_id',Auth::guard('admins')->user()->id)->get();
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
        $n = new nation();
        $n->name = $request->name;
        $n->description = $request->description;
        $n->company_id = Auth::guard('admins')->user()->id;
        $n->save();
        return redirect('/administration/nationality');

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
        $n = nation::findOrFail($id);
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
        //
        dd($request->all());
        $n = nation::findOrFail($id);
        $n->name = $request->name;
        $n->description = $request->description;
        $n->company_id = Auth::guard('admins')->user()->id;
        $n->save();
        return redirect('/administration/nationality');

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
