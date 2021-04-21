<?php

namespace App\Http\Controllers;

use App\Event;

use App\Stream;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index()
    {
        $streams = Stream::where('visible', 1)->orderBy('id','desc')->get();
        $events = Event::where('visible','>=', 1)->orderBy('startMonth')->get();
        $title = 'Events';
        if($streams->count()>4){
           $streams = $streams->take(4);

        }



        return view('events',compact('streams','title','events'));
    }

    public function event($id)
    {
        $event = Event::find($id);

        $streams = $event->streams()->where('visible', 1)->get();
        $title = $event->name;
        return view('event',compact('title','streams','event'));
    }

}
