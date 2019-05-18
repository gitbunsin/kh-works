<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class contract extends Model
{
    protected $table = 'contracts';
    protected $fillable = [
        'emp_number',
        'econ_extend_id',
        'econ_extend_start_date',
        'econ_extend_end_date',
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class,'emp_number','emp_number');
    }

}
