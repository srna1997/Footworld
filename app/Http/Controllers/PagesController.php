<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $title = 'Welcome to Laravel!';
        //return view('pages.index', compact('title')); // one var
        return view('pages.index')->with('title',$title); //array multiple var
    }

    public function about()
    {
        $title = 'About page!';
        return view('pages.about',compact('title'));
    }
}
