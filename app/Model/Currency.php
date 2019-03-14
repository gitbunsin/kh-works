<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class currency extends Model
{
    protected $table ="currencies";

    public function paygrades(){

        return $this->belongsToMany(PayGrade::class);
    }
    //
}
