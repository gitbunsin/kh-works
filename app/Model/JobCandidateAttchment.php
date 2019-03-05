<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JobCandidateAttchment extends Model
{
    //

    protected $table = 'job_candidate_attchments';
    protected $fillable = ['candidate_id','file_name','	file_type','attachment_type','file_size','file_content'];
    public $timestamps = false;
}
