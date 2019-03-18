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
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;

class JobApply extends Controller
{
    public function __construct()
    {
        //dd('hello');
        $this->middleware('auth');
    }

    public function ApplyVacancy(Request $request, $id)
    {
//        dd($id);
        if (Auth::user()) {
            $user_id = Auth::user()->id;
//            dd($user_id);
            $candidate = new Candidate();
            $user_candidate = DB::table('users as u')
                ->select('c.*', 'c.id as cv_id', 'u.*')
                ->join('tbl_cvs as c', 'c.user_id', '=', 'u.id')
                ->where('c.user_id', '=', $user_id)
                ->get()
                ->first();

            if ($user_candidate) {

                $candidate->cv_file_id = $user_candidate->id;
                $candidate->name = $user_candidate->name;
                $candidate->email = $user_candidate->email;
                $candidate->mode_of_application = 1;
                $candidate->company_id = $request->company_id;
                $candidate->job_titles_code = $request->job_titles_code;
                $candidate->status = 1;
                $candidate->user_id = $user_id;
                $candidate->save();
                $candidate_id = $candidate->id;
                //add new Candidate
                $company_id = input::get('company_id');
                $vacancy_id = input::get('job_id');
                $vacancy_candidate = new CandidateVacancy();
                $vacancy_candidate->candidate_id = $candidate_id;
                $vacancy_candidate->vacancy_id = $vacancy_id;
                $vacancy_candidate->status = 2;
                $date_applied = \Carbon\Carbon::now();
                $vacancy_candidate->applied_date = $date_applied;
                $vacancy_candidate->save();
                dd($id,$company_id);
                $user = User::where('id', $user_id)->select('name', 'email')->get();
                $job = Job::where('id', $id)->select('company_id', 'job_titles_code')->get();
                Excel::create('User', function ($excel) use ($user, $job) {
                    $excel->sheet('Sheet', function ($sheet) use ($user, $job) {
                        foreach ($user as $key => $value) {
                            $i = $key + 2;
                            $sheet->cell('A' . $i, $value['name']);
                            $sheet->cell('B' . $i, $value['email']);
                        }
                        foreach ($job as $key => $values) {
                            $is = $key + 2;
                            $sheet->cell('C' . $is, $values['company_id']);
                            $sheet->cell('D' . $is, $values['job_titles_code']);
                        }
                    });
                })->download();
                return redirect('/administration/display-job-details/'.$id .'/'.$company_id);
            }
            else {
                return redirect('/kh-works/resume');
            }
        } else {
            return redirect()->route('login');
        }
    }
}


    //
