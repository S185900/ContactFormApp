<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function create()
    {
        return view('contact.home');
    }


    public function confirm()
    {
        return view('contact.confirm');
    }


    public function thanks()
    {
        return view('contact.thanks');
    }

}