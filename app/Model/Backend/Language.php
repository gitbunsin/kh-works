<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class language extends Model
{
    //
    protected $table = 'tbl_language';
    protected $fillable = [
        'id',
        'name',
        'create_at',
        'update_at',
    ];
    public $timestamps = false;
}
