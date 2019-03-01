<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PayGrade extends Model
{

    //
    protected $table = 'Paygrades';
    protected $fillable = [
        'id',
        'company_id',
        'name',
    ];
    //
}
