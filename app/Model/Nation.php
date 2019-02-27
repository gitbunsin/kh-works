<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nation extends Model
{
    protected $table = 'tbl_nationality';
    protected $fillable = [
        'id',
        'company_id',
        'name',
        'description',
        'create_at',
        'update_at',
    ];
    public $timestamps = false;
    //
}
