<?php

namespace App\Entity;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'password'
    ];
}
