<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    //
    protected $table = 'job_categories';
    protected $fillable = [
        'id',
        'company_id',
        'name',
        'description',
    ];
    
}
