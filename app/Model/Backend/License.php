<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class license extends Model
{
    //
    protected $table = 'licenses';
//    protected $primaryKey = 'emp_id';
    protected $fillable = [
        'id',
        'company_id',
        'name',
        'description',
        'created_at',
        'update_at',
    ];
}
