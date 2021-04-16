<?php

namespace App\Http\Controllers;


use App\Event;
use App\Stream;
use Illuminate\Http\Request;
use App\Company;
use App\Photo;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

class CompanyController extends Controller
{
    public function index($id)
    {

        $meetCheck = 1;

        if(Auth::check()){
            $userMeets = Auth::user()->meetings()->get();
            if($userMeets->isNotEmpty()){
                foreach ($userMeets as $meet){
                    if($meet->company->id === $id){

                        $meetCheck = 0;
                    }

                }
            }


        }

        $photos = Photo::where('company_id', $id)->get();
        $logo = Photo::where('company_id', $id)->where('type', 'logo')->first();
        $company = Company::find($id);
        $streams = $company->streams()->get();
        $title = $company->name;
        $event = Event::firstWhere('b2b', 1);
        return view('company',compact('photos','company','streams','title','event','logo','meetCheck'));
    }
    public function indexeng($id)
    {

        $photos = Photo::where('company_id', $id)->get();
        $company = Company::find($id);
        $streams = $company->streams()->get();
        $title = $company->name;

        return view('eng.company',compact('photos','company','streams','title'));
    }

}
