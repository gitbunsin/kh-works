<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TerminationReason extends Model
{
    //
    protected $table = 'tbl_termination_reason';
    protected $fillable = ['id', 'name','company_id','description'];
    public $timestamps = false;
}
