<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

    protected $guarded = [];

    public function hotel(){

        return $this->belongsTo(Hotel::class);
    }

    public function prices(){

        return $this->hasMany(Price::class);
    }
}
