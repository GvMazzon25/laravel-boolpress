<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //Relation with Film  ---    Tag - Films

    public function films(){
        return $this->belongsToMany('App\Film');
    }
}
