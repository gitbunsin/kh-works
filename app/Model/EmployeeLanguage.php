<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmployeeLanguage extends Model
{
    //
    protected $table = 'employee_languages';
    protected $fillable = [
        'id',
        'employee_id',
        'lang_id',
        'fluency',
        'competency',
        'comments',
    ];
    public $timestamps = false;
}
