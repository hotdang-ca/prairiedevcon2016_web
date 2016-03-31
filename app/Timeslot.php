<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    // has one speaker
    public function speaker() {
      return $this->belongsTo('App\Speaker');
    }

    // has one session
    public function session() {
      return $this->belongsTo('App\Session');
    }

    // has one room
    public function room() {
      return $this->belongsTo('App\Room');
    }
}
