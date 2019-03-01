<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{

    protected $table = 'job_titles';
    protected $fillable = [
        'id',
        'company_id',
        'name',
        'description',
        'is_deleted',
    ];
    public $timestamps = false;


    //
}
