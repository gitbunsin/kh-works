<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
    protected $table = 'tbl_skill';
//    protected $primaryKey = 'emp_id';
    protected $fillable = [
        'id',
        'company_id',
        'name',
        'description',
        'created_at',
        'update_at',
    ];
    public $timestamps = false;
}
