<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmploymentStatus extends Model
{
    protected $table = 'employment_statuses';
    protected $fillable = [
        'id',
        'company_id',
        'name',
        'description'
    ];
}
