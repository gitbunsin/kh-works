<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';
    protected $fillable = [
        'id',
        'company_id',
        'name',
        'description',
        'is_deleted',
    ];
    //
}
