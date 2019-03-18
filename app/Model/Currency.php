<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class currency extends Model
{
    protected $table ="currencies";

    protected $fillable = [
        'id',
        'name'
    ];

    public function paygrades(){

        return $this->belongsToMany(PayGrade::class);
    }
    //
}
