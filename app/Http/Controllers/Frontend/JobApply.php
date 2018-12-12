<?php

namespace App\Http\Controllers\Frontend;
use App\Candidate;
use App\CandidateAttachment;
use App\CandidateVacancy;
use App\Http\Controllers\Controller;

use App\Job;
use App\User;
use App\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class JobApply extends Controller
{
    public function __construct()
    {
        //dd('hello');
        $this->middleware('auth');
    }
    public  function apply(Request  $request , $id)
    {
        if (Auth::user()){
            $user_id = Auth::user()->id;
            $candidate = new Candidate();
            $user_candidate = DB::table('users as u')
                ->select('c.*', 'c.id as cv_id', 'u.*')
                ->join('tbl_cvs as c', 'c.user_id', '=', 'u.id')
                ->where('c.user_id', '=',$user_id)
                ->get()
                ->first();
            if($user_candidate){
                $candidate->cv_file_id = $user_candidate->id;
                $candidate->first_name = $user_candidate->name;
                $candidate->last_name = $user_candidate->name;
                $candidate->middle_name = $user_candidate->name;
                $candidate->email = $user_candidate->email;
                $candidate->mode_of_application = 1;
                $candidate->status = 0;

                $candidate->save();
                //$candidate_id = $candidate->id;

                //add new table for Candidate Attachment
                $Candidate_Attachment = new CandidateAttachment();
                $Candidate_Attachment->candidate_id = $candidate->id;
                $Candidate_Attachment->file_name = $user_candidate->image;
                $Candidate_Attachment->file_type = $user_candidate->type;
                $Candidate_Attachment->file_size = $user_candidate->size;
                $Candidate_Attachment->save();
//        $vacancy = DB::table('tbl_job_vacancy as v')
//            ->select('v.*', 'v.id as vacancy_id', 't.*')
//            ->join('tbl_job_title as t', 'v.job_title_code', '=', 't.id')
//            ->where('v.job_title_code', '=', $id)
//            ->get()
//            ->first();
                $vacancy = new Vacancy();
                $vacancy->job_title_code = $user_candidate->id;
                $vacancy->hiring_manager_id = $user_candidate->user_id;
                $vacancy->name = $user_candidate->name;
                $vacancy->status = 1;

                $vacancy->save();
                $vacancy_id = $vacancy->id;

                //add new Candidate
                $vacancy_candidate = new CandidateVacancy();
                $vacancy_candidate->candidate_id = $candidate->id;
                $vacancy_candidate->vacancy_id = $vacancy->id;
                $vacancy_candidate->status = 1;
                $date_applied = \Carbon\Carbon::now();
                $vacancy_candidate->applied_date = $date_applied;
                $vacancy_candidate->save();

                $user = User::where('id', $user_id)->select('name', 'email')->get();
                $job = Job::where('id', $id)->select('CompanyName', 'email', 'job_title')->get();
                Excel::create('User', function ($excel) use ($user, $job) {
                    $excel->sheet('Sheet', function ($sheet) use ($user, $job) {
                        foreach ($user as $key => $value) {
                            $i = $key + 2;
                            $sheet->cell('A' . $i, $value['name']);
                            $sheet->cell('B' . $i, $value['email']);
                        }
                        foreach ($job as $key => $values) {
                            $is = $key + 2;
                            $sheet->cell('C' . $is, $values['CompanyName']);
                            $sheet->cell('D' . $is, $values['job_title']);
                        }
                    });
                })->download();
            }else{
                return redirect('/kh-works/lists');
            }
            //$candidate = new Candidate()
            //dd($user_candidate);
            //add CV

        }else{
            return redirect()->route('login');
        }
    }

    //
}
