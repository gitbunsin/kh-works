<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    //
    protected $table = 'tbl_relationship';
//    protected $primaryKey = 'emp_number';
    protected $fillable = [
        'id',
        'name',
        'description',
        'created_at',
        'update_at',
    ];
    public $timestamps = false;
}
