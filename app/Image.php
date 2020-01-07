<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    //Relacion One To Many / De uno a muchos
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    //Relacion One To Many / De uno a muchos
    public function likes(){
        return $this->hasMany('App\Like');
    }

    //Relacion Many to One / De muchos a uno
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
