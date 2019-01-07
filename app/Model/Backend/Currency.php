<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    //
    protected $table = "currencies";

    public function paygrades() {
        return $this->belongsToMany(Paygrade::class);
    }
}
