<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TerminationReason extends Model
{
    protected $table = 'termination_reasons';
    protected $fillable = ['id','company_id', 'name','description','is_deleted'];
    public $timestamps = false;

}
