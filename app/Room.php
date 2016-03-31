<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    // has many timeslots
    public function timeslots() {
      return $this->hasMany('App\Timeslot');
    }
}
