<?php

namespace App\Model;

use App\OrganizationGenInfo;
use Illuminate\Database\Eloquent\Model;

class WorkShift extends Model
{
    //
    protected $table = 'work_shifts';
    protected $fillable = [
        'id',
        'company_id',
        'name',
        'hours_per_day',
        'start_time',
        'end_time',
    ];

    public function Company(){

        return $this->belongsTo(OrganizationGenInfo::class,'company_id','id');
    }
    public function Employees()
    {
        return $this->belongsToMany(Employee::class);
    }
}
