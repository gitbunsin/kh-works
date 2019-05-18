<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class candidate_attachment extends Model
{
    //
    protected $table = 'candidate_attachments';
    protected $fillable = [
        'id',
        'candidate_id',
        'file_name',
        'file_type',
        'file_content',
        'file_size',
        'attachment_type',
        'comment'
    ];
}
