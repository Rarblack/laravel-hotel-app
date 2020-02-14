<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $guarded = [];

    public function rooms(){

        return $this->hasMany(Room::class);
    }

    public function features(){

        return $this->hasMany(Feature::class);
    }
}

