<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
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
        return $this->hasMany('App\Power');
    }

    public function address()
    {
        return $this->hasMany('App\Address');
    }
}