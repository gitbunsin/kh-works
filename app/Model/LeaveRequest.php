<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    //

    protected $table = 'leave_requests';
    protected $fillable = [
        'id',
        'emp_number',
        'company_id',
        'leave_type_id',
        'date_applied',
        'comments',
    ];
    public $timestamps = false;
}
