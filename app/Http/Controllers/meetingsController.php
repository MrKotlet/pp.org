<?php

namespace App\Http\Controllers;

use App\Company;
use App\Event;
use App\Hour;
use App\Meeting;
use App\Note;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class meetingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function companyForm()
    {

        $user = User::find(Auth::id());

        $company = $user->company;

        $event = Event::firstWhere('b2b', 1);

        $dates = $event->dates()->get();


        return view('user.meetingForm', compact('user', 'event', 'dates', 'company'));
    }


    public function companyDates($id, Request $request)
    {

        $company = Company::find($id);

        $company->b2b = $request->input('b2b');
        $company->save();
        $company->hours()->sync($request->input('hours'));


        return redirect()->action([meetingsController::class, 'companyForm']);
    }


    public function createMeeting($id, Request $request)
    {


        $uid = Auth::id();
        $hour = Hour::find($request->input('hours'));
        $date = $hour->date;


        $meeting = new Meeting();
        $meeting->hours = $hour->hours;
        $meeting->hour_id = $hour->id;
        $meeting->date = $date->date;
        $meeting->company_id = $id;
        $meeting->user_id = $uid;
        $meeting->status = 'pending';
        $meeting->save();

        $cid = Company::find($id);

        $note = new Note();
        $note->age = 'new';
        $note->subject = 'meetprop';
        $note->user_id = $cid->user_id;
        $note->meeting_id = $meeting->id;
        $note->message = $request->input('message');
        $note->save();

        $mail = $cid->user->email;

        $data = [
            'meet' => $meeting,
            'note' => $note
        ];

        Mail::send('mails.meetprop', $data, function ($message) use ($mail) {
            $message->to($mail)->subject('Nowa propozycja spotkania');
        });

        return view('meetingdone', compact('meeting'));


    }

    public function notesList()
    {
        $user = User::find(Auth::id());

        $company = $user->company;


        $user = User::find(Auth::id());
        $notes = $user->notes;
        $oldnotes = $notes;

        foreach ($oldnotes as $onote) {
            $onote->age = 'read';
            $onote->save();
        }


        return view('user.notificationList', compact('user', 'notes', 'company'));
    }

    public function meetok($id)
    {

        $meet = Meeting::find($id);

        $note = new Note();
        $note->age = 'new';
        $note->subject = 'meetok';
        $note->user_id = $meet->user_id;
        $note->meeting_id = $meet->id;

        $note->save();

        $meet->status = 'accepted';
        $meet->save();

        $data = [
            'cname' => $meet->company->name,
            'meet' => $meet
        ];


        $mail = $meet->user->email;

        Mail::send('mails.meetok', $data, function ($message) use ($mail) {
            $message->to($mail)->subject('Info about meeting');
        });


        return redirect()->action([meetingsController::class, 'notesList']);


    }

    public function meetnope($id)
    {

        $meet = Meeting::find($id);

        $note = new Note();
        $note->age = 'new';
        $note->subject = 'meetnope';
        $note->user_id = $meet->user_id;
        $note->meeting_id = $meet->id;

        $note->save();

        $meet->notes()->where('subject', 'meetprop')->delete();


        $data = [
            'cname' => $meet->company->name,

        ];


        $mail = $meet->user->email;

        Mail::send('mails.meetnope', $data, function ($message) use ($mail) {
            $message->to($mail)->subject('Info about meeting');
        });

        $meet->status = 'declined';
        $meet->hour_id=0;
        $meet->save();



        return redirect()->action([meetingsController::class, 'notesList']);


    }

    public function meetsList()
    {
        $id = Auth::id();
        $user = User::find($id);

        $time = Carbon::now('Europe/Warsaw');
        $h = $time->hour;
        $d = $time->day;


        $umeets = $user->meetings;
        $company = $user->company;
        if ($company) {
            $cmeets = $company->meetings;

            $meets = $umeets->merge($cmeets);
            return view('user.meetingsList', compact('meets', 'company', 'user','h','d'));
        }
        $meets = $umeets;

        return view('user.meetingsList', compact('meets', 'company', 'user','h','d'));

    }

    public function meetingRoom($id)
    {

        if (!Auth::check()) {
            return 'brak dostępu';
        }


        $user = User::find(Auth::id());

        $meet = Meeting::find($id);
        $company = $meet->company;

        if ($user->id == $meet->user_id || $user->company->id == $meet->company_id) {
            return view('user.meetingRoom', compact('meet', 'company'));
        }

        return 'brak dostępu';


    }

    public function noteDelete($id){

        Note::find($id)->delete();

        return redirect()->action([meetingsController::class, 'notesList']);


    }

}
