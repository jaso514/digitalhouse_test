<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    //
    public $timestamps = false;

    protected $attributes = [
        'active' => 1,
    ];

}
