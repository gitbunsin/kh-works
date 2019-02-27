<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    protected $table = 'tbl_province';
    protected $fillable = [
        'id',
        'code',
        'nameEn',
        'NameKh',
        'RegionCode',
    ];
    public $timestamps = false;
    //
}
