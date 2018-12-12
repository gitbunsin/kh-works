<?php

namespace App;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $table = 'tbl_job_vacancy';
    protected $fillable = [
        'id',
        'hiring_manager_id',
        'name',
        'job_title_code',
        'description',
        'status',
        'no_of_positions',
        'published_in_feed',
        'defined_time',
        'updated_time'];
    public $timestamps = false;

}
