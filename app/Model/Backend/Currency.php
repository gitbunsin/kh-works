<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    //
    protected $table = 'tbl_currency_type';
    protected $fillable = [
        'currency_id',
        'currency_name',
    ];
    protected $primaryKey = 'currency_id';
    public $timestamps = false;

    public function currencyType(){

        return $this->hasMany('App\PayGradeCurrency');
    }
}
