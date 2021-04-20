<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Company;
use App\Date;
use App\Event;
use App\Hour;
use App\Photo;
use App\Stream;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class adminEventController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function addEvent()
    {

        return view('Admin.add-event');
    }

    public function createDates($event)
    {
        $starMonth = $event->startMonth;
        $startDay = $event->startDay;
        $endMonth = $event->endMonth;
        $endDay = $event->endDay;

        if ($starMonth === $endMonth) {
            for ($i = $startDay; $i <= $endDay; $i++) {
                $date = new Date();
                $date->event_id = $event->id;
                $date->date = Carbon::now();
                $date->day = $i;
                $date->month = $starMonth;
                $date->year = $event->year;
                $date->save();

            }


        } else {
            if ($starMonth === 2) {
                $max = 28;


            } elseif (($starMonth % 2 === 1 && $starMonth <= 7) || ($starMonth % 2 === 0 && $starMonth > 7)) {

                $max = 31;


            } else {
                $max = 30;
            }
//            if ($startDay === $max) {
//
//            }


            for ($i = $startDay; ($i <= $endDay || $i >= $startDay) && $i <= $max; $i++) {
                $date = new Date();
                $date->event_id = $event->id;
                $date->date = Carbon::now();
                $date->day = $i;
                $date->month = $starMonth;
                $date->year = $event->year;
                $date->save();

                if ($i == $max) {
                    $i = 0;
                    $starMonth = $endMonth;

                }

            }


        }


    }

    public function createHours($id)
    {

        $event = Event::find($id);

        $dates = $event->dates;

        foreach ($dates as $date) {
            for ($i = 10; $i <= 18; $i++) {
                $hour = new Hour();
                $hour->hours = Carbon::now()->toTimeString();
                $hour->date_id = $date->id;
                $hour->hour = $i;
                $hour->save();


            }


        }


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

        $this->createDates($event);


        $this->createHours($event->id);

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

        $oldStartM = $event->startMonth;

        $oldStartD = $event->startDay;
        $oldEndM = $event->endMonth;
        $oldEndD = $event->endDay;


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

        if ($oldStartM === $request->input('startMonth') && $oldStartD === $request->input('startDay') && $oldEndM === $request->input('endMonth') && $oldEndD === $request->input('endDay')) {
            return redirect()->action('adminController@events');
        }
        $dates = $event->dates;

        foreach ($dates as $date) {
            $hours = $date->hours;

            foreach ($hours as $hour) {

                $hour->delete();


            }

            $date->delete();


        }

        $this->createDates($event);


        $this->createHours($request->input('id'));

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
            $imageName = $name . '_' . $id . '.' . $ext;
        } elseif ($type == 'main') {
            $imageName = 'main_' . $id . '.' . $ext;
        } else {
            $imageName = 'logo_' . $id . '.' . $ext;
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

    public function setAsMain($id, $pid)
    {


        $event = Event::find($id);
        $main = $event->photos()->where('type', 'main')->first();
        $main->type = 'other';
        $main->save();

        $newMain = Photo::find($pid);
        $newMain->type = 'main';
        $newMain->save();
        return redirect()->action('adminEventController@eventPhotos', compact('id'));
    }

    public function delete($eventId, $photoId, $photoName)
    {

        $id = $eventId;

        $dpath = 'eventPhotos/' . $eventId . '/' . $photoName;

        File::delete($dpath);

        Photo::find($photoId)->delete();

        return redirect()->action('adminEventController@eventPhotos', compact('id'));
    }

    public function deleteEvent($id)
    {
        $event = Event::find($id);
        $dates = $event->dates;
        $photos = $event->photos;
        $streams = $event->streams;

        foreach ($dates as $date) {
            $hours = $date->hours;

            foreach ($hours as $hour) {

                $hour->delete();

            }

            $date->delete();

        }
        foreach ($photos as $photo) {
            $dpath = 'eventPhotos/' . $id . '/' . $photo->name;

            File::delete($dpath);
            $photo->delete();

        }
        foreach ($streams as $stream) {
            $stream->event_id = 0;
            $stream->visible = 0;
            $stream->save();
        }

        $event->delete();
        return redirect()->action('adminController@events');

    }


//streams
    public function newStream()
    {
        $events = Event::all();
        $chats = Chat::where('stream_id', 0)->get();

        return view('Admin.add-stream', compact('events', 'chats'));
    }

    public function createStream(Request $request)
    {
        $stream = new Stream();
        $stream->name = $request->input('name');
        $stream->opis = $request->input('opis');
        $stream->link = $request->input('link');
        $stream->event_id = $request->input('event_id');
        $stream->date = $request->input('date');
        $stream->visible = 0;
        $stream->save();

        $ext = $request->file('photo')->extension();

        $imageName = $stream->name . '.' . $ext;

        $request->photo->move('thumbnails', $imageName);
        $thumb = new Photo();
        $thumb->name = $imageName;
        $thumb->stream_id = $stream->id;
        $thumb->type = 'thumbnail';
        $thumb->verified = 1;
        $thumb->save();

        $chat = Chat::find($request->input('chat'));
        $chat->stream_id = $stream->id;
        $chat->save();
        return redirect()->action('adminController@media');
    }

    public function editStream($id)
    {
        $stream = Stream::find($id);
        $events = Event::all();
        $chats = Chat::where('stream_id', '<', 1)->get();
        $selectedChat = Chat::where('stream_id', $id)->first();


        return view('Admin.edit-stream', compact('stream', 'events', 'chats', 'selectedChat'));

    }

    public function saveEditStream(Request $request)
    {
        $id = $request->input('streamId');


        $stream = Stream::find($id);
        $stream->name = $request->input('name');
        $stream->opis = $request->input('opis');
        $stream->link = $request->input('link');
        $stream->event_id = $request->input('event_id');
        $stream->date = $request->input('date');

        $stream->save();


        if ($stream->chat->id != $request->input('chat')) {
            $chat = Chat::find($stream->chat->id);
            $chat->stream_id = 0;
            $chat->save();

            $newChat = Chat::find($request->input('chat'));
            $newChat->stream_id = $id;
            $newChat->save();

        }

        if ($request->hasFile('photo')) {

            $photo = $stream->photo;

            File::delete('thumbnails/' . $photo->name);


            $photo->delete();

            $ext = $request->file('photo')->extension();

            $imageName = $stream->name . '.' . $ext;

            $request->photo->move('thumbnails', $imageName);
            $thumb = new Photo();
            $thumb->name = $imageName;
            $thumb->stream_id = $stream->id;
            $thumb->type = 'thumbnail';
            $thumb->verified = 1;
            $thumb->save();

        }


        return redirect()->action('adminEventController@editStream', compact('id'));

    }


    public function deleteStream($id)
    {
        $stream = Stream::find($id);
        $chat = $stream->chat;
        $chat->stream_id = 0;
        $chat->save();

        $photo = $stream->photo;
        File::delete('thumbnails/' . $photo->name);


        $photo->delete();

        $stream->delete();


        return redirect()->action('adminController@media');

    }

    //publishing

    public function toggle($id, $type)
    {
        if ($type == 'e') {
            $item = Event::find($id);

        } else {
            $item = Stream::find($id);
        }

        if ($item->visible) {
            $item->visible = 0;
        } else {
            $item->visible = 1;
        }


        $item->save();

        if ($type == 'e') {
            return redirect()->action('adminController@events');

        } else {
            return redirect()->action('adminController@media');
        }
    }


    //b2b session

    public function createB2BSession($id)
    {
        $newEvent = Event::find($id);
        $oldEvent = Event::where('b2b', 1)->first();

        if($newEvent===$oldEvent){
            $oldEvent->b2b = 0;
            $oldEvent->save();
            return redirect()->action('adminController@events');
        }


        if ($oldEvent) {
            $oldEvent->b2b = 0;
            $oldEvent->save();

        }




            $newEvent->b2b = 1;


        $newEvent->save();

        return redirect()->action('adminController@events');
    }

    public function createTestSession()
    {
        $now = Carbon::now();
        $month = $now->month;
        $day = $now->day;


        $event = new Event();
        $event->name = 'testB2B';
        $event->opis = 'lorem ipsum';
        $event->homepage = 'lorem ipsum';
        $event->location = 'lorem ipsum';
        $event->year = $now->year;
        $event->startMonth = $month;
        $event->startDay = $day;
        $event->endMonth = $month;
        $event->endDay = $day;
        $event->date = 0;
        $event->save();

        $this->createDates($event);


        $this->createHours($event->id);



        $this->createB2BSession($event->id);

        return redirect()->action('adminController@events');
    }
}
