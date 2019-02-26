<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    //
    protected $table = 'job_titles';
    protected $fillable = [
        'job_title',
        'company_id',
        'description',
        'note',
        'is_deleted',
    ];
}
