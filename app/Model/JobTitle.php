<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
class JobTitle extends Model
{

    protected $table = 'job_title';
    protected $fillable = [
        'id',
        'company_id',
        'name',
        'description',
        'is_deleted',
    ];
    public $timestamps = false;

    public function company()
    {
        return $this->belongsTo('App\organization_gen_infos','company_id','id');
    }

    public function vacancies()
    {
        return $this->hasMany(JobVacancy::class);
    }


}
