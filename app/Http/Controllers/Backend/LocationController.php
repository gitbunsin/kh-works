<?php

namespace  App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Model\Country;
use App\Model\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LocationController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $l = DB::table('tbl_location as s')->get();
//                ->select('s.*','c.*','c.name as country_name','s.name as location_name')
//                ->join('tbl_country as c','s.country_code','=','c.id')->get();
        $this->shareMenu();
        $country = Country::with('Location')->get();
//        dd($country);
//        $location = Location::all();
        return view('backend.HRIS.admin.Company.Locations.index',compact('country'));
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
        return view('backend.HRIS.admin.Company.Locations.create');
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
       // dd($request->all());
        $l = new Location();
        $l->company_id = Auth::guard('admins')->user()->id;
        $l->name = $request->name;
        $l->country_code = $request->country_code;
        $l->province = $request->province_id;
        $l->city = $request->city;
        $l->address = $request->address;
        $l->zip_code = $request->zip_code;
        $l->phone = $request->phone;
        $l->fax = $request->fax;
        $l->note = $request->notes;
        $l->save();
        return redirect('/administration/locations')->with('success','Item created successfully!');
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
        $location = Location::findOrFail($id);
//        $l = DB::table('tbl_location as s')
//            ->select('s.*','c.*','c.name as country_name','s.name as location_name')
//            ->join('tbl_country as c','s.country_code','=','c.id')
//            ->where('s.id',$id)
//            ->first();
        return view('backend.HRIS.admin.Company.Locations.edit',compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
//        dd($request->all());
        $l = Location::findOrFail($id);
        $l->company_id = Auth::guard('admins')->user()->id;
        $l->name = $request->name;
        $l->country_code = $request->country_code;
        $l->province = $request->province_id;
        $l->city = $request->city;
        $l->address = $request->address;
        $l->zip_code = $request->zip_code;
        $l->phone = $request->phone;
        $l->fax = $request->fax;
        $l->note = $request->notes;
        $l->save();
        return redirect('/administration/locations')->with('success','Item edited successfully!');
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
