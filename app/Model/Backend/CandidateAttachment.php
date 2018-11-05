<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateAttachment extends Model
{
    //
    protected $connection = 'mysql2';
    protected $table = 'tbl_job_candidate_attachment';
    protected $fillable = ['id','candidate_id', 'file_name','file_types','file_size'];

    public $timestamps = false;

}
