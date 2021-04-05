<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UnderController extends Controller
{
    public function index()
    {

        return view('underconstruction',["title"=>"Upss.."]);
    }
    public function indexeng()
    {

        return view('eng.underconstruction',["title"=>"Upss.."]);
    }
    public function index2()
    {

        return view('underconstruction2',["title"=>"Upss.."]);
    }
    public function index2eng()
    {

        return view('eng.underconstruction2',["title"=>"Upss.."]);
    }

}

