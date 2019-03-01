<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Termination extends Model
{

    protected $table = 'terminations';
    protected $fillable = ['id','reason_id', 'emp_id','termination_date'];
    public $timestamps = false;
    //
}
