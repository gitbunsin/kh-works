<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Termination extends Model
{

    protected $table = 'terminations';
    protected $fillable = ['id','reason_id', 'emp_number','termination_date','noted'];
    public $timestamps = false;


    public function employee(){

        return $this->belongsTo(Employee::class,'emp_number','emp_number');
    }
    //
}
