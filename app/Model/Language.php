<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';
    protected $fillable = [
        'id',
        'company_id',
        'name',
        'description',
        'is_deleted',
    ];
    public $timestamps = false;
    //
}
