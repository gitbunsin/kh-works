<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'tbl_job_candidate';
    protected $fillable = [
        'id','first_name', 'middle_name','email','contact_number',
    ];
    protected $dates = ['date_of_application'];
    public function setDateOfBirthAttribute()
    {
        $this->attributes['date_of_application'] = Carbon::createFromFormat('Y-m-d ','');
    }
    public $timestamps = false;
}
