<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        return view('bookstore.contactAbout.about');
    }
    public function contact(){
        return view('bookstore.contactAbout.contact');
    }
}
