<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
   
    protected $fillable = [
        'name', 'email','level'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
