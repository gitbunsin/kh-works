<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReportingMethod extends Model
{
    //
    protected $connection = 'mysql';
    protected $table = 'reporting_methods';
    protected $fillable =
        ['name',

            'description'
        ];
    public $timestamps = false;

    public function employees()
    {

        return $this->belongsToMany(Employee::class);
    }


}
