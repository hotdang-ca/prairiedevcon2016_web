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

        // sloppy, sloppy, sloppy... but i just want it done.
        $timeslot = Timeslot::where('session_id', $session['id'])->first();

        $roomId = $timeslot['room_id'];
        switch ($timeslot['day']) {
          case 0:
            $timeslot['day'] = "Monday";
            break;
          case 1:
            $timeslot['day'] = "Tuesday";
            break;
        }

        $room = Room::find($roomId);

        unset($timeslot['speaker_id']);
        unset($timeslot['session_id']);
        unset($timeslot['room_id']);

        $session['timeslot'] = $timeslot;
        $session['room'] = $room;
      }

      $session_list = array();
      $session_list['sessions'] = $sessions;
      return $session_list;
    }

    public function session_by_id($session_id) {
      $session = Session::find($session_id);

      $session['speaker'] = $session->speaker;
      unset($session['speaker_id']);

      return $session;
    }

    public function speakers() {
      $speakers = Speaker::all();
      foreach ($speakers as $speaker) {
        $sessions = $speaker->sessions;

        foreach ($sessions as $session) {
            $timeslot = Timeslot::where('session_id', $session['id'])->first();
            $roomId = $timeslot['room_id'];
            $room = Room::find($roomId);

            unset($timeslot['speaker']);
            unset($timeslot['session']);
            unset($timeslot['room']);

            unset($session['speaker']);

            $session['timeslot'] = $timeslot;
            $session['room'] = $room;
        }

        $speaker['sessions'] = $sessions;
      }

      $speakers_list = array();
      $speakers_list['speakers'] = $speakers;
      return $speakers_list;
    }

    public function speaker_by_id($speaker_id) {
      $speaker = Speaker::find($speaker_id);
      $speaker['sessions'] = $speaker->sessions;
      foreach($speaker['sessions'] as $session) {
        unset($session['speaker_id']);
      }

      $single_speaker = array();
      $single_speaker['speaker'] = $speaker;
      return $single_speaker;
    }

    public function speakers_for_company($company_name) {
      $speakers = Speaker::where('company', 'like', '%' . $company_name . '%')->get();

      foreach($speakers as $speaker) {
        $speaker['sessions'] = $speaker->sessions;

        foreach($speaker['sessions'] as $session) {
          unset($session['speaker_id']);
        }
      }

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

      // provide some mapping for the clients
      // i suppose this is also good, becase it also provides context for the data
      $timeslots_list = array();
      $timeslots_list['timeslots'] = $timeslots;
      return $timeslots_list;
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
