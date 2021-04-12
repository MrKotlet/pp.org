<?php

namespace App\Http\Controllers;


use App\Event;
use App\Stream;
use Illuminate\Http\Request;
use App\Company;
use App\Photo;

class CompanyController extends Controller
{
    public function index($id)
    {

        $photos = Photo::where('company_id', $id)->get();
        $logo = Photo::where('company_id', $id)->where('type', 'logo')->first();
        $company = Company::find($id);
        $streams = $company->streams()->get();
        $title = $company->name;
        $event = Event::firstWhere('visible', 1);
        return view('company',compact('photos','company','streams','title','event','logo'));
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
