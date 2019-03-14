<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CurrencyPaygrade extends Model
{

    protected $table = 'paygrade_currencies';

    protected $fillable = [
        'id',
        'pay_grade_id',
        'currency_id',
        'min_salary',
        'max_salary'
    ];
}
