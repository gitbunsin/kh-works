<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    //
    protected $table = 'language';
    protected $fillable = [
        'id',
        'name',
        'create_at',
        'update_at',
    ];
}
