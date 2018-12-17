<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateAttachment extends Model
{
    //
    protected $table = 'tbl_job_candidate_attachment';
    protected $fillable = ['file_name', 'file_size','file_content'];
    public $timestamps = false;
}
