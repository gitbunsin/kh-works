<?php

namespace  App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Model\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MembershipController extends Controller
{
    public function index()
    {
        $m = Membership::all();
        return view('backend.HRIS.admin.Qualifications.Membership.index',compact('m'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.HRIS.admin.Qualifications.Membership.create');
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
//        dd($request->all());
        $l = new Membership();
        $l->company_id = Auth::guard('admins')->user()->id;
        $l->name = $request->name;
        $l->description = $request->description;
        $l->save();
        return redirect('/administration/membership')->with('success','Item has been added successfully');;

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
        $m = Membership::where('id',$id)->first();
//        dd($skills);
        return view('backend.HRIS.admin.Qualifications.Membership.edit',compact('m'));
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
        $l = Membership::findOrFail($id);
        $l->company_id = Auth::guard('admins')->user()->id;
        $l->name = $request->name;
        $l->description = $request->description;
        $l->save();
        return redirect('/administration/membership')->with('success','Item has been added successfully');
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
        $license = Membership::findOrFail( $id );
        $license->delete();
        return  redirect('/administration/membership')->with('success','Item success successfully!');
    }
}
