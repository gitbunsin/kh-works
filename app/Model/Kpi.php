<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kpi extends Model
{
    protected $table ="kpis";
    protected $fillable= array('job_titles_code','kpi_indicators','min_rating','max_rating','default_kpi','deleted_at');


    public function jobTitle(){

        return $this->belongsTo(JobTitle::class,'job_titles_code','id');
    }
    //
}
