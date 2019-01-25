<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerformanceReview extends Model
{
    //
    protected $connection = 'mysql';
    protected $table = 'tbl_hr_performance_review';
    protected $fillable =
        ['id',
            'employee_id',
            'status_id',
            'work_period_start',
            'work_period_end',
            'job_title_code',
            'department_id',
            'due_date',
            'completed_date',
            'activated_date',
            'final_comment',
            'final_rate',
        ];
    public $timestamps = false;
}
