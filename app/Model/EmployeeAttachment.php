<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmployeeAttachment extends Model
{

    protected $table ="employee_attachments";
    protected $fillable =[

      "emp_numbe",
        "eattach_desc",
        "eattach_filename",
        "eattach_size",
        "eattach_attachment",
        "eattach_type",
        "screen"
    ];
    public function employee(){

        return $this->belongsTo(Employee::class,'emp_number','emp_number');
    }
    //
}
