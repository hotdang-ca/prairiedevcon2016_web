<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Speaker;
use App\Session;
use App\Timeslot;
use App\Room;

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

    public function timeslots() {
      $timeslots = Timeslot::all();
      foreach ($timeslots as $timeslot) {
        $timeslot['room'] = $timeslot->room;
        unset($timeslot['room_id']);

        $timeslot['session'] = $timeslot->session;
        unset($timeslot['session_id']);
        unset($timeslot['session']['speaker_id']);

        $timeslot['speaker'] = $timeslot->speaker;
        unset($timeslot['speaker_id']);

        // TODO: helper function
        switch ($timeslot['day']) {
          case 0:
            $timeslot['day'] = "Monday";
            break;
          case 1:
            $timeslot['day'] = "Tuesday";
            break;
        }
      }

      return $timeslots;
    }

    public function timeslot_by_id($timeslot_id) {
      $timeslot = Timeslot::find($timeslot_id);

      // This should be more DRY
      $timeslot['room'] = $timeslot->room;
      unset($timeslot['room_id']);

      $timeslot['session'] = $timeslot->session;
      unset($timeslot['session_id']);
      unset($timeslot['session']['speaker_id']);

      $timeslot['speaker'] = $timeslot->speaker;
      unset($timeslot['speaker_id']);

      // TODO: helper function
      switch ($timeslot['day']) {
        case 0:
          $timeslot['day'] = "Monday";
          break;
        case 1:
          $timeslot['day'] = "Tuesday";
          break;
      }

      return $timeslot;
    }
}
