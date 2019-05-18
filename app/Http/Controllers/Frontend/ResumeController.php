<?php

namespace  App\Http\Controllers\Frontend;
use App\CandidateAttachment;
use App\Http\Controllers\Controller;

use App\Model\JobCandidate;
use App\Model\JobCandidateAttchment;
use App\Model\UserAttachment;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use const http\Client\Curl\AUTH_ANY;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;
use function Sodium\compare;

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

        $user_cv_id = Auth::user()->cv_file_id;
        $user_cv = UserAttachment::where('id',$user_cv_id)->first();
        return view('frontend.Kh-Works.pages.user_resume',compact('user_cv'));

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

        $CheckExistingCV = DB::table('users as u')
                            ->join('user_attachments as ua','ua.user_id','=','u.id')
                            ->where('ua.user_id',Auth::user()->id)
                            ->first();
        if($CheckExistingCV){
           return redirect('/kh-works/post-resume')->with('warning','Resume already existing !');
        }else{
            $file = $request->file('cv_file_id');
//        dd($file);
//        dd($request->hasFile('cv_file_id'));
            if ($request->hasFile('cv_file_id')) {
                $image = $request->file('cv_file_id');
                //dd($image);
                $mytime = \Carbon\Carbon::now()->toDateTimeString();
                $name = $image->getClientOriginalName();
                $size = $image->getClientSize();
                $type = $image->getMimeType();
                $destinationPath = public_path('/uploaded/UserCV/');
                $image->move($destinationPath,$name);
                $Resume_upload = new UserAttachment();
                $Resume_upload->user_id = Auth::user()->id;
                $Resume_upload->name = $name;
                $Resume_upload->size = $size;
                $Resume_upload->save();
            }
            $Resume_upload->save();
            return redirect('/kh-works/post-resume')->with('success','Resume has been created !');
        }
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

//        dd($request->all());

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
