<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Superhero extends Model
{
    public function gender()
    {
        return $this->hasOne('App\Gender');
    }

    public function status()
    {
        return $this->hasOne('App\Status');
    }

    public function power()
    {
        return $this->belongsToMany('App\Power');
    }

    public function address()
    {
        return $this->hasMany('App\Address');
    }
}