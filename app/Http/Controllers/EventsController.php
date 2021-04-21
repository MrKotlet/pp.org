<?php

namespace App\Http\Controllers;

use App\Event;

use App\Stream;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index()
    {


        $streams = Stream::where('visible', 1)->orderBy('id', 'desc')->get();
        $events = Event::where('visible', '>=', 1)->orderBy('startMonth')->get();


        $title = 'Events';
        if ($streams->count() > 4) {
            $streams = $streams->take(4);

        }
        $upcoming = $this->upcoming();

        return view('events', compact('streams', 'title', 'events', 'upcoming'));
    }

    public function event($id)
    {
        $event = Event::find($id);

        $streams = $event->streams()->where('visible', 1)->get();
        $title = $event->name;

        return view('event', compact('title', 'streams', 'event'));
    }

    // this function finds nearest event
    public function upcoming()
    {
        $now = Carbon::now();
        $nowY = $now->year;
        $nowM = $now->month;
        $nowD = $now->day;
        $id = 0;
        $dFlag = 100;
        $mFlag = 100;


        $es = Event::where('visible', '>=', 1)->where('year', $nowY)->get();


        foreach ($es as $e) {
            $em = $e->startMonth;
            $esd = $e->startDay;
            $eed = $e->endDay;

            if ($em === $nowM && $eed >= $nowD && $esd <= $nowD) {
                $upcoming = $e;
                return $upcoming;
            } elseif ($em === $nowM && $esd > $nowD && $esd < $dFlag) {
                $id = $e->id;
                $dFlag = $esd;
                $mFlag = $em;
            } elseif ($em <= $mFlag && $em>$nowM) {
                if ($em != $mFlag) {

                    $id = $e->id;
                    $dFlag = $esd;
                    $mFlag = $em;
                }elseif ($esd < $dFlag){
                    $id = $e->id;
                    $dFlag = $esd;
                    $mFlag = $em;
                }

            }

        }

if($id){
    $upcoming = Event::find($id);
}else{
    $upcoming = Event::where('year',$nowY+1)->first();
}


        return $upcoming;
    }

}
