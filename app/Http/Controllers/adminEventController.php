<?php

namespace App\Http\Controllers;

use App\Event;
use App\Photo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminEventController extends Controller
{
    public function addEvent()
    {

        return view('Admin.add-event');
    }

    public function createEvent(Request $request)
    {

        $event = new Event();
        $event->name = $request->input('name');
        $event->opis = $request->input('opis');
        $event->homepage = $request->input('homepage');
        $event->location = $request->input('location');
        $event->year = $request->input('year');
        $event->startMonth = $request->input('startMonth');
        $event->startDay = $request->input('startDay');
        $event->endMonth = $request->input('endMonth');
        $event->endDay = $request->input('endDay');
        $event->date = 0;
        $event->save();

        return redirect()->action('adminController@events');

    }

    public function editEvent($id)
    {
        $event = Event::find($id);
        return view('Admin.edit-event', compact('event'));
    }

    public function saveEdit(Request $request)
    {
        $event = Event::find($request->input('id'));
        $event->name = $request->input('name');
        $event->opis = $request->input('opis');
        $event->homepage = $request->input('homepage');
        $event->location = $request->input('location');
        $event->year = $request->input('year');
        $event->startMonth = $request->input('startMonth');
        $event->startDay = $request->input('startDay');
        $event->endMonth = $request->input('endMonth');
        $event->endDay = $request->input('endDay');

        $event->save();
        return redirect()->action('adminController@events');
    }

    public function eventPhotos($id)
    {

        $photos = Event::find($id)->photos;
        return view('Admin.event-photos', compact('photos', 'id'));
    }

    public function storePhoto(Request $request)
    {
        $id = $request->input('id');
        $count = Event::find($id)->photos->count();
        $type = $request->input('type');
        $ext = $request->file('photo')->extension();

        if ($type == 'other') {
            $name = $count + 1;
            $imageName = $name . '_' . $id .'.'. $ext;
        } elseif ($type == 'main') {
            $imageName = 'main_' . $id .'.'. $ext;
        } else {
            $imageName = 'logo_' . $id .'.'. $ext;
        }


        $request->photo->move('eventPhotos/' . $id, $imageName);


        /* Store $imageName name in DATABASE from HERE */


        $photo = new Photo;
        $photo->event_id = $id;

        $photo->name = $imageName;
        $photo->verified = '1';
        $photo->type = $type;
        $photo->save();

        return redirect()->action('adminEventController@eventPhotos', compact('id'));
    }

}
