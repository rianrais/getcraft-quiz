<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function superhero()
    {
        return $this->belongsTo('App\Superhero');
    }
}