<?php

namespace  App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user_resume = DB::table('users')->first();
       // dd($user_resume);
        return view('frontend.Kh-Works.pages.user_resume',compact('user_resume'));
    }

    public function resume()
    {
        return view('frontend.Kh-Works.pages.resume');
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

    public function export_pdf()
    {
        // Fetch all customers from database
        $data = User::all();
        // Send data to the view using loadView function of PDF facade
        $pdf = PDF::loadView('', compact('data'))->setPaper('a4')->setOrientation('potrait');
        return $pdf->stream('Balance Sheet.pdf');
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

       // dd($request->all());
        $resume = User::findOrFail($id);
        $resume->name = $request->name;
        $resume->full_name = $request->full_name;
        $resume->address = $request->address;
        $resume->mobile = $request->mobile;
        $resume->sex = $request->sex;
        $resume->country = $request->country;
        $resume->name = $request->name;
        $resume->city = $request->country;
//        $resume->dob = $request->dob;
//        $resume->date = $request->date;
        $resume->experiences = $request->experiences;
        $file = Input::file('photo');
       // dd($request->hasFile('photo'));
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            //dd($image);
            $mytime = \Carbon\Carbon::now()->toDateTimeString();
            $name = $image->getClientOriginalName();
            //dd($name);
            $size = $image->getClientSize();
            $type = $image->getMimeType();
            $destinationPath = public_path('/uploaded');
            $image->move($destinationPath,$name);
            $resume->photo = $name;
        }
        $resume->save();
//        flash('Create Successfully')->success();
        return redirect('/kh-works/post-resume');
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
