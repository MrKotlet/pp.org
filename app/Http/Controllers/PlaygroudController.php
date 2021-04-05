<?php

namespace App\Http\Controllers;

use App\Company;
use App\Date;
use App\Event;
use App\Hour;
use App\Meeting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PlaygroudController extends Controller
{
    public function index(){

        $user = User::find(Auth::id());
        $notes = $user->notes;


        return view('testsite.pg2', compact('user', 'notes'));
    }


    public function index2(){
        $id= Auth::id();
        $user= User::find($id);
        $umeets= $user->meetings;
        $company=$user->company;
        $cmeets=$company->meetings;

        $meets = $umeets->merge($cmeets);

        return view('testsite.pg3', compact('meets'));

    }

    public function meetok($id){

        $meet = Meeting::find($id);

        $meet -> status ='accepted';
        $meet -> save();

        $data = [
            'title'=> 'Testint 1234',
            'content' => 'Witaj Świecie'
        ];


        $mail= $meet->user->email;

        Mail::send('mailgun',$data, function ($message) use ($mail) {
            $message ->to($mail)->subject('Chyba działa');
        });


        return redirect()->action([PlaygroudController::class, 'index']);


    }

    public function meetnope($id){

        $meet = Meeting::find($id);

        $meet -> status = 'declined';
        $meet ->save();

        $data = [
            'title'=> 'Testint 1234',
            'content' => 'Witaj Świecie'
        ];


        $mail= $meet->user->email;

        Mail::send('mailgun',$data, function ($message) use ($mail) {
            $message ->to($mail)->subject('Chyba działa');
        });


        return redirect()->action([PlaygroudController::class, 'index']);


    }

    public function meeteingRoom($id){

        if(!Auth::check()){
            return 'brak dostępu';
        }


        $user=User::find(Auth::id());

        $meet= Meeting::find($id);
        $company= $meet->company;

        if($user->id==$meet->user_id || $user->company->id == $meet->company_id  ){
            return view('testsite.pg',compact('meet','company'));
        }

        return 'brak dostępu';




    }









    public function companyForm(){

        $user = User::find(Auth::id());

        $company = $user->company;

        $event = Event::firstWhere('visible', 1);

        $dates = $event->dates()->get();





        return view('testsite.companyForm',compact('user','event', 'dates','company'));
    }

    public function companyDates($id, Request $request){

        $company=Company::find($id);

        $company->hours()->sync($request->input('hours'));


        return redirect()->action([PlaygroudController::class,'companyForm']);
    }

    public function meetingForm(){
        $event = Event::firstWhere('visible', 1);

        $company = Company::find(15);



        return view('testsite.meetingForm', compact('company', 'event'));
    }
    public function createMeeting($id, Request $request){


        $uid = Auth::id();
        $hour = Hour::find($request->input('hours'));
        $date = $hour->date;


        $meeting = new Meeting();
        $meeting -> hours = $hour->hours;
        $meeting -> date = $date->date;
        $meeting -> company_id = $id;
        $meeting -> user_id = $uid;
        $meeting -> save();

        return $meeting;




    }
}
