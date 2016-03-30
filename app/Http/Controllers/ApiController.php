<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Speaker;
use App\Session;

class ApiController extends Controller
{
    public function sessions() {
      $sessions = Session::all();

      // sessions have one speaker
      foreach($sessions as $session) {
        $session['speaker'] = $session->speaker;
        unset($session['speaker_id']);
      }

      return $sessions;
    }

    public function speakers() {
      $speakers = Speaker::all();
      return $speakers;
    }
}
