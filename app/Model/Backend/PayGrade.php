<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayGrade extends Model
{
    //
    protected $table = 'tbl_pay_grade';
    protected $fillable = [
        'id',
        'name',
        'created_by',
        'fd',
        'td',
    ];
    public $timestamps = false;
    public function PayGrade (){

        return $this->hasMany('App\PayGradeCurrency', 'pay_grade_id', 'id');

    }
}
