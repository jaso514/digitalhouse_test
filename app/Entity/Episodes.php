<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Episodes extends Model
{
    //
    public $timestamps = false;

    public function season() {
        return $this->belongsTo('App\Entity\Seasons');
    }
}
