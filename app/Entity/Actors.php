<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Actors extends Model
{
    //
    public $timestamps = false;

    public function favoriteMovie() {
        return $this->belongsTo('App\Entity\Movie');
    }
}
