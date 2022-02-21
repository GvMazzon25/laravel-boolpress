<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    //protected $table = 'my_flights';
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    protected $fillable = [
        'name',
        'id',
        'images',
        'cast',
        'category_id',
        'cover',
    ];

    //Relation with Catecories  ---    films - categories 

    public function category() {
        return $this->belongsTo('App\Category');
    }

    //Relation with Tag  ---    films - tags

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
