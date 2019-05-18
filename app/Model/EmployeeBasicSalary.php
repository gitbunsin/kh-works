<?php

namespace App\Model;

use App\OrganizationGenInfo;
use Illuminate\Database\Eloquent\Model;

class EmployeeBasicSalary extends Model
{
    protected $table ="employee_basic_salaries";
    protected $fillable = [
      "organization_code",
        "emp_number",
        "sal_grd_code",
        "currency_id",
        "payperiod_code",
        "ebsal_basic_salary",
        "salary_component",
        "comments"
    ];
    public function company()
    {

        return $this->belongsTo(OrganizationGenInfo::class,'organization_code','id');
    }
    public function employee()
    {

        return $this->belongsTo(Employee::class,'emp_number','emp_number');
    }
    public function paygrade()
    {

        return $this->belongsTo(PayGrade::class,'sal_grd_code','id');

    }
    public function payPeriod()
    {

        return $this->belongsTo(Payperiod::class,'payperiod_code','id');
    }

    public function currency()
    {
        return $this->belongsTo(currency::class,'currency_id','id');
    }
    //
}
