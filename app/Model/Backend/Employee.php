<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use League\OAuth2\Server\Entities\Traits\EntityTrait;

/**
 * @property  attributes
 */
class Employee extends Authenticatable
{
    use Notifiable;
    use EntityTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //The authentication guard for admin
    protected $guard = 'employee';
    protected $table = 'employees';
    protected $primaryKey = 'emp_number';
    protected $fillable = [
        'emp_number',
        'company_id',
        'employee_id',
        'emp_lastname',
        'emp_middle_name',
        'emp_nick_name',
        'emp_smoker',
        'ethnic_race_code',
        'emp_birthday',
        'nation_code',
        'emp_gender',
        'emp_marital_status',
        'emp_ssn_num',
        'emp_sin_num',
        'emp_other_id',
        'emp_dri_lice_num',
        'emp_dri_lice_exp_date',
        'emp_military_service',
        'emp_status',
        'job_title_code',
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
}
