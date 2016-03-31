<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    // has one speaker
    public function speaker() {
      return $this->belongsTo('App\Speaker');
    }

    // has one timeslot
    public function timeslot() {
      return $this->belongsTo('App\Timeslot');
    }

    // also has one room
    public function room() {
      return $this->belongsTo('App\Room');
    }
}
