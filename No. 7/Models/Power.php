<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Power extends Model
{
    public function superhero()
    {
        return $this->belongsToMany('App\Superhero', 'power_superhero');
    }
}
