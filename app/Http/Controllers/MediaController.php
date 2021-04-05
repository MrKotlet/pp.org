<?php

namespace App\Http\Controllers;

use App\Event;
use App\Stream;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index($id)
    {
        $stream = Stream::find($id);
        $event = $stream->event()->first();
        $title = $stream->name;

        return view('media',compact('stream','event','title'));
    }
}
