<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    // has many sessions
    public function sessions() {
      return $this->hasMany('App\Session');
    }
}
