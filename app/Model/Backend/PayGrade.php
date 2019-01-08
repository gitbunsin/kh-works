<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;
use App\Model\Backend\Currency;
class Paygrade extends Model
{
    
    protected $table = "paygrades";
    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updatead_at',
        'company_id'
    ];

    public function currencies() {
        return $this->belongsToMany(Currency::class)->withPivot('min_salary', 'max_salary');
    }

    public function companies() {
        return $this->belongsTo(\App\Organization::class, 'company_id');
    }
}
