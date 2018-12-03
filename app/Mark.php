<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    public function posts(){
        return $this->belongsToMany('App\Post')->withTimestamps();
    }
}
