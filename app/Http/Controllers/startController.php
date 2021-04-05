<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class startController extends Controller
{
    public function index()
    {

        return view('start',["title"=>"Home"]);
    }

    public function indexeng()
    {

        return view('eng.start',["title"=>"Homepage"]);
    }

}
