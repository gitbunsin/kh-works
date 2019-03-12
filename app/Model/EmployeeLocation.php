<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmployeeLocation extends Model
{
    //
    protected $table = 'employee_locations';
    protected $fillable = [
        'id',
        'emp_number',
        'location_id',
    ];
    public $timestamps = false;

    public function location(){

        return $this->belongsTo(Location::class);
    }
    public function employee(){

        return $this->belongsTo(Employee::class);
    }


}
