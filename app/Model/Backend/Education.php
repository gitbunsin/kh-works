<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    //
    protected $table = 'education';
    protected $fillable = [
        'id',
        'company_id',
        'name',
        'description',
        'is_deleted',
    ];
}
