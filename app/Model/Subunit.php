<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubUnit extends Model
{
    //

    protected $table ="sub_units";
    protected $fillable = ['id','title', 'parent_id','description','lft','rgt','level','name','unit_id'];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function childs() {
        return $this->hasMany(SubUnit::class,'parent_id','id') ;
    }

}
