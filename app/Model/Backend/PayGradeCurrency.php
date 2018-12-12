<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayGradeCurrency extends Model
{

    protected $table = 'tbl_pay_grade_currency';
    protected $primaryKey = 'currency_id';
    protected $fillable = [
        'id',
        'pay_grade_id',
        'currency_id',
        'min_salary',
        'max_salary',
        'created_by',
        'fd',
        'td',
    ];
    public $timestamps = false;

    public function payGrade(){

        return $this->belongsTo('App\PayGrade', 'pay_grade_id','id');
    }
    public function currency(){

        return $this->belongsTo('App\Currency', 'currency_id','currency_id');
    }
    //
}
