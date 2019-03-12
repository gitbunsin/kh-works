<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
class JobTitle extends Model
{

    protected $table = 'job_titles';
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
        return $this->belongsTo('App\organization_gen_infos');
    }

    public function Employee()
    {
        return $this->hasMany(Employee::class,'job_title_code','id');
    }


    //
}
