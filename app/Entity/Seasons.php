<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Seasons extends Model
{
    //
    public $timestamps = false;

    public function serie() {
        return $this->belongsTo('App\Entity\Series');
    }
}
