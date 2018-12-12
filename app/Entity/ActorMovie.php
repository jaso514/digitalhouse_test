<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class ActorMovie extends Model
{
    //
    public $timestamps = false;

    public function actor() {
        return $this->belongsTo('App\Entity\Actor');
    }
    
    public function movie() {
        return $this->belongsTo('App\Entity\Movie');
    }
}
