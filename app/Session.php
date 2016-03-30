<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    // has one speaker
    public function speaker() {
      return $this->belongsTo('App\Speaker');
    }
}
