<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class EmployementStatus extends Model
{
    protected $table = 'employment_statuses';
    protected $fillable = [
        'id',
        'company_id',
        'name',
        'description'
    ];
}
