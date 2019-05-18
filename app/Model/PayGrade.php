<?php

namespace App\Model;

use App\OrganizationGenInfo;
use Illuminate\Database\Eloquent\Model;

class PayGrade extends Model
{

    //
    protected $table = 'Paygrades';
    protected $fillable = [
        'id',
        'name',
    ];
    public function currencies()
    {
        return $this->belongsToMany(currency::class)->withPivot('min_salary','max_salary');
    }

    public function company(){
        return $this->belongsTo(OrganizationGenInfo::class,'company_id');
    }
    //
}
