<?php

namespace App\Http\Controllers;

use App\Event;

use App\Stream;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index()
    {
        $streams = Stream::all();
        $events = Event::all()->sortBy('startMonth');
        $title = 'Events';
        return view('events',compact('streams','title','events'));
    }

    public function event($id)
    {
        $event = Event::find($id);

        $streams = $event->streams()->get();
        $title = $event->name;
        return view('event',compact('title','streams','event'));
    }
//    public function indexeng()
//    {
//        $streams = Stream::all();
//        $events = Event::all();
//        $title = 'Events';
//        return view('eng.events',compact('streams','title','events'));
//    }

//    public function eventeng($id)
//    {
//        $event = Event::find($id);
//        $streams = $event->streams()->get();
//        $title = $event->name;
//        return view('eng.event',compact('title','streams','event'));
//    }
}
