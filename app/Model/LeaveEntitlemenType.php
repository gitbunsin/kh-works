<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LeaveEntitlemenType extends Model
{

    protected $table ="leave_entitlement_types";

    protected $fillable = [
      "name",
      "company_id",
      "is_editable"
    ];




    //
}
