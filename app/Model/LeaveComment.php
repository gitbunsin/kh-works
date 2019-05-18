<?php

namespace App\Model;

use App\OrganizationGenInfo;
use Illuminate\Database\Eloquent\Model;

class LeaveComment extends Model
{
    //
    protected $table="leave_comments";
    protected $fillable = [
      "leave_id",
        "emp_number",
        "company_id",
        "created_by_name",
        "comments"
    ];
    public function leave(){

        return $this->belongsTo(Leave::class,'leave_id','id');
    }
    public function employee(){

        return $this->belongsTo(Employee::class,'emp_number','emp_number');
    }
    public function company(){

        return $this->belongsTo(OrganizationGenInfo::class,'created_by_name','id');
    }
}
