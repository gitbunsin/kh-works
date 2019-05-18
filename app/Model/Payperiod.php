<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Payperiod extends Model
{
    protected $table = "payperiods";
    protected $fillable =[
      "organization_code",
        "name"
    ];
    //
}
