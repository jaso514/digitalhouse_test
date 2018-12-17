<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
        'title',
        'rating',
        'awards',
        'release_date',
        'length',
        'genre'
    ];

    protected $attributes = [
        'awards' => 0,
    ];
    
    
    public function genre() {
        return $this->belongsTo('App\Entity\Genres');
    }
}
