<?php

namespace App\Http\Controllers\Backend;
use App\Helper\AppHelper;
use App\Helper\MenuHelper;
use App\Http\Controllers\Controller;
use App\OrganizationGenInfo;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class CompanyController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    public function index()
    {
        $this->shareMenu();
        return view('backend.HRIS.admin.Company.index');
    }

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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\organization  $company
     * @return \Illuminate\Http\Response
     */
    public function show(company $company)
    {
        //
    }

    public function update(Request $request , $id)
    {
//dd('hello');

        $company = OrganizationGenInfo::findOrFail($id);
        $company->name = $request->name;
        $company->role_id = 1;
        $company->tax_id = $request->tax_id;
        $company->registration_number = $request->registration_number;
        $company->phone = $request->phone;
        $company->mobile = $request->mobile;
        $company->fax = $request->fax;
        $company->email = $request->email;
        $company->country= $request->country;
        $company->province = $request->province;
        $company->city = $request->city;
        $company->zip_code = $request->zip_code;
        $company->stree1 = $request->street1;
        $company->street2 = $request->street2;
        $company->note = $request->note;
        $company->postal_address = $request->postal_address;
        $company->company_profile = $request->company_profile;
        $company->website = $request->website;
        //$company->mobile = $request->mobile;
        //$company->status = $request->status;
        $file = Input::file('company_logo');
        if ($request->hasFile('company_logo')) {
            $image = $request->file('company_logo');
            $mytime = \Carbon\Carbon::now()->toDateTimeString();
            $name = $image->getClientOriginalName();
            $size = $image->getClientSize();
            $type = $image->getMimeType();
            $destinationPath = public_path('/uploaded/companyLogo/');
            $image->move($destinationPath,$name);
            $company->company_logo = $name;
        }
        $company->save();
        return redirect('/administration/companyProfile')->with('success','Item has been update successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\organization  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(company $company)
    {
        //
    }
}
