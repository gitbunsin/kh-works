<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subunit extends Model
{
    //

    protected $connection = 'mysql';
    protected $table = 'tbl_subunit';
    protected $fillable =
        ['id',
            'employee_id',
            'title',
            'parent_id',
            'unit_id',
            'description',
            'lft',
            'rgt',
            'level',
        ];
    public $timestamps = false;

    public function childs(){

        return $this->hasMany('App\Subunit','parent_id','id');
    }
}
