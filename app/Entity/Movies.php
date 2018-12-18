<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    public $timestamps = true;

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

    // fields to search
    protected $searchable = [
        'title' => 'string'
    ];
    
    
    public function genre() {
        return $this->belongsTo('App\Entity\Genres');
    }

    /**
     * @param string $title
     */
    public static function searchByTitle(string $title=null) {
        if (!empty($title)) {
            $movies = Movies::where('title', 'LIKE', '%'.$title.'%');
        } else {
            $movies = Movies::where('id', '>', '0');
        }

        $itemsPerPage = config('global.paginationFront');
        
        $movies = $movies->orderBy('title');
        $movies = $movies->paginate($itemsPerPage);

        return $movies;

    }

}
