<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeroAddress extends Model
{
    public function superhero()
    {
        return $this->belongsTo('App\Superhero');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }
}