<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Relation with Film  ---  categories - films

    public function films(){
        return $this->hasMany('App\Film');
    }
}
