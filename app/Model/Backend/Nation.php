<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nation extends Model
{
    protected $table = 'tbl_nationality';
    protected $fillable = [
        'id',
        'name',
        'create_at',
        'update_at',
    ];
    public $timestamps = false;
    //
}
