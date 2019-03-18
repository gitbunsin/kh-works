<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PaygradeCurrency extends Model
{
    //
    protected $table = "currency_pay_grade";
    protected $fillable = [
        'id',
        'max_salary',
        'min_salary',
        'paygrade_id',
        'currency_id'
    ];
}
