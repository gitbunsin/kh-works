<?php

namespace App\Model;

use App\OrganizationGenInfo;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $guard = 'employee';
    protected $table = 'employees';
    protected $primaryKey = 'emp_number';
    protected $fillable = [
        'emp_number',
        'company_id',
        'employee_id',
        'emp_lastname',
        'emp_middle_name',
        'emp_firstname',
        'emp_nick_name',
        'emp_smoker',
        'ethnic_race_code',
        'emp_birthday',
        'nation_code',
        'emp_marital_status',
        'emp_ssn_num',
        'emp_sin_num',
        'emp_other_id',
        'emp_dri_lice_num',
        'emp_dri_lice_exp_date',
        'emp_military_service',
        'emp_status',
        'job_titles_code',
        'emp_gender',
        'eeo_cat_code',
        'work_station',
        'emp_street1',
        'emp_street2',
        'city_code',
        'coun_code',
        'provin_code',
        'emp_zipcode',
        'emp_hm_telephone',
        'emp_mobile',
        'emp_work_telephone',
        'emp_work_email',
        'sal_grd_code',
        'joined_date',
        'emp_oth_email',
        'termination_id',
        'profile_id',
        'custom1',
        'custom2',
        'custom3',
        'custom4',
        'custom5',
        'custom6',
        'custom7',
        'custom8',
        'custom9',
        'custom10',
    ];
    public function employeeAttachments(){

        return $this->belongsTo(EmployeeAttachment::class,'profile_id','id');

    }

    public function company(){

        return $this->belongsTo(OrganizationGenInfo::class,'company_id','id');
    }

    public function Interviews(){

        return $this->belongsToMany(interview::class);
    }

    public function WorkShifts(){

        return $this->belongsToMany(WorkShift::class);
    }

    public function JobTitle()
    {
        return $this->belongsTo(JobTitle::class,'job_titles_code','id');
    }
    public function location()
    {
        return $this->belongsToMany(Location::class);
    }
    public function EmploymentStatus(){

        return $this->belongsTo(EmploymentStatus::class,'emp_status','id');
    }
    public function WorkStation(){
        return $this->belongsTo(SubUnit::class,'work_station','id');

    }
    public function ReportingMethods(){

        return $this->belongsToMany(ReportingMethod::class);
    }

    public function vacancies()
    {
        return $this->belongsToMany(JobVacancy::class);
    }


    //
}
